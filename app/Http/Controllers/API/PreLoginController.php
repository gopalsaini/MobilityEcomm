<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\commonHelper;

use DB; 
use Validator;
use Razorpay\Api\Api;
use Hash;
use Srmklive\PayPal\Facades\Paypal;
use Srmklive\PayPal\Services\ExpressCheckout;

class PreLoginController extends Controller
{

    public function emailRegistration(Request $request){
		
		$rules = [
            'first_name' => 'required|max:55|string|min:3',
            'last_name' => 'required|max:55|string|min:3',
            'email' => 'required|email',    
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password|min:8',
		];

		$validator = Validator::make($request->json()->all(), $rules);
		 
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
		}else{

			try{
				
				//chk unique email
				$emailResult=\App\Models\User::where([
										['email','=',$request->json()->get('email')],
										['reg_type','=','email'],
										])->first();
										
				if($emailResult){
					
					return response(array('message'=>'Email is already exist with us. Please try another email id.'),403);
				
				}else{
					
					$user=new \App\Models\User();
					$user->name=$request->json()->get('first_name').' '.$request->json()->get('last_name');
					$user->email=$request->json()->get('email');
					$user->password=$request->json()->get('password');
					$user->reg_type='email';
					$user->status='1';
					$user->user_type='Customer';
					$user->designation_id=0;
					$user->save();
						
					$to=$request->json()->get('email');
					$name=$request->json()->get('first_name').' '.$request->json()->get('last_name');
				
					\Mail::send('email_templates.registraion_success', compact('name'), function($message) use ($to)
					{
						$message->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
						$message->subject('Registration successfully.');
						$message->to($to);
					});

					//send OTP on mail
					//\App\Helpers\commonHelper::callAPI('POST','/mail-getotp',json_encode(array('email'=>$request->json()->get('email'),'type'=>'email')));
					return response(array('message'=>"Registration successfully.","token"=>$user->createToken('authToken')->accessToken,"result"=>$user->toArray()),200);
					
					//return response(array('message'=>'An email with OTP has been sent, Please verify.'),200);
					
				}
				
			}catch (\Exception $e){
				
				return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
			
			}
		}

    }
	
	public function sendOtpOnMail(Request $request){
		
		$rules = [
            'email' => 'required|email', 
			'type'=>'required|in:email,facebook,apple'
		];

		$validator = Validator::make($request->json()->all(), $rules);
		 
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
		}else{

			try{
				
				//chk unique email
				$emailResult=\App\Models\User::where([
										['email','=',$request->json()->get('email')],
										['reg_type','=',$request->json()->get('type')],
										])->first();
										
				if(!$emailResult){
					
					return response(array('message'=>'Email id is not registered with us. Please try another email id.'));
				
				}elseif($emailResult->block_user==1){
					
					return response(array('message'=>'User is blocked. So please contact your administrator.'),403);
				
				}else{
					
					$otp=\App\Helpers\commonHelper::getOtp();
					
					\App\Models\User::where([
								['email','=',$request->json()->get('email')],
								['reg_type','=',$request->json()->get('type')]
								])->update(['otp'=>$otp]);
													
					$adminEmail  = env('MAIL_FROM_ADDRESS');
					$app_name =  env('APP_NAME');	
					$to=$request->json()->get('email');
				
					\Mail::send('email_templates.otp', compact('otp'), function($message) use ($to)
					{
						$message->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
						$message->subject('OTP verification');
						$message->to($to);
					});
					 	
					return response(array('message'=>'OTP sent successfully on your registered Email id.'),200);
					
				}
				
			}catch (\Exception $e){
				
				return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
			
			}
		}
		
	}

    public function mobileRegistration(Request $request){
		
		$rules = [
            'name' => 'required|max:55|string|min:3',
			'phone_code'=>'required',
            'mobile' => 'required'
		];

		$validator = Validator::make($request->json()->all(), $rules);
		 
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
		}else{

			try{
				
				//chk unique email
				$emailResult=\App\Models\User::where([
										['mobile','=',$request->json()->get('mobile')],
										['reg_type','=','mobile'],
										])->first();
										
				if($emailResult){
					
					return response(array('message'=>'Mobile no is already exist with us. Please try another mobile no.'),403);
				
				}else{
					
					$user=new \App\Models\User();
					$user->name=$request->json()->get('name');
					$user->phone_code=$request->json()->get('phone_code');
					$user->mobile=$request->json()->get('mobile');
					$user->reg_type='mobile';
					$user->save();
					
					//send OTP on mobile
					\App\Helpers\commonHelper::callAPI('POST','/mobile-getotp',json_encode(array('phone_code'=>$request->json()->get('phone_code'),'mobile'=>$request->json()->get('mobile'))));

					return response(array('message'=>'User registered successfully. OTP sent on your mobile no.'),200);
					
				}
				
			}catch (\Exception $e){
				
				return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
			
			}
		}
    }
	
	public function sendOtpOnMobile(Request $request){
		
		$rules = [
			'phone_code'=>'required',
            'mobile' => 'required', 
		];

		$validator = Validator::make($request->json()->all(), $rules);
		 
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
		}else{

			try{
				
				//chk unique email
				$emailResult=\App\Models\User::where([
										['phone_code','=',$request->json()->get('phone_code')],
										['mobile','=',$request->json()->get('mobile')],
										['reg_type','=','mobile'],
										])->first();
										
				if(!$emailResult){
					
					return response(array('message'=>'Mobile is not registered with us. Please try another Mobile no.'),404);
				
				}elseif($emailResult->block_user==1){
					
					return response(array('message'=>'User is blocked. So please contact your administrator.'),403);
				
				}else{
					
					$otp=\App\Helpers\commonHelper::getOtp();
					
					\App\Models\User::where([
								['mobile','=',$request->json()->get('mobile')],
								['reg_type','=','mobile']
								])->update(['otp'=>$otp]);
								
					
					$content ="https://bulksmsapi.vispl.in/?username=fiveotp&password=five_1234&messageType=text&mobile=".$request->json()->get('phone_code').$request->json()->get('mobile')."&senderId=FFERNS&ContentID=1707163756688277953&EntityID=1701163375929957226&message=OTP for FiveFerns is ".$otp.". This OTP is valid for the next 10 minutes. - Team FiveFerns";				
					\App\Helpers\commonHelper::sendMsg($content);	
					
					return response(array('message'=>'OTP sent successfully on your registered Mobile no.'),200);
					
				}
				
			}catch (\Exception $e){
				
				return response(array("message" => $e->getMessage()),403); 
			
			}
		}
		
	}
	
	
	public function validateOtp(Request $request){
		
		$rules['type'] = 'required|in:email,mobile';
		
		if($request->json()->get('type_value')=='email'){
			
			$tules['type_value']='required|email';
			
		}else{
			
			$tules['type_value']='required|numeric';
		}
		
		$rules['otp'] = 'required|size:4';
		
		$validator = Validator::make($request->json()->all(), $rules);
		
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);

		}else{

			try{
				
				if($request->json()->get('type')=='email'){

					$userResult=\App\Models\User::where([
														['email','=',$request->json()->get('type_value')],
														['reg_type','=','email'],
														['otp','=',$request->json()->get('otp')],
														])->first();
						
				}else{
					
					
					$userResult=\App\Models\User::where([
														['mobile','=',$request->json()->get('type_value')],
														['reg_type','=','mobile'],
														['otp','=',$request->json()->get('otp')],
														])->first();
					
				}

				if(!$userResult){
					
					return response(array('message'=>"OTP doesn't exist. Please try again."),403);

				}elseif($userResult->block_user==1){
					
					return response(array('message'=>'User is blocked. So please contact your administrator.'),403);
				
				}else{
					
					$userResult->otp='0';
					$userResult->status='1';
					$userResult->save();
					
					$wishlistResult=\App\Models\Wishlist::select('product_id')->where('user_id',$userResult->id)->pluck('product_id')->toArray();
					
					return response(array('message'=>"OTP matched successfully.","token"=>$userResult->createToken('authToken')->accessToken,"wishlistid"=>$wishlistResult,"result"=>$userResult->toArray()),200);
					
				}
			}catch (\Exception $e){
				
				return response(array("message" => $e->getMessage()),403); 
			
			}
		}
	}
	 
    public function login(Request $request){
		
		$rules['type'] = 'required|in:email,mobile';
		
		if($request->json()->get('type')=='email'){
			
			$tules['type_value']='required|email';
			$rules['password'] = 'required|min:8';
			
		}else{
			
			$tules['type_value']='required|numeric';
			$tules['phone_code']='required';
			$rules['otp'] = 'required|size:4';
		} 
		
		$validator = Validator::make($request->json()->all(), $rules);
		
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);

		}else{

			try{
				
				if($request->json()->get('type')=='email'){

					$userResult=\App\Models\User::where([
														['email','=',$request->json()->get('type_value')],
														['reg_type','=','email'],
														['password','=',$request->json()->get('password')],
														])->first();
						
				}else{
					
					
					$userResult=\App\Models\User::where([
														['phone_code','=',$request->json()->get('phone_code')],
														['mobile','=',$request->json()->get('type_value')],
														['reg_type','=','mobile'],
														['otp','=',$request->json()->get('otp')],
														['user_type','=','Customer']
														])->first();
					
				}

				if(!$userResult){
					
					return response(array('message'=>"Invalid login credentials. Please try again."),403);
					
				}else if($userResult['block_user']=='1'){
					
					return response(array('message'=>"User is blocked. Please contact to administration"),403);
					
				}else{
					
					if($userResult->status=='1' || $request->json()->get('type')=='mobile'){
						
						$userResult->otp='0';
						$userResult->save();

						return response(array('message'=>"Login successfully.","verify"=>true,"token"=>$userResult->createToken('authToken')->accessToken,"result"=>$userResult->toArray()),200);
					}else{

						if($request->json()->get('type')=='email'){
					
							//send OTP on mail
							\App\Helpers\commonHelper::callAPI('POST','/mail-getotp',json_encode(array('email'=>$request->json()->get('type_value'),'type'=>'email')));
						}

						return response(array('message'=>"OTP verification is pending. So please first verify your account","verify"=>false),200);
						
					}
					
					
				}
			}catch (\Exception $e){
				
				return response(array("message" => $e->getMessage()),403); 
			
			}
		}
	}
	 
    public function socialLogin(Request $request){
		
		$rules['type'] = 'required|in:google,facebook,apple';
		$rules['social_id'] = 'required';
		$rules['name'] = 'required';
		$rules['email'] = 'required|email';
		
		$validator = Validator::make($request->json()->all(), $rules);
		
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
		}else{

			try{
				
				$userResult=\App\Models\User::where([
													['reg_type','=',$request->json()->get('type')],
													['social_id','=',$request->json()->get('social_id')]
													])->first();

				if(!$userResult){

					$userResult=new \App\Models\User();
					$userResult->name=$request->json()->get('name');
					$userResult->email=$request->json()->get('email');
					$userResult->reg_type=$request->json()->get('type');
					$userResult->password=Hash::make('admin1234');
					$userResult->status='1';
					$userResult->user_type='Customer';
					$userResult->social_id=$request->json()->get('social_id');
					$userResult->save();

				}
				
				$wishlistResult=\App\Models\Wishlist::select('product_id')->where('user_id',$userResult->id)->pluck('product_id')->toArray();
					
				return response(array('message'=>"Login successfully.","verify"=>true,"token"=>$userResult->createToken('authToken')->accessToken,"wishlistid"=>$wishlistResult,"result"=>$userResult->toArray()),200);
				
			}catch (\Exception $e){
				
				return response(array("message" => $e->getMessage()),403); 
			
			}
		}
	}
	 
    public function forgotPassword(Request $request){
		
		$rules['email'] = 'required|email';
		
		$validator = Validator::make($request->json()->all(), $rules);
		
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
		}else{

			try{
				
				$userResult=\App\Models\User::where([
													['email','=',$request->json()->get('email')],
													['reg_type','=','email'],
													])->first();

				if(!$userResult){
					
					return response(array('message'=>"Invalid Email id."),200);
					
				}else{
					
					return response(array('message'=>"Link created successfully.","token"=>md5(rand(1111,4444))),200);
				}
				
				return response(array('message'=>"Login successfully.","verify"=>true,"token"=>$userResult->createToken('authToken')->accessToken),200);
				
			}catch (\Exception $e){
				
				return response(array("message" => $e->getMessage()),403); 
			
			}
		}
	}
	
	
	public function categoryList(Request $request){
		
		$result=\App\Helpers\commonHelper::getCategoryTree(Null);
		
		if(!empty($result)){
			
			return response(array("message" => 'Category fetched successfully.','result'=>$result),200); 
		}else{
			
			return response(array("message" => 'Category not found.'),403); 
		}
	}
	
	public function productList(Request $request){
		
		$offset=$request->get('offset');
		$limit=$request->get('limit'); 
		$country=$request->get('country_id'); 
		
		try{
			
			$orderCol='sale_price';
			$orderBy='ASC';

			if($request->get('sort_order')=='1'){

				$orderCol='sale_price';
				$orderBy='ASC';

			}else if($request->get('sort_order')=='2'){

				$orderCol='sale_price';
				$orderBy='DESC';

			}else if($request->get('sort_order')=='3'){

				$orderCol='variantproducts.id';
				$orderBy='ASC';

			}else if($request->get('sort_order')=='4'){

				$orderCol='variantproducts.id';
				$orderBy='DESC';
			}

			$minPrice=0;
			$maxPrice=1000000000000000000000000000000000000000000000000000;

			if($request->get('min_price')){

				$minPrice=$request->get('min_price');
				
			}if($request->get('max_price')){

				$maxPrice=$request->get('max_price');

			}


			$query=\App\Models\Product::Select('products.name','products.category_id','variantproducts.id as variantproductid','variantproducts.sale_price','variantproducts.discount_type','variantproducts.discount_amount','variantproducts.slug','variantproducts.images')->where([
																	['products.status','=','1'],
																	['products.recyclebin_status','=','0'],
																	['variantproducts.status','=','1'],
																	['variantproducts.recyclebin_status','=','0'],
																	['variantproducts.sale_price','>=',$minPrice],
																	['variantproducts.sale_price','<=',$maxPrice]
																	])->join('variantproducts','variantproducts.product_id','=','products.id')->offset($offset)->limit($limit)->groupBy('variantproducts.product_id')->orderBy($orderCol,$orderBy);
		

			if($request->get('collection')){
				
				$collection = $request->get('collection');
				
				$query->where(function($query1) use($collection){

					$query1->orWhere('products.whole_collection_status',$collection);
					$query1->OrWhere('products.whole_collection_status','LIKE','%,'.$collection);
					$query1->OrWhere('products.whole_collection_status','LIKE',$collection.',%');
					$query1->OrWhere('products.whole_collection_status','LIKE','%,'.$collection.',%');
				});
				
			}
			
			if($request->get('category_slug')){

				
				$getSlugCategoryId=\App\Models\Category::where('slug',$request->get('category_slug'))->first();
				
				$query->where('products.category_id',$getSlugCategoryId->id);

				if($getSlugCategoryId){

					$childCategory=\App\Helpers\commonHelper::getCategoryTreeidsArray($getSlugCategoryId->id);

					if($childCategory){

						$query->orwhereIn('products.category_id',$childCategory);

					}
				}

			}

			if($request->get('attributeId')){
				
				$attributeIdArray=explode(',',$request->get('attributeId'));

				if(!empty($attributeIdArray) && $attributeIdArray[0]!=''){

					
					$query->where(function($query1) use ($attributeIdArray){

						foreach($attributeIdArray as $attributeId){
							$query1->orWhere('variant_attributes',$attributeId);
							$query1->OrWhere('variant_attributes','LIKE','%,'.$attributeId);
							$query1->OrWhere('variant_attributes','LIKE',$attributeId.',%');
							$query1->OrWhere('variant_attributes','LIKE','%,'.$attributeId.',%');
						}
						
					});
					
				}
			}
			
			if($request->get('type') != ''){
				
				$query->where('variantproducts.type','Rent');
			}else{
				$query->where('variantproducts.type','Sale');
			}


			$productResult=$query->get();

			if(!$productResult){
				
				return response(array("message" => 'Product not found.'),403); 

			}else{
				
				$result=[];
				
				foreach($productResult as $value){
					
					$imagesArray=explode(',',$value->images);
					
					$secondImage=Null;
					if(isset($imagesArray[1])){
						$secondImage=asset('uploads/products/'.$imagesArray[1]);
					}
					
					$result[]=[
						'variant_productid'=>$value['variantproductid'],
						'name'=>ucfirst($value['name']),
						'sale_price'=>$value['sale_price'],
						'discount_amount'=>$value['discount_amount'],
						'offer_price'=>\App\Helpers\commonHelper::getOfferProductPrice($value['sale_price'],$value['discount_type'],$value['discount_amount']),
						'first_image'=>asset('uploads/products/'.$imagesArray[0]),
						'second_image'=>$secondImage,
						'slug'=>$value['slug'],
						'stock'=>$value['stock'],
						'category'=>\App\Helpers\commonHelper::getProductCategoryNameById($value['category_id']),
					];
				}

				return response(array("message" => 'Product fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		}
		
	}
	
	public function dealsOfTheWeekProductList(Request $request){

		$offset=$request->get('offset');
		$limit=$request->get('limit'); 
		
		try{
			
			$orderCol='sale_price';
			$orderBy='ASC';

			if($request->get('sort_order')=='1'){

				$orderCol='sale_price';
				$orderBy='ASC';

			}else if($request->get('sort_order')=='2'){

				$orderCol='sale_price';
				$orderBy='DESC';

			}else if($request->get('sort_order')=='3'){

				$orderCol='variantproducts.id';
				$orderBy='ASC';

			}else if($request->get('sort_order')=='4'){

				$orderCol='variantproducts.id';
				$orderBy='DESC';
			}

			$query=\App\Models\Product::Select('products.name','variantproducts.id as variantproductid','variantproducts.sale_price','variantproducts.discount_type','variantproducts.discount_amount','variantproducts.slug','variantproducts.images')->where([
																	['products.status','=','1'],
																	['products.recyclebin_status','=','0'],
																	['variantproducts.status','=','1'],
																	['products.deals_oftheweek','=','1'],
																	])->join('variantproducts','variantproducts.product_id','=','products.id')->offset($offset)->limit($limit)->groupBy('variantproducts.product_id')->orderBy($orderCol,$orderBy);
		


			$productResult=$query->get();

			if(!$productResult){
				
				return response(array("message" => 'Product not found.'),403); 

			}else{
				
				$result=[];
				
				foreach($productResult as $value){
					
					$imagesArray=explode(',',$value->images);
					
					$secondImage=Null;
					if(isset($imagesArray[1])){
						$secondImage=asset('uploads/products/'.$imagesArray[1]);
					}
					
					$result[]=[
						'variant_productid'=>$value['variantproductid'],
						'name'=>ucfirst($value['name']),
						'sale_price'=>$value['sale_price'],
						'discount_amount'=>$value['discount_amount'],
						'offer_price'=>\App\Helpers\commonHelper::getOfferProductPrice($value['sale_price'],$value['discount_type'],$value['discount_amount']),
						'first_image'=>asset('uploads/products/'.$imagesArray[0]),
						'second_image'=>$secondImage,
						'slug'=>$value['slug'],
						'stock'=>$value['stock'],
					];
				}

				return response(array("message" => 'Deals of the Week Products fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		}
		
	}
	
	
	public function productDetail(Request $request){

		try{
				
			$productResult=\App\Models\Product::Select('products.*','variantproducts.*','variantproducts.id as variantid','products.id as productid')->where([
																	['products.status','=','1'],
																	['products.recyclebin_status','=','0'],
																	['variantproducts.status','=','1'],
																	['variantproducts.slug','=',$request->get('slug')]
																	])->join('variantproducts','variantproducts.product_id','=','products.id')->first();
			

			if($productResult->count()==0){
				
				return response(array("message" => 'Product not found.'),404); 
				
			}else{
				
				$imagesArray=[];
					
				$imagesArrayList=explode(',',$productResult->images);
				
				if(!empty($imagesArrayList) && $imagesArrayList[0]!=''){
					
					foreach($imagesArrayList as $image){
						
						$imagesArray[]=asset('uploads/products/'.$image);
					}
				}
	
				$variantsProductResults=\App\Models\Variantproduct::where('product_id',array($productResult->productid))->where('status','1')->where('recyclebin_status','0')->get();
				
				$attributeArray=array();

				if($variantsProductResults->count()>0){
				
					$variantAttributeId="";
						
					foreach($variantsProductResults as $variantProduct){
						
						$variantAttributeId.=$variantProduct->variant_attributes.',';
						
					}
					
					$variantAttributeId=rtrim($variantAttributeId,' ,');
					
					$attributeArray=array_unique(explode(',',$variantAttributeId));
				}
				 
				$variantsResult=\App\Models\Variant::whereIn('id',explode(',',$productResult->variant_id))->where('status','1')->orderBy('sort_order','ASC')->get();

				$variants=[];
				
				$attributes=[];
				
				if($variantsResult->count()>0){
					
					foreach($variantsResult as $variant){
					
						$attributes=\App\Models\Variant_attribute::whereIn('id',$attributeArray)->where('variant_id',$variant->id)->where('status','1')->orderBy('sort_order','ASC')->get();
						
						$variants[]=array(
							'id'=>$variant->id,
							'name'=>ucfirst($variant->name),
							'display_layout'=>$variant->display_layout,
							'attribute'=>$attributes
						);
					}
				}
				
				$result=[
					'product_id'=>$productResult->productid,
					'provariantid'=>$productResult->variantid,
					'category_id'=>$productResult->category_id,
					'name'=>ucfirst($productResult->name),
					'slug'=>ucfirst($productResult->slug),
					'sale_price'=>$productResult->sale_price,
					'discount_amount'=>$productResult->discount_amount,
					'offer_price'=>\App\Helpers\commonHelper::getOfferProductPrice($productResult['sale_price'],$productResult['discount_type'],$productResult['discount_amount']),
					'stock'=>$productResult['stock'],
					'b2b_price'=>$productResult['b2b_price'],
					'b2b_min_qty'=>$productResult['b2b_min_qty'],
					'images'=>implode(',',$imagesArray),
					'short_description'=>$productResult->short_description,
					'description'=>$productResult->description,
					'country_origin'=>$productResult->country_origin,
					'variants'=>$variants,
					'variant_attributes'=>$productResult->variant_attributes,
					'meta_title'=>$productResult->meta_title,
					'meta_keywords'=>$productResult->meta_keywords,
					'meta_description'=>$productResult->meta_description,
					'type'=>$productResult->type,
					'category'=>\App\Helpers\commonHelper::getProductCategoryNameById($productResult->category_id),
				];
				
				return response(array("message" => 'Product fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		}
		
	}
	
	
	public function searchProduct(Request $request){
 
		$text='';
		
		if(isset($_GET['text']) && $_GET['text']!=''){
			
			$text=$_GET['text'];
		}
		
		try{
			
			
			$query=\App\Models\Product::Select('products.name','variantproducts.slug')->where([
																	['products.status','=','1'],
																	['products.recyclebin_status','=','0'],
																	['variantproducts.status','=','1'],
																	['variantproducts.slug','!=',''],
																	['products.name','like','%'.$text.'%']
																	])->join('variantproducts','variantproducts.product_id','=','products.id')->groupBy('variantproducts.product_id')->limit(10);
			


			$productResult=$query->get();

			if($productResult->count()==0){
				
				return response(array("message" => 'Product not found.'),404); 
			}else{
				
				$result=[];
				
				foreach($productResult as $product){
					
					$result[]=[
						'name'=>ucfirst($product->name),
						'slug'=>$product->slug
					];
				}
				return response(array("message" => 'Product data fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 	 
		
	}
	
	
	public function sliderList(Request $request){
 
		try{

			$sliderResult=\App\Models\Slider::where([
													['status','=','1'],
													['recyclebin_status','=','0'],
													])->orderBy('sort_order','ASC')->get();
			
			if(!$sliderResult){
				
				return response(array("message" => 'Result not found.'),404); 
			}else{
				
				$result=[];
				
				foreach($sliderResult as $slider){
					
					$result[]=[
						'image'=>asset('uploads/sliders/'.$slider->image),
						'href'=>$slider->link,
						'title'=>$slider->title
					];
				}
				return response(array("message" => 'Slider fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 	 
		
	}

	public function blogList(Request $request){
 
		try{

			$blogResult=\App\Models\Blog::where('status','1')->orderBy('id','Desc')->limit(3)->get();
			
			if(!$blogResult){
				
				return response(array("message" => 'Result not found.'),404); 
			}else{
				
				$result=[];
				
				foreach($blogResult as $blog){
					
					$result[]=[
						'id'=>$blog->id,
						'image'=>asset('uploads/blog/'.$blog->image),
						'title'=>$blog->title,
						'category'=>\App\Helpers\commonHelper::getCategoryNameById($blog->category_id),
						'slug'=>$blog->slug,
						'date'=>$blog->created_at,
						'shor_desc'=>$blog->short_desc,
					];
				}
				return response(array("message" => 'Blog fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 	 
		
	}
	
	
	public function countryList(Request $request){
 
		try{
				
			$countryResult=\App\Models\Country::orderBy('name','ASC')->get();
			
			if($countryResult->count()==0){
				
				return response(array("message" => 'Result not found.'),404); 
			}else{
				
				$result=[];
				
				foreach($countryResult as $country){
					
					$result[]=[
						'id'=>$country->id,
						'name'=>ucfirst($country->name)
					];
				}
				
				return response(array("message" => 'Country fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 	 
		
	}
	
	
	public function stateList(Request $request){

		try{
				
			$stateResult=\App\Models\State::where('country_id',$request->get('country_id'))->get();
			
			if($stateResult->count()==0){
				
				return response(array("message" => 'Result not found.'),404); 
			}else{
				
				$result=[];
				
				foreach($stateResult as $state){
					
					$result[]=[
						'id'=>$state->id,
						'name'=>ucfirst($state->name)
					];
				}
				
				return response(array("message" => 'State fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 	 
		
	}
	
	
	public function cityList(Request $request){

		try{
				
			$cityResult=\App\Models\City::where('state_id',$request->get('state_id'))->get();
			
			if($cityResult->count()==0){
				
				return response(array("message" => 'Result not found.'),404); 
			}else{
				
				$result=[];
				
				foreach($cityResult as $city){
					
					$result[]=[
						'id'=>$city->id,
						'name'=>ucfirst($city->name)
					];
				}
				
				return response(array("message" => 'City fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 	 
		
	}
	
	
	public function informationData(Request $request,$id){

		try{
				
			$informationResult=\App\Models\Information::where('id',$id)->first();
			
			if($informationResult->count()==0){
				
				return response(array("message" => 'Result not found.'),404); 
			}else{
				
				$result=[
					'title'=>ucfirst($informationResult->title),
					'description'=>$informationResult->description
				];
			
				return response(array("message" => 'Data fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 	 
		
	}
	
	public function latestOrders(Request $request){
		
		try{
			
			$result=\App\Models\Sales::Select('products.name','variantproducts.id','variantproducts.sale_price','variantproducts.discount_type','variantproducts.discount_amount','variantproducts.slug','variantproducts.images')
								->join('sales_details','sales.id','=','sales_details.sale_id')
								->join('variantproducts','variantproducts.id','=','sales_details.product_id')
								->join('products','products.id','=','variantproducts.product_id')->limit(4)->get();
		
		
			if($result->count()==0){
				
				return response(array("message" => 'Order Not found.'),404); 
			}else{
				
				$sales=[];
				foreach($result as $value){
					
					$imagesArray=explode(',',$value->images);
					
					$secondImage=Null;
					if(isset($imagesArray[1])){
						$secondImage=asset('uploads/products/'.$imagesArray[1]);
					}
					
					$sales[]=[
						'variant_productid'=>$value['id'],
						'name'=>ucfirst($value['name']),
						'sale_price'=>$value['sale_price'],
						'discount_amount'=>$value['discount_amount'],
						'offer_price'=>\App\Helpers\commonHelper::getOfferProductPrice($value['sale_price'],$value['discount_type'],$value['discount_amount']),
						'first_image'=>asset('uploads/products/'.$imagesArray[0]),
						'second_image'=>$secondImage,
						'slug'=>$value['slug'],
						'canada_stock'=>$value['canada_stock'],
						'usa_stock'=>$value['usa_stock'],
						'india_stock'=>$value['india_stock'],
					];
				}
				
				return response(array("message" => 'Recent Orders fetched successfully.','result'=>$sales),200); 
			}
		
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 
		
	}
	
	public function testimonialList(Request $request){
		
		try{
			
			$result=\App\Models\Testimonial::where('status','1')->where('recyclebin_status','0')->get();
		
		
			if($result->count()==0){
				
				return response(array("message" => 'Testimonial Not found.'),404); 
			}else{
				
				$testimonial=[];
				foreach($result as $value){
					
					$testimonial[]=[
						'name'=>ucfirst($value['name']),
						'designation'=>ucfirst($value['name']),
						'description'=>$value['description'],
						'image'=>asset('uploads/testimonial/'.$value['image'])
					];
				}
				
				return response(array("message" => 'Testimonials fetched successfully.','result'=>$testimonial),200); 
			}
		
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 
		
	}
	
	public function topRatedCategory(Request $request){
		
		try{
			
			$result=\App\Models\Category::where([
												['top_category','=','1'],
												['status','=','1'],
												['recyclebin_status','=','0'],
												['parent_id','=',Null]
												])->get();
		
		
			if($result->count()==0){
				
				return response(array("message" => 'Top Rated Categoty Not found.'),404); 
			}else{
				
				$category=[];
				foreach($result as $value){
					
					$category[]=[
						'name'=>ucfirst($value['name']),
						'slug'=>$value['slug'],
						'image'=>asset('uploads/category/'.$value['image'])
					];
				}
				
				return response(array("message" => 'Category fetched successfully.','result'=>$category),200); 
			}
		
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 
		
	}
	
	public function topSellingProduct(Request $request){
		
		try{

			$query=\App\Models\Product::select('variantproducts.*','products.name','products.category_id')->where([
													['products.top_selling','=','1'],
													['products.status','=','1'],
													['products.recyclebin_status','=','0'],
													['variantproducts.status','=','1'],
													['variantproducts.recyclebin_status','=','0']
												])->join('variantproducts','variantproducts.product_id','=','products.id');
		
			
			$result = $query->groupBy('variantproducts.product_id')->inRandomOrder()->limit(3)->get();

			if($result->count()==0){
				
				return response(array("message" => 'Top Selling products Not found.'),404); 

			}else{

				
				
				$products=[];
				foreach($result as $value){
					
					$imagesArray=explode(',',$value->images);
					
					$secondImage=Null;
					if(isset($imagesArray[1])){
						$secondImage=asset('uploads/products/'.$imagesArray[1]);
					}
					
					$products[]=[
						'variant_productid'=>$value['id'],
						'name'=>ucfirst($value['name']),
						'sale_price'=>$value['sale_price'],
						'discount_amount'=>$value['discount_amount'],
						'offer_price'=>\App\Helpers\commonHelper::getOfferProductPrice($value['sale_price'],$value['discount_type'],$value['discount_amount']),
						'first_image'=>asset('uploads/products/'.$imagesArray[0]),
						'second_image'=>$secondImage,
						'slug'=>$value['slug'],
						'category'=>\App\Helpers\commonHelper::getProductCategoryNameById($value['category_id']),
						'stock'=>$value['stock'],
					];
				}
				
				return response(array("message" => 'Top selling products fetched successfully.','result'=>$products),200); 
			}
		
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 
		
	}
	
	public function dealsOfTheDay(Request $request){
		
		try{

			
			$query=\App\Models\Product::select('variantproducts.*','products.name','products.category_id')->where([
													['products.deals_oftheday','=','1'],
													['products.status','=','1'],
													['products.recyclebin_status','=','0'],
													['variantproducts.status','=','1'],
													['variantproducts.recyclebin_status','=','0']
												])->join('variantproducts','variantproducts.product_id','=','products.id');
		
			
			$result = $query->groupBy('variantproducts.product_id')->get();

			if($result->count()==0){
				
				return response(array("message" => 'Deals of the day products Not found.'),404); 

			}else{
				
				$products=[];
				foreach($result as $value){
					
					$imagesArray=explode(',',$value->images);
					
					$secondImage=Null;
					if(isset($imagesArray[1])){
						$secondImage=asset('uploads/products/'.$imagesArray[1]);
					}
					
					$products[]=[
						'variant_productid'=>$value['id'],
						'name'=>ucfirst($value['name']),
						'sale_price'=>$value['sale_price'],
						'discount_amount'=>$value['discount_amount'],
						'offer_price'=>\App\Helpers\commonHelper::getOfferProductPrice($value['sale_price'],$value['discount_type'],$value['discount_amount']),
						'first_image'=>asset('uploads/products/'.$imagesArray[0]),
						'second_image'=>$secondImage,
						'slug'=>$value['slug'],
						'stock'=>$value['stock'],
						'category'=>\App\Helpers\commonHelper::getProductCategoryNameById($value['category_id']),
						
					];
				}
				
				return response(array("message" => 'Deals of the day products fetched successfully.','result'=>$products),200); 
			}
		
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 
		
	}
	
	
	public function variantAttributeList(Request $request){

		$productVariants=array(); $productAttributes=array();

		if(isset($_GET['category_id']) && (int) $_GET['category_id']>0){ 

			$categoryIdResult=\App\Helpers\commonHelper::getAllCategoryTreeidsArray($_GET['category_id']);
			$categoryIdResult[]=$_GET['category_id'];
			
			$productVariants=\App\Models\Product::select('variantproducts.variant_id')->whereIn('products.category_id',$categoryIdResult)->join('variantproducts','variantproducts.product_id','=','products.id')->where('variantproducts.status','1')->where('variantproducts.recyclebin_status','0')->where('products.status','1')->where('products.recyclebin_status','0')->pluck('variantproducts.variant_id')->toArray();
			$productVariants=array_unique($productVariants);

			$productAttributes=\App\Models\Product::select('variantproducts.variant_attributes')->whereIn('products.category_id',$categoryIdResult)->join('variantproducts','variantproducts.product_id','=','products.id')->where('variantproducts.status','1')->where('variantproducts.recyclebin_status','0')->where('products.status','1')->where('products.recyclebin_status','0')->pluck('variantproducts.variant_attributes')->toArray();
			$productAttributes=array_unique($productAttributes);
		}else{
			
			$productVariants=\App\Models\Product::select('variantproducts.variant_id')->join('variantproducts','variantproducts.product_id','=','products.id')->where('variantproducts.status','1')->where('variantproducts.recyclebin_status','0')->where('products.status','1')->where('products.recyclebin_status','0')->pluck('variantproducts.variant_id')->toArray();
			$productVariants=array_unique($productVariants);

			$productAttributes=\App\Models\Product::select('variantproducts.variant_attributes')->join('variantproducts','variantproducts.product_id','=','products.id')->where('variantproducts.status','1')->where('variantproducts.recyclebin_status','0')->where('products.status','1')->where('products.recyclebin_status','0')->pluck('variantproducts.variant_attributes')->toArray();
			$productAttributes=array_unique($productAttributes);
		}

		if(!empty($productAttributes)){

			$query=\App\Models\Variant::where('status','1')->orderBy('sort_order','ASC');

			if(!empty($productVariants)){

				$query->whereIn('id',$productVariants);
			}

			$variant=$query->get();

		}

		if(empty($productAttributes)){

			return response(array('message'=>'Variants not found.'),404);

		}else if($variant->count()>0){

			$result=[];

			foreach($variant as $value){

				$attributeQuery=\App\Models\Variant_attribute::where('status','1')->where('variant_id',$value->id)->orderBy('sort_order','ASC');

				if(!empty($productAttributes)){

					$attributeQuery->whereIn('id',$productAttributes);
				}
		
				$atributeResult=$attributeQuery->get();

				$result[]=array(
					'id'=>$value->id,
					'name'=>ucfirst($value->name),
					'attributes'=>$atributeResult
				);
			}

			return response(array('message'=>'Variants attributes fetched successfully.','result'=>$result),200);

		}else{

			return response(array('message'=>'Variants not found.'),404);
		}
	}

	public function initiatePayment1(Request $request){

		$rules['order_id']='required|exists:sales,order_id';

		$validator = Validator::make($request->json()->all(), $rules);
		
		if ($validator->fails()){
			
			$message = "";
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
			
		}else{

			$result=\App\Models\Sales::with('getsalesdetailchild')->where('order_id',$request->json()->get('order_id'))->first();

			if(!$result || empty($result['getsalesdetailchild'])){

				return response(array("message" => "Invalid Order id."),404); 

			}else{

				// if($result->currency_id==1){

					$salesDetail=\App\Models\Sales_detail::select('id')->where('sale_id',$result->id)->pluck('id')->toArray();

					$transactionId=strtotime("now").rand(11,99);

					$payment=new \App\Models\Transaction();

					$payment->user_id=$result->user_id;
					$payment->order_id=$result->order_id;
					$payment->payment_by='1';
					$payment->currency_id=$result->currency_id;
					$payment->transaction_id=$transactionId;
					$payment->amount=$result->net_amount;
					$payment->payment_status='0';
					$payment->save();

					//create order on razor pay payment gateway
		
					$api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

					$currencyResult=\App\Models\Currency_value::where('id',$result['currency_id'])->first();

					$order = $api->order->create(array(
						'receipt' => $result['order_id'],
						'amount' => $result['net_amount'] * 100,
						'currency' => $currencyResult['currency_code']
						)
					);

					$address=$result['address_line1'];

					if($result['address_line2']){

						$address.=' '.$result['address_line2'];

					}

					$json=[];
					$json['razorpay_orderid']=$order['id'];
					$json['suborderid']=implode(',',$salesDetail);

					$json['userdata']=[
						'name'=>$result['name'],
						'email'=>$result['email'],
						'contact'=>$result['mobile'],
						'address'=>$address,
						'description'=>'Order Checkout'
					]; 

					$json['order_amount']=$result['net_amount'];

					$json['order_id']=$result['order_id'];

					$json['transaction_id']=$transactionId;

					$json['payment_gateway']='razorpay';

					$json['message']="Order Initiated successfully."; 

					return response($json,200); 

				// }else{

				// 	try{

				// 		$data = [];
				// 		$data['items']=[];
				// 		foreach($result['getsalesdetailchild'] as $salesdetail){

				// 			$data['items'][]=[
				// 				'name'=>$salesdetail['product_name'],
				// 				'price'=>$salesdetail['amount'],
				// 				'qty'=>(float) $salesdetail['qty']
				// 			];
				// 		}
				
				// 		$data['invoice_id'] = $result['order_id'];
				// 		$data['invoice_description'] = "Order #{$result['order_id']} Bill";
				// 		$data['return_url'] = route('success.payment');
				// 		$data['cancel_url'] = route('cancel.payment'); 
				// 		$data['subtotal'] = (float) $result['subtotal'];
				// 		$data['shipping'] = (float) $result['shipping']; 
				// 		$data['total'] = (float) $result['net_amount'];
				// 		$data['shipping_discount'] = (float) $result['couponcode_amount'] + (float) $result['discount'];
 
				// 		$currencyResult=\App\Models\Currency_value::where('id',$result['currency_id'])->first();

				// 		$provider = new ExpressCheckout;
				 
				// 		$response = $provider->setExpressCheckout($data);
				// 		$response = $provider->setCurrency($currencyResult['currency_code']); 
				// 		$response = $provider->setExpressCheckout($data, true);
						
				// 		$transactionId=strtotime("now").rand(11,99);

				// 		$payment=new \App\Models\Transaction();
				// 		$payment->user_id=$result->user_id;
				// 		$payment->order_id=$result->order_id;
				// 		$payment->payment_by='2';
				//		$payment->currency_id=$result->currency_id;
				// 		$payment->transaction_id=$transactionId;
				// 		$payment->amount=$result->net_amount;
				// 		$payment->paypal_token=$response['TOKEN'];
				// 		$payment->payment_status='0'; 
				// 		$payment->save();
						
				// 		$json['message']="Order Initiated successfully."; 

				// 		$json['payment_link']=$response['paypal_link'];

				// 		$json['payment_gateway']='paypal';

				// 		return response($json,200); 

				// 	}catch (\Exception $e){

				// 		return response(['message'=>'Something went wrong. Please try again.'],403); 

				// 	} 
					
				// }
				
			}
		}
	}


	public function updatePayment(){ 

		$console=new \App\Models\PaymentConsole();

		$console->value=file_get_contents('php://input');

		$console->save();

		$inputData = json_decode(file_get_contents('php://input'),true);

		if(!empty($inputData)){

			try{

				if(isset($inputData['payload']['refund'])){

					$transaction=\App\Models\Transaction::where('transaction_id',$inputData['payload']['refund']['entity']['notes']['merchant_transactionid'])->first();

					$saleIdArray=explode(',',$inputData['payload']['refund']['entity']['notes']['sales_id']);

				}elseif(isset($inputData['payload']['payment'])){

					$transaction=\App\Models\Transaction::where('transaction_id',$inputData['payload']['payment']['entity']['notes']['merchant_transactionid'])->first();

					$saleIdArray=explode(',',$inputData['payload']['payment']['entity']['notes']['sales_id']);
				}
				
				if($transaction){

					$transaction->razorpay_order_id=$inputData['payload']['payment']['entity']['order_id'];
					$transaction->razorpay_paymentid=$inputData['payload']['payment']['entity']['id'];
					$transaction->method=$inputData['payload']['payment']['entity']['method'];
					$transaction->card_id=$inputData['payload']['payment']['entity']['card_id'];
					$transaction->bank=$inputData['payload']['payment']['entity']['bank'];
					$transaction->wallet=$inputData['payload']['payment']['entity']['wallet'];
					$transaction->vpa=$inputData['payload']['payment']['entity']['vpa'];
					$transaction->contact=$inputData['payload']['payment']['entity']['contact'];
					$transaction->description=$inputData['payload']['payment']['entity']['description'];
					$transaction->error_code=$inputData['payload']['payment']['entity']['error_code'];
					$transaction->error_description=$inputData['payload']['payment']['entity']['error_description'];
					$transaction->error_reason=$inputData['payload']['payment']['entity']['error_reason'];

					if(isset($inputData['payload']['payment']['entity']['acquirer_data']['bank_transaction_id'])){

						$transaction->bank_transaction_id=$inputData['payload']['payment']['entity']['acquirer_data']['bank_transaction_id'];

					}

					$transaction->payment_status='1';
					if($inputData['event']=='payment.captured'){
						$transaction->payment_status='2';
					}else if($inputData['event']=='payment.failed'){
						$transaction->payment_status='0';
					}else if($inputData['event']=='refund.failed'){
						$transaction->payment_status='8';
					}else if($inputData['event']=='refund.processed'){
						$transaction->payment_status='5';
					}
				
					$transaction->save();

					if(!empty($saleIdArray) && $saleIdArray[0]!=''){

						foreach($saleIdArray as $saleId){

							$saleDetail=\App\Models\Sales_detail::find($saleId);

							if($transaction->payment_status=='2'){
								$saleDetail->order_status="1";
							}
							
							$saleDetail->payment_status=$transaction->payment_status;

							$saleDetail->save();
						}
					}

					if($inputData['event']=='payment.captured'){

						$result=\App\Models\Sales::with('getsalesdetailchild')->where('sales.order_id',$inputData['payload']['payment']['entity']['notes']['merchant_order_id'])->first()->toArray();

						if(!empty($result)){

							// send Msg
							$content ="https://bulksmsapi.vispl.in/?username=fiveotp&password=five_1234&messageType=text&mobile=".$result['phone_code'].$result['mobile']."&senderId=FFERNS&ContentID=1707163756701539494&EntityID=1701163375929957226&message=Order Placed: Thank you for Shopping on FiveFerns. We have received an order with orderID: ".$inputData['payload']['payment']['entity']['notes']['merchant_order_id'].". We will notify you as soon as the order is Confirmed. - Team FiveFerns";				
							\App\Helpers\commonHelper::sendMsg($content);

							\Mail::send('email_templates.order_place', compact('result'), function($message) use ($result)
							{
								$message->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
								$message->subject('Order Placed Successfully');
								$message->to($result['email']);
							});

						}
						
					}

				}

			}catch (\Exception $e){
							
				$console=new \App\Models\PaymentConsole();

				$console->value=$e->getMessage();
		
				$console->save();
			
			}

		}

		echo 'done';
	}

	public function checkPincode(Request $request){

		$getUrl = env('Delhivery_url').'/pin-codes/json/?token='.env('Delhivery_token').'&filter_codes='.$request->get('filter_codes').'';
		$apiresult = file_get_contents($getUrl);

		$postcode = json_decode($apiresult,true);

		if(empty($postcode['delivery_codes'])){
		 
			return response(array('message'=>"We are not available in this location."),404);
		
		}else{
			
			return response(array('message'=>"We are available in this location."),200);

		}

	}

	public function newsletterSubscribe(Request $request){
		
		$rules['email']='required|email';

		$validator = Validator::make($request->json()->all(), $rules);
		
		if ($validator->fails()){
			
			$message = "";
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
			
		}else{
			
			try{

				$checkExistEmail= \App\Models\Newsletter::where('email',$request->json()->get('email'))->first();

				if($checkExistEmail){

					return response(array('message'=>"This Email-id is already registered with us."),403);

				}else{
					
					$couponResult = new \App\Models\Newsletter();

					$couponResult->email=$request->json()->get('email');

					$couponResult->save();

					return response(array('message'=>"Newsletter Subscribed Successfully."),200);

				}

			}catch (\Exception $e){
				
				return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
			
			}
			
		}
	}

	public function trackOrder(Request $request){
		
		$rules['order_id']='required';

		$validator = Validator::make($request->json()->all(), $rules);
		
		if ($validator->fails()){
			
			$message = "";
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
			
		}else{
			
			try{

				$checkExistOrder=\App\Models\Sales_detail::where('suborder_id',$request->json()->get('order_id'))->select('suborder_id', 'waybill_no', 'is_approve', 'order_status')->groupBy('sales_details.suborder_id')->get();
				   
				if(count($checkExistOrder)==0){
					
					$checkExistOrder1 = \App\Models\Sales_detail::Where('order_id',$request->json()->get('order_id'))->select('order_id','suborder_id', 'waybill_no','is_approve','order_status')->groupBy('sales_details.suborder_id')->get();
					
					if(count($checkExistOrder1)>0){

						return response(array('message'=>"Order fetch successfully",'result'=>$checkExistOrder1),200); 

					}else{

						return response(array('message'=>"Order not found",'result'=>""),403);
					}

				}else{

					return response(array('message'=>"Order fetch successfully",'result'=>$checkExistOrder),200);

				}

			}catch (\Exception $e){
				
				return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
			
			}
			
		}
	}
	
	public function notifyProduct(Request $request){
		
		$rules = [
			'email' => 'required|email',    
            'product_id' => 'required|numeric|exists:variantproducts,id',
		];


		$validator = Validator::make($request->json()->all(), $rules);
		 
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
		}else{

			try{
					

				// check exist result
				$result=\App\Models\Notifyproduct::where('product_id',$request->json()->get('product_id'))->where('email',$request->json()->get('email'))->first();

				if($result){

					return response(array('message'=>'You have already notified for this product.'),200);

				}else{

					$data=new \App\Models\Notifyproduct();
					$data->email=$request->json()->get('email');
					$data->product_id=$request->json()->get('product_id');
					$data->save();
					
					return response(array('message'=>'We will notify you when that product is in stock'),200);
					
				}
				
				
			}catch (\Exception $e){
				
				return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
			
			}
		}
    }

	public function changeDeliveryStatus(Request $request){

		$orderResult= \App\Models\Sales_detail::where('order_status','!=','9')->where('is_approve','1')->get();

		if($orderResult->count()>0){

			foreach($orderResult as $order){

				$waybill = $order->waybill_no;
				$getUrl = "https://track.delhivery.com/api/v1/packages/json/?waybill=$waybill&verbose=2&token=fac9a0852713fb923b9f74d58a32834d7772c81d";
				$apiresult = file_get_contents($getUrl);
				$track = json_decode($apiresult,true);
				$package_status = $track['ShipmentData'][0]['Shipment']['Status']['Status'];
				
				if($package_status=='Out for Delivery'){ $order_status = '10'; } 
				
				if($package_status=='Delivered'){ $order_status = '9'; }
	
				$order->order_status=$order_status;
				$order->save();
			}

		}

	}


	public function getFreeShippingAmount(Request $request){

		$result=\App\Models\Setting::where('id','2')->first();

		if($result){

			return response(array('message'=>'Frees shipping amount fetched successfully.','amount'=>$result->value));

		}else{

			return response(array('message'=>'Frees shipping amount fetched successfully.','amount'=>'0'));
			
		}

	}

	
	public function contactFormSubmit(Request $request){
		
		$rules = [
			'name' => 'required',
			'mobile' => 'required',
			'subject' => 'required',
			'message' => 'required',
		];


		$validator = Validator::make($request->json()->all(), $rules);
		 
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
		}else{

			try{
				
				$data=new \App\Models\ContactUs();
				$data->name=$request->json()->get('name');
				$data->mobile=$request->json()->get('mobile');
				$data->subject=$request->json()->get('subject');
				$data->message=$request->json()->get('message');
				$data->save();
				
				return response(array('message'=>'Your contact request has been sent successfully'),200);
				
			}catch (\Exception $e){
				
				return response(array("error"=> true, "message" => $e->getMessage()),403); 
			
			}
		}
    }

	public function WholesaleRegistration(Request $request){
		
		$rules = [
            'first_name' => 'required|max:55|string|min:3',
            'last_name' => 'required|max:55|string|min:3',
            'email' => 'required|email',    
            'password' => 'required|min:8',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'mobile' => 'required',
            'landline' => 'required',
            'phone_code' => 'required',
            'address' => 'required',
            'password_confirmation' => 'required|same:password|min:8',
            'user_type' => 'required|in:Small Business Owners,Custom Merchandise,Large distributors,Design studio',
		];

		if($request->json()->get('country_id')=='101'){

			$rules['postal_code']="required|digits:6";

		}else{

			$rules['postal_code']="required|digits:5";
		}

		$validator = Validator::make($request->json()->all(), $rules);
		 
		if ($validator->fails()) {
			$message = [];
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
		}else{

			try{
				
				//chk unique email
				$emailResult=\App\Models\User::where([
										['email','=',$request->json()->get('email')],
										['reg_type','=','email'],
										])->first();
										
				if($emailResult){
					
					return response(array('message'=>'Email is already exist with us. Please try another email id.'),403);
				
				}else{

					if($request->json()->get('reference_code')){

						$codeResult=\App\Models\User::where('reference_code',$request->json()->get('reference_code'))->first();
						if(!$codeResult){

							return response(array('message'=>'You have enter reference code does not exist. Please try another reference code.'),403);
				
						}
					}
					
					$user=new \App\Models\User();
					$user->name=$request->json()->get('first_name').' '.$request->json()->get('last_name');
					$user->email=$request->json()->get('email');
					$user->password=$request->json()->get('password');
					$user->postal_code=$request->json()->get('postal_code');
					$user->mobile=$request->json()->get('mobile');
					$user->landline=$request->json()->get('landline');
					$user->country_id=$request->json()->get('country_id');
					$user->state_id=$request->json()->get('state_id');
					$user->city_id=$request->json()->get('city_id');
					$user->address=$request->json()->get('address');
					$user->phone_code=$request->json()->get('phone_code');
					$user->reg_type='email';
					$user->status='1';
					$user->user_type=$request->json()->get('user_type');
					$user->designation_id=3;
					
					if(($request->json()->get('user_type') != 'Admin') && $request->json()->get('reference_code')){

						$user->used_reference_code=$request->json()->get('reference_code');

						$notification = new \App\Models\Notification();
						$notification->user_id = $codeResult->id;
						$notification->title = 'New User Registration';
						$notification->message = 'New User Registration in '.$request->json()->get('user_type');
						$notification->save();

					}
					$user->save();

					$to=$request->json()->get('email');
					$name=$request->json()->get('first_name').' '.$request->json()->get('last_name');
				
					\Mail::send('email_templates.registraion_success', compact('name'), function($message) use ($to)
					{
						$message->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
						$message->subject('Registration successfully.');
						$message->to($to);
					});

					if($request->json()->get('user_type') != 'Large distributors'){
						$code = 'NEWUSER'.$user->id;
						$coupon=new \App\Models\Coupon();
						$coupon->user_id=$user->id;
						$coupon->title='New Wholesale Registration '.$user->id;
						$coupon->coupon_code=$code;
						$coupon->start_date=date('Y-m-d');
						$coupon->end_date=date('Y-m-d',strtotime('12/24/2050'));
						$coupon->totalno_uses=1;
						$coupon->minorder_amount=10;
						$coupon->discount_type='1';
						$coupon->discount_amount=10;
						$coupon->type='B2B';
						$coupon->status='1';
						$coupon->save();

						$msg = "Please redeem this code : ".$code." on any product service purchase to receive an instant 10% off at checkout!";

						// coupon code create onetime used 
						\Mail::send('email_templates.coupon_code', compact('msg','name'), function($message) use ($to)
						{
							$message->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
							$message->subject('Registration Coupon Code.');
							$message->to($to);
						});
					}else{
						
						$salesteam=$codeResult->email;
						$name='New User Registration in '.$request->json()->get('user_type');
					
						\Mail::send('email_templates.registraion_success', compact('name'), function($message) use ($salesteam)
						{
							$message->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
							$message->subject('New User Registration');
							$message->to($salesteam);
						});
					}
					

					$address= new \App\Models\Addressbook();
					$address->user_id=$user->id;
					$address->name=$request->json()->get('first_name').' '.$request->json()->get('last_name');
					$address->mobile=$request->json()->get('mobile');
					$address->email=$request->json()->get('email');
					$address->phone_code=$request->json()->get('phone_code');
					$address->address_line1=$request->json()->get('address');
					$address->address_line2='';
					$address->country_id=$request->json()->get('country_id');
					$address->state_id=$request->json()->get('state_id');
					$address->city_id=$request->json()->get('city_id');
					$address->pincode=$request->json()->get('postal_code');
					$address->type='2';
					$address->save();

					if($request->json()->get('newsletter')){

						$newsletter= new \App\Models\Newsletter();
						$newsletter->email=$request->json()->get('email');
						$newsletter->save();
	
					}
					
					return response(array('message'=>"Registration successfully.","token"=>$user->createToken('authToken')->accessToken,"result"=>$user->toArray()),200);
					
					//return response(array('message'=>'An email with OTP has been sent, Please verify.'),200);
					
				}
				
			}catch (\Exception $e){
				
				return response(array("error" 
						=> true, "message" => $e->getMessage()),403); 
			
			}
		}

    }
	
	public function relatedProduct(Request $request){

		try{
			
			$category = $_GET['category'] ?? '';

			$query=\App\Models\Product::Select('products.name','variantproducts.id as variantproductid','variantproducts.sale_price','variantproducts.discount_type','variantproducts.discount_amount','variantproducts.slug','variantproducts.images')->where([
																	['products.status','=','1'],
																	['products.recyclebin_status','=','0'],
																	['variantproducts.status','=','1'],
																	['products.category_id','=',$category],
																	])->join('variantproducts','variantproducts.product_id','=','products.id')->groupBy('variantproducts.product_id')->orderBy('variantproducts.id','Desc');
		


			$productResult=$query->get();
			
			if(!$productResult){
				
				return response(array("message" => 'Product not found.'),403); 

			}else{
				
				$result=[];
				
				foreach($productResult as $value){
					
					$imagesArray=explode(',',$value->images);
					
					$secondImage=Null;
					if(isset($imagesArray[1])){
						$secondImage=asset('uploads/products/'.$imagesArray[1]);
					}
					
					$result[]=[
						'variant_productid'=>$value['variantproductid'],
						'name'=>ucfirst($value['name']),
						'sale_price'=>$value['sale_price'],
						'discount_amount'=>$value['discount_amount'],
						'offer_price'=>\App\Helpers\commonHelper::getOfferProductPrice($value['sale_price'],$value['discount_type'],$value['discount_amount']),
						'first_image'=>asset('uploads/products/'.$imagesArray[0]),
						'second_image'=>$secondImage,
						'slug'=>$value['slug'],
						'stock'=>$value['stock'],
						'category'=>\App\Helpers\commonHelper::getProductCategoryNameById($value['category_id']),
					];
				}

				return response(array("message" => 'Products fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		}
		
	}

	public function newProduct(Request $request){
		
		try{

			$query=\App\Models\Product::select('variantproducts.*','products.name','products.category_id')->where([
													['products.status','=','1'],
													['products.recyclebin_status','=','0'],
													['variantproducts.status','=','1'],
													['variantproducts.recyclebin_status','=','0']
												])->join('variantproducts','variantproducts.product_id','=','products.id');
		
			
			$collection = '4';
			$query->where(function($query1) use($collection){

				$query1->orWhere('products.whole_collection_status',$collection);
				$query1->OrWhere('products.whole_collection_status','LIKE','%,'.$collection);
				$query1->OrWhere('products.whole_collection_status','LIKE',$collection.',%');
				$query1->OrWhere('products.whole_collection_status','LIKE','%,'.$collection.',%');
			});

			$result = $query->groupBy('variantproducts.product_id')->orderBy('products.id','Desc')->limit(8)->get();

			if($result->count()==0){
				
				return response(array("message" => 'Deals of the day products Not found.'),404); 

			}else{
				
				$products=[];
				foreach($result as $value){
					
					$imagesArray=explode(',',$value->images);
					
					$secondImage=Null;
					if(isset($imagesArray[1])){
						$secondImage=asset('uploads/products/'.$imagesArray[1]);
					}
					
					$products[]=[
						'variant_productid'=>$value['id'],
						'name'=>ucfirst($value['name']),
						'sale_price'=>$value['sale_price'],
						'discount_amount'=>$value['discount_amount'],
						'offer_price'=>\App\Helpers\commonHelper::getOfferProductPrice($value['sale_price'],$value['discount_type'],$value['discount_amount']),
						'first_image'=>asset('uploads/products/'.$imagesArray[0]),
						'second_image'=>$secondImage,
						'slug'=>$value['slug'],
						'stock'=>$value['stock'],
						'category'=>\App\Helpers\commonHelper::getProductCategoryNameById($value['category_id']),
						
					];
				}
				
				return response(array("message" => 'Deals of the day products fetched successfully.','result'=>$products),200); 
			}
		
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 
		
	}

	
	public function getArtisanDetails(Request $request){

		try{
				
			$artisanResult=\App\Models\ArtisiansInfo::Select('artisians_infos.*')->where([
																	['artisians_infos.status','=','1'],
																	['artisians_infos.recyclebin_status','=','0'],
																	['products.id','=',$request->get('product_id')]
																	])->join('products','products.artisan_id','=','artisians_infos.id')->first();
			

			if($artisanResult->count()==0){
				
				return response(array("message" => 'Artisan not found.'),404); 
				
			}else{
				
				
				$result=[
					'id'=>$artisanResult->productid,
					'image'=>asset('uploads/artisan/'.$artisanResult->image),
					'name'=>ucfirst($artisanResult->name),
					'description'=>$artisanResult->description,
				];
				
				return response(array("message" => 'Artisan fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		}
		
	}


	public function staffList(Request $request){
 
		try{

			$staffResult=\App\Models\Staff::where([
													['status','=','1'],
													['recyclebin_status','=','0'],
													])->orderBy('id','ASC')->get();
			
			if(!$staffResult){
				
				return response(array("message" => 'Result not found.'),404); 
			}else{
				
				$result=[];
				
				foreach($staffResult as $slider){
					
					$result[]=[
						'image'=>asset('uploads/staff/'.$slider->image),
						'name'=>$slider->name,
						'designation'=>$slider->designation,
						'location'=>$slider->location
					];
				}
				return response(array("message" => 'Staff fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 	 
		
	}
	
	public function ArtisanList(Request $request){
 
		try{

			$staffResult=\App\Models\ArtisiansInfo::where([
													['status','=','1'],
													['recyclebin_status','=','0'],
													])->orderBy('id','ASC')->get();
			
			if(!$staffResult){
				
				return response(array("message" => 'Result not found.'),404); 
			}else{
				
				$result=[];
				
				foreach($staffResult as $artisanResult){
					
					$result[]=[
						'id'=>$artisanResult->productid,
						'image'=>asset('uploads/artisan/'.$artisanResult->image),
						'name'=>ucfirst($artisanResult->name),
						'description'=>$artisanResult->description,
					];
				}
				return response(array("message" => 'Artisan fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 	 
		
	}
	
	public function getSubCategoryList(Request $request){
 
		try{

			
			$query=\App\Models\Category::where([
													['parent_id','!=',null],
													['status','=','1'],
													['recyclebin_status','=','0'],
													])->orderBy('id','ASC');
			
			if(isset($_GET['type']) && $_GET['type'] == 'small-business-owners' || $_GET['type'] == 'large-distributors'){

				$type = "Other";

				$query->where('business_type',$type);
	
			}elseif(isset($_GET['type']) && $_GET['type'] == 'custom-merchandise'){
	
				$type = "Custom Merchandise";
				$query->where('business_type',$type);
	
			}elseif(isset($_GET['type']) && $_GET['type'] == 'interior-design-studio'){
	
				$type = "Interior Design Studio";
				$query->where('business_type',$type);
	
			}

			$categoryResult= $query->get();

			if(!$categoryResult){
				
				return response(array("message" => 'Result not found.'),404); 
			}else{
				
				$result=[];
				
				foreach($categoryResult as $category){
					
					$result[]=[
						'id'=>$category->id,
						'image'=>asset('uploads/category/'.$category->image),
						'slug'=>$category->slug,
						'name'=>ucfirst($category->name),
						'type'=>ucfirst($category->business_type),
					];
				}
				return response(array("message" => 'Category fetched successfully.','result'=>$result),200); 
				
			}
			
		}catch (\Exception $e){
			
			return response(array("message" => $e->getMessage()),403); 
		
		} 	 
		
	}

	
	public function initiatePayment(Request $request){

		$rules['order_id']='required|exists:sales,order_id';

		$validator = Validator::make($request->json()->all(), $rules);
		
		if ($validator->fails()){
			
			$message = "";
			$messages_l = json_decode(json_encode($validator->messages()), true);
			foreach ($messages_l as $msg) {
				$message= $msg[0];
				break;
			}
			
			return response(array('message'=>$message),403);
			
			
		}else{

			$result=\App\Models\Sales::with('getsalesdetailchild')->where('order_id',$request->json()->get('order_id'))->first();

			if(!$result || empty($result['getsalesdetailchild'])){

				return response(array("message" => "Invalid Order id."),404); 

			}else{

				$salesDetail=\App\Models\Sales_detail::select('id')->where('sale_id',$result->id)->pluck('id')->toArray();

				$transactionId=strtotime("now").rand(11,99);

				$payment=new \App\Models\Transaction();

				$payment->user_id=$result->user_id;
				$payment->order_id=$result->order_id;
				$payment->razorpay_order_id=$request->json()->get('stripeToken');
				$payment->currency_id=$result->currency_id;
				$payment->transaction_id=$transactionId;
				$payment->amount=$result->net_amount;
				$payment->payment_status='0';
				$payment->save();

				//create order on razor pay payment gateway
				if($result['country_id'] == '2'){
					$currency = "USD";
				}elseif($result['country_id'] == '3'){
					$currency = "CAD";
				}else{
					$currency = "INR";
				}
				\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

				$customer = \Stripe\Customers::create([
					'email' => $result->email,
					'mobile' => $result->mobile,
					'name' => $result->name
				]);

				\Stripe\PaymentIntent::create ([
					"amount" => $result['net_amount'] * 100,
					"currency" => $currency,
					'payment_method_data' => [
						'type' => 'card',
						'card' => [
							'token' => $request->json()->get('stripeToken')
						]
					],
					'payment_method_types' => ['card'],
					"description" => "Order Checkout",
					"metadata" => ["order_id" => $result['order_id']],
					
				]);

				$address=$result['address_line1'];

				if($result['address_line2']){

					$address.=' '.$result['address_line2'];

				}

				$json=[];
				$json['stripe_orderid']=$result['order_id'];
				$json['suborderid']=implode(',',$salesDetail);

				$json['userdata']=[
					'name'=>$result['name'],
					'email'=>$result['email'],
					'contact'=>$result['mobile'],
					'address'=>$address,
					'description'=>'Order Checkout'
				]; 

				$json['order_amount']=$result['net_amount'];

				$json['order_id']=$result['order_id'];

				$json['transaction_id']=$transactionId;

				$json['payment_gateway']='stripe';

				$json['message']="Order Initiated successfully."; 

				return response($json,200); 

			}
		}
	}

	public function webhookResponse(){ 

		$console=new \App\Models\PaymentConsole();

		$console->value=file_get_contents('php://input');

		$console->save();

		try{
			
			$payload = file_get_contents('php://input');
			
			
			$event = null;

			try {
				$event = \Stripe\Event::constructFrom(
					json_decode($payload, true)
				);
				
			} catch(\UnexpectedValueException $e) {
				// Invalid payload
				http_response_code(400);
				exit();
			}

			
			// Handle the event
			switch ($event->type) {
				case 'payment_intent.succeeded':
					$paymentIntent = $event->data->object->metadata->order_id; 
					
					if(isset($paymentIntent)){

						$transaction=\App\Models\Transaction::where('order_id',$paymentIntent)->first();
		
						if($transaction){
		
							$transaction->razorpay_order_id=$event->id;
							$transaction->razorpay_paymentid=$event->data->object->charges->data[0]->payment_intent;
							$transaction->method=$event->data->object->charges->data[0]->payment_method;
							$transaction->card_id=$event->data->object->charges->data[0]->payment_method_details->type;
							$transaction->bank=$event->data->object->charges->data[0]->payment_method;
							$transaction->description=$event->data->object->charges->data[0]->description;
							$transaction->bank_transaction_id=$event->data->object->charges->data[0]->balance_transaction;
							$transaction->customer_id=$event->data->object->charges->data[0]->customer;
							$transaction->payment_status='2';
							$transaction->save();
		
							$saleIdArray=\App\Models\Sales_detail::where('order_id',$paymentIntent)->get();
							$result=\App\Models\Sales::with('getsalesdetailchild')->where('sales.order_id',$paymentIntent)->first()->toArray();
							
							
							if(!empty($saleIdArray) && $saleIdArray[0]!=''){
								
								foreach($saleIdArray as $sale){
		
									$saleDetail=\App\Models\Sales_detail::find($sale->id);
									$saleDetail->payment_status=$transaction->payment_status;
		
									$saleDetail->save();
									
									$productResult= \App\Models\Variantproduct::where('id',$saleDetail['product_id'])->first();
									
									if($productResult){
										
										
										if($result['country_id'] == '233'){
											$productResult->usa_stock = $productResult->usa_stock-$saleDetail['qty'];

										}elseif($result['country_id'] == '39'){
											$productResult->canada_stock = $productResult->canada_stock-$saleDetail['qty'];

										}else{
											
											$productResult->india_stock = $productResult->india_stock-$saleDetail['qty'];
											
										}
										
										$productResult->save();
										
									}
									
									
								}

								$user = \App\Models\User::where('id',$result['user_id'])->first();
								
								if($user->used_reference_code != ''){
									$notification = new \App\Models\Notification();
									$notification->user_id = \App\Helpers\commonHelper::getSalesAdministrationId($user->used_reference_code);
									$notification->title = 'New Order Received ';
									$notification->message = 'new order received by '.$user->user_type.'and order id: '.$paymentIntent;
									$notification->save();
								}
								
								\Mail::send('email_templates.order_place', compact('result'), function($message) use ($result)
								{
									$message->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
									$message->subject('Order Placed Successfully');
									$message->to($result['email']);
								});
							}

						}
		
					}
					
					break;
				case 'payment_intent.payment_failed':

					$paymentIntent = $event->data->object->metadata->order_id; 
					
					if(isset($paymentIntent)){

						$transaction=\App\Models\Transaction::where('order_id',$paymentIntent)->first();
		
						if($transaction){
		
							$transaction->razorpay_order_id=$event->id;
							$transaction->description=$event->data->object->last_payment_error->message;
							$transaction->payment_status='7';
							$transaction->save();
		
							
							$saleIdArray=\App\Models\Sales_detail::where('order_id',$paymentIntent)->get();
							
							if(!empty($saleIdArray) && $saleIdArray[0]!=''){
		
								foreach($saleIdArray as $sale){
		
									$saleDetail=\App\Models\Sales_detail::select('sales_details','sales.country_id')->join('sales','sales.id','=','sales_details.sale_id')->find($sale->id);
									$saleDetail->payment_status=$transaction->payment_status;
		
									$saleDetail->save();

									
								}
							}

							$sale=\App\Models\Sales::where('order_id',$paymentIntent)->first();
							
							$couponResult=\App\Models\Coupon::where([
								['id','=',$sale->couponcode_id],
								['recyclebin_status','=','0'],
								['status','=','1'],
								])->first();
							if($couponResult){
								$couponResult->used_status='0';
								$couponResult->save();
							}
						}
					}
					
					break;
				
				default:
					echo 'Received unknown event type ' . $event->type;
			}

		}catch (\Exception $e){
						
			$console=new \App\Models\PaymentConsole();

			$console->value=$e->getMessage();
	
			$console->save();
		
		}
		echo 'done';
	}

	
	public function croneJobSalesStatus(){ 

		$results = \App\Models\Transaction::where('payment_status','0')->get();
		
		if(!empty($results)){

			foreach($results as $value){

				if($value->razorpay_paymentid != ''){

					$stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
					$event = $stripe->paymentIntents->retrieve(
						$value->razorpay_paymentid,
						[]
					);
					// echo "<pre>";
					// print_r($event); die;

					$paymentIntent = $event['metadata']['order_id'];
						
					if(isset($event) && $event['status'] == 'succeeded'){

						$transaction=\App\Models\Transaction::where('order_id',$paymentIntent)->first();

						if($transaction){

							$transaction->razorpay_order_id=$event->id;
							$transaction->razorpay_paymentid=$event->charges->data[0]->payment_intent;
							$transaction->method=$event->charges->data[0]->payment_method;
							$transaction->card_id=$event->charges->data[0]->payment_method_details->type;
							$transaction->bank=$event->charges->data[0]->payment_method;
							$transaction->description=$event->charges->data[0]->description;
							$transaction->bank_transaction_id=$event->charges->data[0]->balance_transaction;
							$transaction->customer_id=$event->charges->data[0]->customer;
							$transaction->payment_status='2';
							$transaction->save();

							$saleIdArray=\App\Models\Sales_detail::where('order_id',$paymentIntent)->get();
							$result=\App\Models\Sales::with('getsalesdetailchild')->where('sales.order_id',$paymentIntent)->first()->toArray();

							if(!empty($saleIdArray) && $saleIdArray[0]!=''){

								foreach($saleIdArray as $sale){

									$saleDetail=\App\Models\Sales_detail::find($sale->id);
									$saleDetail->payment_status=$transaction->payment_status;

									$saleDetail->save();
									
									$productResult= \App\Models\Variantproduct::where('id',$saleDetail['product_id'])->first();
									
									if($productResult){
										
										
										if($result['country_id'] == '233'){
											$productResult->usa_stock = $productResult->usa_stock-$saleDetail['qty'];

										}elseif($result['country_id'] == '39'){
											$productResult->canada_stock = $productResult->canada_stock-$saleDetail['qty'];

										}else{
											
											$productResult->india_stock = $productResult->india_stock-$saleDetail['qty'];
											
										}
										
										$productResult->save();
										
									}
								}

								$user = \App\Models\User::where('id',$result['user_id'])->first();

								if($user->used_reference_code != ''){
									$notification = new \App\Models\Notification();
									$notification->user_id = \App\Helpers\commonHelper::getSalesAdministrationId($user->used_reference_code);
									$notification->title = 'New Order Received ';
									$notification->message = 'new order received by '.$user->user_type.'and order id: '.$paymentIntent;
									$notification->save();
								}
								
								\Mail::send('email_templates.order_place', compact('result'), function($message) use ($result)
								{
									$message->from(env('MAIL_USERNAME'),env('MAIL_FROM_NAME'));
									$message->subject('Order Placed Successfully');
									$message->to($result['email']);
								});
							}

						}

					}else{

						$transaction=\App\Models\Transaction::where('order_id',$paymentIntent)->first();

						if($transaction){

							$transaction->razorpay_order_id=$event->id;
							$transaction->description=$event->last_payment_error->message;
							$transaction->payment_status='7';
							$transaction->save();

							
							$saleIdArray=\App\Models\Sales_detail::where('order_id',$paymentIntent)->get();
							
							if(!empty($saleIdArray) && $saleIdArray[0]!=''){

								foreach($saleIdArray as $sale){

									$saleDetail=\App\Models\Sales_detail::find($sale->id);
									$saleDetail->payment_status=$transaction->payment_status;

									$saleDetail->save();
								}
							}

							$sale=\App\Models\Sales::where('order_id',$paymentIntent)->first();
							
							$couponResult=\App\Models\Coupon::where([
								['id','=',$sale->couponcode_id],
								['recyclebin_status','=','0'],s
								])->first();
							if($couponResult){
								$couponResult->used_status='0';
								$couponResult->save();
							}
						}
					}
					
				}else{

					if($value->order_id){

						$transaction=\App\Models\Transaction::where('id',$value->id)->first();
						$transaction->razorpay_order_id=$value->order_id;
						$transaction->description='Payment failed';
						$transaction->payment_status='7';
						$transaction->save();

						$saleIdArray=\App\Models\Sales_detail::where('order_id',$value->order_id)->get();
						
						if(!empty($saleIdArray) && $saleIdArray[0]!=''){

							foreach($saleIdArray as $sale){

								$saleDetail=\App\Models\Sales_detail::find($sale->id);
								$saleDetail->payment_status=$transaction->payment_status;

								$saleDetail->save();
							}
						}

						$sale=\App\Models\Sales::where('order_id',$value->order_id)->first();
						
						$couponResult=\App\Models\Coupon::where([
							['id','=',$sale->couponcode_id],
							['recyclebin_status','=','0'],
							])->first();
						if($couponResult){
							$couponResult->used_status='0';
							$couponResult->save();
						}
					}
				}
				
				
			}
		}
		

		echo 'done';
	}

	
	
}