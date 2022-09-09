<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\ProductCollection;
use Illuminate\Support\Str;

class ProductCollectionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
		
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	
	public function add(Request $request){
		
		
		if($request->ajax()){

			$rules=[
				'id'=>'numeric|required',
				'name'=>'string|required',
				'variant_product'=>'required',
				'sku_id'=>'required|unique:product_collections,sku_id,'.$request->post('id'),
				'canada_stock'=>'required',
				'usa_stock'=>'required',
				'india_stock'=>'required',
				'sale_price'=>'required',
				'package_length'=>'required',
				'package_breadth'=>'required',
				'package_height'=>'required',
				'package_weight'=>'required',
				'package_label'=>'required',
				'meta_title'=>'required',
				'meta_keywords'=>'required',
				'meta_description'=>'required',
				'b2b'=>'required|in:1,2',
			];
			
			if((int) $request->post('id')==0){
				
				$rules['uploadfile']='required';
				
			}
			
			if($request->post('b2b')==1){
				
				$rules['b2b_min_qty']='numeric|required';
				$rules['b2b_price']='required';
				
			}
			
			$validator = Validator::make($request->all(), $rules);
			
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


					if(strtolower($request->post('canada_stock')) == 'na'){
						$canada_stock = 'NA';
					}else{
						$canada_stock = intval($request->post('canada_stock'));
					}
					
					if(strtolower($request->post('usa_stock')) == 'na'){
						$usa_stock = 'NA';
					}else{
						$usa_stock = intval($request->post('usa_stock'));
					}
					
					if(strtolower($request->post('india_stock')) == 'na'){
						$india_stock = 'NA';
					}else{
						$india_stock = intval($request->post('india_stock'));
					}
					
					$image_array = array();
					$productImage="";

					if(isset($request->uploadfile)){
						foreach($request->uploadfile as $image){

							if($image != 'undefined'){
								$image_update = strtotime(date('Y-m-d H:i:s')).'_'.rand(11,99).'.'.$image->getClientOriginalExtension();
								$image_array[] = $image_update;
								$destinationPath = public_path('/uploads/products');
								$image->move($destinationPath, $image_update);
							}
						}
					}
					
					if(!empty($request->post('images'))){
						
						$image_array=array_merge($request->post('images'),$image_array);
						
					}
					
					if(!empty($image_array) && $image_array[0]!=''){
					
						$productImage = implode(",",$image_array);
					}
		
			
					if((int) $request->post('id')>0){
						
						$variProduct=ProductCollection::find($request->post('id'));
					}else{
						
						$variProduct=new ProductCollection();
					
					} 
					
					$variProduct->name=$request->post('name');
					$variProduct->variant_product_id=implode(',',$request->post('variant_product'));
					$variProduct->sku_id=$request->post('sku_id');
					$variProduct->slug=Str::slug($request->post('sku_id'));
					$variProduct->sale_price=$request->post('sale_price');  
					$variProduct->canada_stock=$canada_stock;   
					$variProduct->usa_stock=$usa_stock;   
					$variProduct->india_stock=$india_stock;   
					$variProduct->package_length=$request->post('package_length');   
					$variProduct->package_breadth=$request->post('package_breadth');   
					$variProduct->package_height=$request->post('package_height');   
					$variProduct->package_weight=$request->post('package_weight');   
					$variProduct->package_label=$request->post('package_label');   
					$variProduct->images=$productImage;
					$variProduct->meta_title=$request->post('meta_title');
					$variProduct->meta_keywords=$request->post('meta_keywords');
					$variProduct->meta_description=$request->post('meta_description');
					$variProduct->b2b=$request->post('b2b');
						
					if($request->post('b2b')==1){
						$variProduct->b2b_min_qty=$request->post('b2b_min_qty');
						$variProduct->b2b_price=$request->post('b2b_price');
					}
					$variProduct->save();
					
					
					if((int) $request->post('id')==0){
		
						return response(array('message'=>'Product collection added successfully.','reset'=>true,'script'=>true),200);
						
					}else{
						
						return response(array('message'=>'Product collection updated successfully.','reset'=>false),200);
					}
					
				}catch (\Exception $e){
						
					return response(array("message" => $e->getMessage()),403); 
				
				}
				
				
			}
			
			return response(array('message'=>'Data not found.'),403);
		}
		
		$result=[];

		$products = \App\Models\Variantproduct::select('variantproducts.*', 'products.name')->join('products','variantproducts.product_id','=','products.id')->orderBy('products.name','Asc')->get();
		return view('admin.catalog.product.collection.add',compact('result','products'));
	
		
    }
	
	public function Update(Request $request,$id){
		
		
		$result=ProductCollection::where('id',$id)->first();
		
		if($result){
		
			$products = \App\Models\Variantproduct::select('variantproducts.*', 'products.name')->join('products','variantproducts.product_id','=','products.id')->orderBy('products.name','Asc')->get();

			return view('admin.catalog.product.collection.add',compact('result','products'));
			
		}else{
			
			return redirect()->back()->with('angelaccentdminerror','Something went wrong. Please try again.');
		}
		
	}
	
	public function List(Request $request){
		

		$result=ProductCollection::where('recyclebin_status','0')->orderBy('id','DESC')->get();

		return view('admin.catalog.product.collection.list',compact('result'));
		
	}
	
	public function Delete(Request $request,$id){
		
		$result=ProductCollection::find($id);
		
		if($result){
			
			$category=ProductCollection::where('id',$id)->update(['recyclebin_status'=>'1','recyclebin_datetime'=>date('Y-m-d H:i:s')]);
			
			return redirect()->back()->with('5fernsadminsuccess','Product collection deleted successfully.');
			
		}else{
			
			return redirect()->back()->with('5fernsadminerror','Something went wrong. Please try again.');
		}
		
	}
	
	
	public function Status(Request $request){
		
		ProductCollection::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);
		
		return response(array('message'=>'Product collection status changed successfully.'),200);
	}
	

}
