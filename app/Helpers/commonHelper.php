<?php
namespace App\Helpers;
use Ixudra\Curl\Facades\Curl;
use Session;
use DB;

class commonHelper{
	
	public static function callAPI($method, $url, $data=array(),$files=array()){

        
		$url=env('APP_URL').'/api'.$url;

        if($method == 'GET'){

            return $response = Curl::to($url)
			->returnResponseObject()
            ->get();

        }elseif($method == 'PUT'){

            return $response = Curl::to($url)

            ->withData(['title'=>'Test', 'body'=>'body goes here', 'userId'=>1])
			->returnResponseObject()
            ->put();

        }elseif($method == 'DELETE'){

            return $response = Curl::to($url)

                ->delete();
        }elseif($method == 'patch'){

            return $response = Curl::to($url)

                ->withData(['title'=>'Test', 'body'=>'body goes here', 'userId'=>1])
				->returnResponseObject()
                ->patch();
        }elseif($method == 'POST'){

            return $response = Curl::to($url)
                ->withData($data)
				->returnResponseObject()
                ->post();
                
        }elseif($method == 'POSTFILE'){
			
            return $response = Curl::to($url)
                ->withData($data)
				->withFile($files['file_input'],$files['image_file'], $files['getMimeType'], $files['getClientOriginalName']) 
                ->post();
                
        }elseif($method == 'userTokenpost'){

            return $response = Curl::to($url)
                ->withData($data)
                ->withBearer(Session::get('5ferns_user'))
				->returnResponseObject()
                ->post();
                
        }elseif($method == 'userTokenget'){
            return $response = Curl::to($url)
            ->withBearer(Session::get('5ferns_user'))
			->returnResponseObject()
            ->get();
        }
        
    }

	public static function buildMenu($parent, $menu, $sub = NULL) {

        $html = "";

        if (isset($menu['parents'][$parent])){
            if (!empty($sub)) {
                $html .= "<ul id=" . $sub . " class='ml-menu'><li class=\"ml-menu\">" . $sub . "</li>\n";
            } else {
                $html .= "<ul class='list'>\n";
            }

            foreach ($menu['parents'][$parent] as $itemId) {
                
				$active=(request()->is($menu['items'][$itemId]['active_link'])) ? 'active' :'';

				$terget = null;
                if (!isset($menu['parents'][$itemId])) { //if condition is false only view menu
                    $html.= "<li class='".$active."' >\n  <a $terget title='" . $menu['items'][$itemId]['label'] . "' href='" . url($menu['items'][$itemId]['link']) . "'>\n <em class='" . $menu['items'][$itemId]['icon'] . " fa-fw'></em><span>" . $menu['items'][$itemId]['label'] . "</span></a>\n</li> \n";
				}
				
                if (isset($menu['parents'][$itemId])) { //if condition is true show with submenu
                    $html .= "<li class='" . $active . "'>\n  <a onclick='return false;' class='menu-toggle' href='#" . $menu['items'][$itemId]['label'] . "'> <em class='" . $menu['items'][$itemId]['icon'] . " fa-fw'></em><span>" . $menu['items'][$itemId]['label'] . "</span></a>\n";
                    $html .= self::buildMenu($itemId, $menu, $menu['items'][$itemId]['label']);
                    $html .= "</li> \n";
                }
				
            }
            $html .= "</ul> \n";
			
        }

        return $html;

    }

	public static function getSidebarMenu(){
		
		if(Session::has('fivefernsadminmenu')){

			$result=Session::get('fivefernsadminmenu');

			$menu = array(
				'items' => array(),
				'parents' => array()
			);
	
			foreach ($result as $v_menu) {
				$menu['items'][$v_menu['menu_id']] = $v_menu;
				$menu['parents'][$v_menu['parent']][] = $v_menu['menu_id'];
			}
	
			return  \App\Helpers\commonHelper::buildMenu(0, $menu);
		}

	}

	
	public static function getSubcategoryById($id){
		
		return \App\Models\Category::where('parent_id',$id)->where('status','1')->where('recyclebin_status','0')->get()->toArray();
	}
	
