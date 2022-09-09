<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function add(Request $request){
			
		if($request->isMethod('post')){
			
			$rules=[
				'id'=>'numeric|required',
				'tags'=>'required',
				'title'=>'required|unique:blogs,title,'.$request->post('id'),
				'short_desc'=>'required',
				'description'=>'required',
				'other_description'=>'required',
				'quota_title'=>'required',
				'quota_description'=>'required',
				'meta_title'=>'required',
				'meta_keywords'=>'required',
				'meta_description'=>'required',
			];
			
			if((int) $request->post('id')==0){
						
				$rules['image']='required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
			}
			
			
			$validator = \Validator::make($request->all(), $rules);
			
			if ($validator->fails()){
				$message = "";
				$messages_l = json_decode(json_encode($validator->messages()), true);
				foreach ($messages_l as $msg) {
					$message= $msg[0];
					break;
				}
				
				return response(array('message'=>$message),403);
				
			}else{
            
                if((int) $request->post('id')>0){

                    $Blog=\App\Models\Blog::find($request->post('id'));

                }else{
                    
                    $Blog=new \App\Models\Blog();
                
                }

                if($request->hasFile('image')){
                    $imageData = $request->file('image');
                    $image = strtotime(date('Y-m-d H:i:s')).'.'.$imageData->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/blog');
					$imageData->move($destinationPath, $image);

                    $Blog->image=$image;
                } 

				$image_array = array();
				$image_arrayCheck = array();
				$blogImage="";

				if(isset($request->images)){
					
					
					if(!empty($request->post('uploadfile'))){
						
						$image_arrayCheck=array_merge($request->post('uploadfile'),$request->images);
						
					}else{
						$image_arrayCheck=$request->images;
					}
					if(count($image_arrayCheck) != 5){

						return response(array('message'=>'Five image required.','reset'=>false),403);

					}
					foreach($request->images as $image){

						if($image != 'undefined'){
							
							$image_update = strtotime(date('Y-m-d H:i:s')).'_'.rand(11,99).'.'.$image->getClientOriginalExtension();
							$image_array[] = $image_update;
							$destinationPath = public_path('/uploads/blog');
							$image->move($destinationPath, $image_update);
						}
					}
				}
				
				if(!empty($request->post('uploadfile'))){
					
					$image_array=array_merge($request->post('uploadfile'),$image_array);
					
				}
				
				if(!empty($image_array) && $image_array[0]!=''){
				
					$blogImage = implode(",",$image_array);
				}
				
                $Blog->tags=$request->tags;
                $Blog->title=$request->title;
                $Blog->short_desc=$request->short_desc;
                $Blog->description=$request->description;
                $Blog->other_description=$request->other_description;
                $Blog->quota_title=$request->quota_title;
                $Blog->quota_description=$request->quota_description;
                $Blog->meta_title=$request->meta_title;
                $Blog->meta_keywords=$request->meta_keywords;
                $Blog->meta_description=$request->meta_description;
                $Blog->images=$blogImage;
                $Blog->slug=\Str::slug($request->title);
                $Blog->save();
                
                if((int) $request->post('id')==0){
                    
                    return response(array('message'=>'Blog added successfully.','reset'=>true),200);
                }else{
                    
                    return response(array('message'=>'Blog updated successfully.','reset'=>false),200);
                
                }

			}
			return response(array('message'=>'Data not found.'),403);
		}

		$result=[];
        return view('admin.blog.add',compact('result'));
    }



    public function blogList(Request $request){
		
		$result=\App\Models\Blog::orderBy('id','Desc')->get();

        return view('admin.blog.list',compact('result'));
	}

    public function blogStatus(Request $request){
		
		\App\Models\Blog::where('id',$request->post('id'))->update(['status'=>$request->post('status')]);
		
		return response(array('message'=>'Blog status changed successfully.'),200);
	}

    
    public function blogDelete(Request $request, $id)
    {
		$checkResult=\App\Models\Blog::find($id);
		
		if($checkResult){

			\App\Models\Blog::where('id', $id)->delete();
			$request->session()->flash('success','Blog deleted successfully.');
		}else{
			$request->session()->flash('error','Something went wrong. Please try again.');
		}
		
		return redirect()->route('admin.blog.list');

    }

    public function blogUpdate($id){
		
		$result=\App\Models\Blog::find($id);

		if(!$result){

			$request->session()->flash('error','Something went wrong.please try again.');
			return redirect()->back();
		}

		return view('admin.blog.add')->with(compact('result'));
	}
	
	
}