    public static function getCategoryTree($id){
		
		$category=[];
		
		$categoryResult=\App\Helpers\commonHelper::getSubcategoryById($id);
		
		if($categoryResult){
			
			foreach($categoryResult as $element){
					
				$childResult=\App\Helpers\commonHelper::getCategoryTree($element['id']);

				if($childResult){
					
					$element['child']=$childResult;
				}
				
				$category[]=$element;
			}
		}
		
		return $category;
	}
	
	public static function getCategoryTreeids($id){
		
		$ids="";
		
		$categoryResult=\App\Helpers\commonHelper::getSubcategoryById($id);
		
		if($categoryResult){
			
			foreach($categoryResult as $element){
					
				$childResult=\App\Helpers\commonHelper::getCategoryTreeids($element['id']);

				if($childResult){
					
					$ids.=$childResult;

				}

				$ids.=$element['id'].',';
			}
		}
		
		return $ids;
	}

	public static function getCategoryTreeidsArray($id){

		$idsResult=\App\Helpers\commonHelper::getCategoryTreeids($id);
		
		$idArray=array();

		if(rtrim($idsResult,' , ')){

			$idArray=explode(',',rtrim($idsResult,' , '));
		}

		return $idArray;
		
	}

	public static function getAllCategoryTreeids($id){
		
		$ids="";
		
		$categoryResult=\App\Models\Category::where('parent_id',$id)->where('recyclebin_status','0')->get()->toArray();
		
		if($categoryResult){
			
			foreach($categoryResult as $element){
					
				$childResult=\App\Helpers\commonHelper::getAllCategoryTreeids($element['id']);

				if($childResult){
					
					$ids.=$childResult;

				}

				$ids.=$element['id'].',';
			}
		}
		
		return $ids;
	}

	public static function getAllCategoryTreeidsArray($id){

		$idsResult=\App\Helpers\commonHelper::getAllCategoryTreeids($id);
		
		$idArray=array();

		if(rtrim($idsResult,' , ')){

			$idArray=explode(',',rtrim($idsResult,' , '));
		}

		return $idArray;
		
	}
	
	public static function getCategoryTreeById($id){
		
		$name='';
		
		$result=\App\Models\Category::where('id',$id)->first();
		
		if(!empty($result)){
			
			if($result->parent_id>0){
				
				$name.=\App\Helpers\commonHelper::getCategoryTreeById($result->parent_id);
			}
			
			$name.=ucfirst($result->name).' > ';
			
		}
		
		return $name;
	}
	
	
	public static function getParentName($id){
		
		$nameResult=\App\Helpers\commonHelper::getCategoryTreeById($id);
		
		return rtrim($nameResult,' > ');
		
	}

	public static function getParentCategoryTreeId($id){
		
		$ids='';
		
		$result=\App\Models\Category::where('id',$id)->first();
		
		if(!empty($result)){
			
			if($result->parent_id>0){
				
				$ids.=\App\Helpers\commonHelper::getParentCategoryTreeId($result->parent_id);
			}
			
			$ids.=$result->id.',';
			
		}
		
		return $ids;
	}
	
	public static function getParentId($id){
		
		$idResult=\App\Helpers\commonHelper::getParentCategoryTreeId($id);

		return rtrim($idResult,',');
	
	}
	
	
	public static function getAttributeByparentId($id){

		return \App\Models\Variant_attribute::where('variant_id',$id)->where('status','1')->orderBy('sort_order','ASC')->get();
		
	}
	
	public static function getOtp(){
		
        $otp = mt_rand(1000,9999);

        return $otp;
	}
	
	public static function sendMsg($url){
        
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_exec($ch);
		curl_close($ch);
	}
	
	public static function getOrderStatusName($id){
		
		$data=array(
			'0'=>'Failed',
			'1'=>'Pending',
			'2'=>'Confirmed',
			'3'=>'Cancelled',
			'4'=>'Order cancel by user',
			'5'=>'Rejected',
			'6'=>'Cancel request pending',
			'7'=>'Rejected',
			'8'=>'Order Returned',
			'9'=>'Delivered',
			'10'=>'Shipped'
		);
		
		return $data[$id];
	}
	
	
	public static function getPaymentStatusName($id){
		
		$data=array(
			'0'=>'Payment Unpaid',
			'1'=>'Failed',
			'2'=>'Payment Paid',
			'3'=>'Refund Initiated',
			'4'=>'Refund In Progress',
			'5'=>'Refund Completed',
			'6'=>'Payment Initiated',
			'7'=>'Payment Failed',
			'8'=>'Refund Failed',
		);
		
		return $data[$id];
	}
	
	
	public static function getStateNameById($id){
		
		$result=\App\Models\State::where('id',$id)->first();
		
		return ucfirst($result->name);
	}
	
	
	public static function getCityNameById($id){
		
		$result=\App\Models\City::where('id',$id)->first();
		
		if($result){

			return ucfirst($result->name);

		}else{

			return 'N/A';

		}
		
	}
	
	public static function getCountryidByStateId($id){
		
		$result=\App\Models\State::where('id',$id)->first();
		
		return $result->country_id;
	}
	
	public static function getCountryNameById($id){
		
		$result=\App\Models\Country::where('id',$id)->first();
		
		return ucfirst($result->name);
	}
	
	public static function getOfferProductPrice($salePrice,$discountType,$discountAmount){

		$discountAmount=$discountAmount;
		if($discountType=='1'){
			
			$discountAmount=round((($salePrice*$discountAmount)/100),2);
		}
		
		return $salePrice-$discountAmount;
	}

	public static function movecartDataWithUser(){

        if(Session::has('5ferns_cartuser') && Session::has('5ferns_user')){

			$cartData=Session::get('5ferns_cartuser');

			if(!empty($cartData)){

				foreach($cartData as $cart){

					\App\Helpers\commonHelper::callAPI('userTokenpost','/add-cart',json_encode(array('id'=>'0','product_id'=>$cart['product_id'],'qty'=>$cart['qty'],'remark'=>$cart['remark'],'add_type'=>'add')));

				}

				Session::forget('5ferns_cartuser');
			}

		}
    }

	public static function getShippingAmount($length,$breadth,$height,$weight,$countryId='101',$shippingId){

		// $dimansionWeight=($length*$breadth*$height)/4000;

		// $actualWeight=max($dimansionWeight,$weight);

		// $pointValue=ceil($actualWeight/500);

		// if((int) $countryId==0){
			
		// 	return "0";

		// }else if($countryId=='101'){

		// 	$settingResult=\App\Models\Setting::where('id',\Session::get('shipping_id'))->first();

		// }else{

		// 	$settingResult=\App\Models\Setting::where('id',\Session::get('shipping_id'))->first();
		// }
		if(!$shippingId){
			return "0";
		}else{
			$settingResult=\App\Models\Setting::where('id',$shippingId)->first();
		
			return $settingResult->value;
		}
		
	}

	public static function convert_number_to_words($number) {

        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . Self::convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . Self::convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = Self::convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= Self::convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return ucfirst($string);
    }

	public function getVaraintName($variantIds,$variantAttributes){

		$attribute='';
		$variantArray=explode(',',$variantIds);
												
		if(!empty($variantArray) && $variantArray[0]!=''){
			
			$variantResult=\App\Models\Variant::whereIn('id',$variantArray)->where('status','1')->get();
			
			if(!empty($variantResult)){
					
				foreach($variantResult as $variant){
						
					$attributeArray=explode(',',$variantAttributes); 
					
					if(!empty($attributeArray) && $attributeArray[0]!=''){
							$attributeResult=\App\Models\Variant_attribute::whereIn('id',$attributeArray)->where('variant_id',$variant['id'])->where('status','1')->first();
							
						if($attributeResult){
							
							$attribute.='<label class="labelbold">'.$variant['name'].'</label>:  '.$attributeResult['title'].', ';
						}
						
					} 
				}
			}
		}
		
		return rtrim($attribute,' ,');
	}

	public function getPriceByCountry($price){

		$countryId='1';

		if(Session::has('country_id')){

			$countryId=Session::get('country_id');
		}

		$result=\App\Models\Currency_value::where('id',$countryId)->first();

		$firstIcon='Rs.';
		$SecondIcon='';
		if($result){

			$price=round(($price*$result['value']),2);
			$firstIcon=$result['first_icon'];
			$SecondIcon=$result['second_icon'];
		}

		return $firstIcon.' '.number_format($price,2).' '.$SecondIcon;

	}

	public function getPriceAmountByCountryId($price,$countryId){


		$result=\App\Models\Currency_value::where('id',$countryId)->first();

		if($result){

			$price=round(($price*$result['value']),2);
		}

		return $price;

	}

	public function getpriceIconByCountry($price,$countryId){
		
		$result=\App\Models\Currency_value::where('id',$countryId)->first();
		
		if($result){
			
			$firstIcon=$result['first_icon'];
			$SecondIcon=$result['second_icon']; 
			
			return $firstIcon.' '.number_format($price,2).' '.$SecondIcon;
		}
		
	}

	public function checkCouponCode($userId,$couponCode,$orderAmount){

		$user = \App\Models\User::where('id',$userId)->first();

		$couponResult=\App\Models\Coupon::where([
			['coupon_code','=',$couponCode],
			['recyclebin_status','=','0'],
			['status','=','1'],
			['start_date','<=',date('Y-m-d')],
			['end_date','>=',date('Y-m-d')]
			])->first();

		if(!$couponResult){

			return ['message'=>'Invalid Coupon code','status'=>'403'];

		}else{

			$totalUsesCoupon=\App\Models\Sales::where([
							['sales.user_id',$userId],
							['sales.couponcode_id',$couponResult->id],
							['sales_details.order_status','!=','0']
							])->join('sales_details','sales_details.sale_id','=','sales.id')->groupBy('sales.order_id')->count();

			if($couponResult['used_status'] == '1'){

				return ['message'=>"This coupon limit has been exceed.",'status'=>'403'];

			}elseif($couponResult->user_id > 0 && $user->designation_id == '3'){

				if($totalUsesCoupon>=$couponResult['totalno_uses']){

					return ['message'=>"This coupon limit has been exceed.",'status'=>'403'];
	
				}else if($couponResult->user_id == $userId){

					$businessCoupon = \App\Models\BusinessCoupon::where('business_type',$user->user_type)->first();
					if($businessCoupon){

						$minOrderArray=array_reverse(explode(',',$businessCoupon->minorder_amount));
            			$disAmountArray=array_reverse(explode(',',$businessCoupon->discount_amount));

						if($minOrderArray[0]!='' && $disAmountArray[0]!='' && count($minOrderArray)==count($disAmountArray)){

							foreach($minOrderArray as $key=>$minorder){
								
								if($orderAmount>=$minorder){

									return ['message'=>"Coupon Code Applied Successfully.","coupon_id"=>$businessCoupon->id,"discount_type"=>$businessCoupon->discount_type,"discount_amount"=>$disAmountArray[$key],'status'=>'200']; 
								
								}
				
							}
						
						}

					}else{

						return ['message'=>'Invalid Coupon code','status'=>'403'];
					}

				}else{

					return ['message'=>"This coupon limit has been exceed.",'status'=>'403'];
				}

			}elseif($user->designation_id != '3'){

				$minOrderArray=array_reverse(explode(',',$couponResult->minorder_amount));
				$disAmountArray=array_reverse(explode(',',$couponResult->discount_amount));

				if($minOrderArray[0]!='' && $disAmountArray[0]!='' && count($minOrderArray)==count($disAmountArray)){

					foreach($minOrderArray as $key=>$minorder){
						
						if($orderAmount>=$minorder){

							return ['message'=>"Coupon Code Applied Successfully.","coupon_id"=>$couponResult->id,"discount_type"=>$couponResult->discount_type,"discount_amount"=>$disAmountArray[$key],'status'=>'200']; 
						
						}
		
					}
				
				}else{

					return ['message'=>'Invalid Coupon code','status'=>'403'];
				}
				
			}else{

				return ['message'=>"This coupon limit has been exceed.",'status'=>'403'];
			}

		}
	}

	
	public static function getCountryTypeName($id){
		
		$data=array(
			'3'=>'Canada',
			'2'=>'USA',
			'1'=>'Rest of the world',
		);
		
		return $data[$id];
	}

	
	
	public static function getVaraintDisplayLayoutName($id){
		
		$data=array(
			'1'=>'Dropdown swatch',
			'2'=>'visual swatch',
			'3'=>'Text swatch',
		);
		
		return $data[$id];
	}
	
	public static function getCategoryNameById($id){
		
		$result=\App\Models\BlogCategory::where('id',$id)->first();
		
		if(!empty($result)){

			return ucfirst($result->name);

		}else{

			return "N/A";
		}
		
	}
	
	public static function getProductCategoryNameById($id){
		
		$result=\App\Models\Category::where('id',$id)->first();
		
		if(!empty($result)){

			return ucfirst($result->name);

		}else{

			return "N/A";
		}
		
	}

	
	public function getTagsByArrayId($id){
		
		$tags = explode(',',$id);  $categoryData= '';
		foreach($tags as $tag){

			$categoryData .= '<li class="blog__tags--media__list"><a class="blog__tags--media__link" href="'.url('blogs?tag='.$tag).'">'.$tag.'</a>'.' </li>';
			
		}
		return rtrim($categoryData, " </li>");
		
	}

	public function getTotalProductByCategory($id){
		
		$category = \App\Models\Category::where('status','1')->where('recyclebin_status','0')->where('parent_id',$id)->get();
		
		$products = 0;
		if(count($category)>0){

			foreach($category as $cate){

				$products+= \App\Models\Product::where('status','1')->where('recyclebin_status','0')->where('category_id',$cate->id)->count();

			}
			
		}

		return $products;
		
		
	}

	
	public static function getReferneceId($id){
		
		return "SALE".str_pad($id, 3, "0", STR_PAD_LEFT);
		
		
	}

	
	public static function getReferenceCodeOfUser($id){
		
		$user = \App\Models\User::where('id',$id)->first();
		if($user && $user->used_reference_code){
			return $user->used_reference_code;
		}else{
			return '';
		}
		
	}

	public static function getProductStock($stock){
		
		if($stock == 0){
			return true;
		}else{
			return false;
		}
		
	}

	public static function getUserAddressId($id){
		
		$address = \App\Models\Addressbook::where('user_id',$id)->first();

		if($address){
			return $address->id;
		}else{
			return 0;
		}
		
	}

	public static function getCouponCodeById($id){
		
		$Coupon = \App\Models\Coupon::where('id',$id)->first();

		if($Coupon){
			return $Coupon->coupon_code;
		}else{
			return "N/A";
		}
		
	}
	
	public static function getSalesAdministrationId($used_reference_code){
		
		$salesUser = \App\Models\User::where('reference_code',$used_reference_code)->first();

		if($salesUser){

			return $salesUser->id;
		}else{
			return "0";
		}
		
	}

	public static function userNameById($id){
		
		$user = \App\Models\User::where('id',$id)->first();
		if($user){
			return $user->name;
		}else{
			return 'N/A';
		}
		
	}
	
	public static function getParticular($id){
		
		$user = \App\Models\Particular::where('id',$id)->first();
		if($user){
			return $user->name;
		}else{
			return 'N/A';
		}
		
	}

	public static function VarentProductNameById($id){
		
		$Variantproduct = \App\Models\Variantproduct::select('variantproducts.*', 'products.name')->join('products','variantproducts.product_id','=','products.id')->where('variantproducts.id',$id)->first();
		if($Variantproduct){
			return $Variantproduct->name;
		}else{
			return 'N/A';
		}
		
	}

	public static function checkWishlistProduct($id){
		
		if(\Session::has('5ferns_result')){
			$check = \App\Models\Wishlist::where('product_id',$id)->where('user_id',\Session::get('5ferns_result')['id'])->first();
			if($check){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
		
		
	}
	
	

	


	
	

}


?>