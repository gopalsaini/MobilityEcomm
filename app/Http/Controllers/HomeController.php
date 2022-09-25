<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Mail;
use Validator;
use Newsletter;
use DB;
use Instagram\Api;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;




class HomeController extends Controller
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
	 
    public function index(Request $request){
        
        Session::put('country_id','1');
        Session::put('country_type','1');

		$slider=\App\Helpers\commonHelper::callAPI('GET','/slider-list');
        
		$testimonial=\App\Helpers\commonHelper::callAPI('GET','/testimonial-list');
        
		$blogs=\App\Helpers\commonHelper::callAPI('GET','/blog-list');
		
		$topCategory=\App\Helpers\commonHelper::callAPI('GET','/toprated-category');
		
		$topSelling=\App\Helpers\commonHelper::callAPI('GET','/topselling-product');
		
        $newProduct=\App\Helpers\commonHelper::callAPI('GET','/dealsoftheday-product');
        
        $wishlist=[];

        if(Session::has('wishlist_user')){

            $wishlist=Session::get('wishlist_user');
        }

        $seoResult=\App\Models\Seo::where('id','1')->first();

        return view('home',compact('slider','testimonial','topCategory','topSelling','wishlist','newProduct','seoResult','blogs'));
    }
	
	public function searchproduct(Request $request){

		$search=\App\Helpers\commonHelper::callAPI('GET','/search-product?text='.$request->get('term'));
    
		if($search->status==200){

			$searchArray=json_decode($search->content,true);
			
			foreach($searchArray['result'] as $data){
				
				$results[] = ['value' => $data['name'], 'link' => url('product-detail/'.$data['slug']),'label'=>$data['name']];
			}
			
		}else{

            $results[] = ['value' => 'no', 'label' =>'Results Not Found'];
        }
	
		return response()->json($results);  

	}

    public function register(){

        $country=\App\Models\Country::select('phonecode')->get();

        return view('register',compact('country'));
    }

    public function forgotpassword(){
        return view('forgot_password');
    }

    public function trackOrder(){ 
        return view('track_order');
    }

    public function getState(Request $request){

        $country_id=$request->get('country_id');

        $option="<option value='' selected >--Select State--</option>";

        if($country_id>0){

            $stateResult=\App\Models\State::orderBy('name','Asc')->where('country_id',$country_id)->get();

            foreach($stateResult as $state){

                $option.="<option value='".$state['id']."'>".ucfirst($state['name'])."</option>";
            }
        }

        return response(array('message'=>'state fetched successfully.','html'=>$option));
    }
    
	
    public function getCity(Request $request){

        $stateId=$request->get('state_id');

        $option="<option value='' selected >--Select City--</option>";

        if($stateId>0){

            $cityResult=\App\Models\City::orderBy('name','Asc')->where('state_id',$stateId)->get();

            foreach($cityResult as $city){
    
                $option.="<option value='".$city['id']."'>".ucfirst($city['name'])."</option>";
            }

        }

        return response(array('message'=>'City fetched successfully.','html'=>$option));
    }

    public function termsCondition(Request $request){

        $apiData=\App\Helpers\commonHelper::callAPI('GET','/get-information-pages-data/1');
        $result=json_decode($apiData->content,true);
        $result=$result['result'];

        $meta=[
            'title'=>'Terms & Conditions',
            'keywords'=>'Terms & Conditions',
            'description'=>'Terms & Conditions',
        ];
        
        return view('information',compact('result','meta'));

    }

    public function privacyPolicy(Request $request){

        $apiData=\App\Helpers\commonHelper::callAPI('GET','/get-information-pages-data/2');
        $result=json_decode($apiData->content,true);
        $result=$result['result'];

        $meta=[
            'title'=>'Privacy Policy',
            'keywords'=>'Privacy Policy',
            'description'=>'Privacy Policy',
        ];

        return view('information',compact('result','meta'));

    }

    public function aboutUs(Request $request){

        $apiData=\App\Helpers\commonHelper::callAPI('GET','/get-information-pages-data/3');
        $result=json_decode($apiData->content,true);
        $result=$result['result'];

        $meta=[
            'title'=>'About us',
            'keywords'=>'About us',
            'description'=>'About us',
        ];

        
		$testimonial=\App\Helpers\commonHelper::callAPI('GET','/testimonial-list');

        return view('about',compact('result','meta','testimonial'));

    }

    public function returnRefundPolicy(Request $request){

        $apiData=\App\Helpers\commonHelper::callAPI('GET','/get-information-pages-data/4');
        $result=json_decode($apiData->content,true);
        $result=$result['result'];

        $meta=[
            'title'=>'Return & Refund Policy',
            'keywords'=>'Return & Refund Policy',
            'description'=>'Return & Refund Policy',
        ];

        return view('information',compact('result','meta'));

    }

    public function cancellationPolicy(Request $request){

        $apiData=\App\Helpers\commonHelper::callAPI('GET','/get-information-pages-data/6');
        $result=json_decode($apiData->content,true);
        $result=$result['result'];

        $meta=[
            'title'=>'Cancellation Policy',
            'keywords'=>'Cancellation Policy',
            'description'=>'Cancellation Policy',
        ];

        return view('information',compact('result','meta'));

    }

    public function shippingPolicy(Request $request){

        $apiData=\App\Helpers\commonHelper::callAPI('GET','/get-information-pages-data/5');
        $result=json_decode($apiData->content,true);
        $result=$result['result'];

        $meta=[
            'title'=>'About us',
            'keywords'=>'About us',
            'description'=>'About us',
        ];

        return view('information',compact('result','meta'));


    }
	
	public function subscribeNewsletter(Request $request){

        $data=array(
            'email'=>$request->post('email'),
        );
        
        $apiData=\App\Helpers\commonHelper::callAPI('POST','/newsletter-subscribe',json_encode($data));
        $resultData=json_decode($apiData->content,true);
        
        return response(array('message'=>$resultData['message']),$apiData->status);

    }

    public function userTrackOrder(Request $request){
       
        $data=array(
            'order_id'=>$request->post('order_id'),
        );

        $result=\App\Helpers\commonHelper::callAPI('POST','/track-order',json_encode($data));       
        $resultData=json_decode($result->content,true);
        
        if($result->status==200){

            $order = $resultData['result'];
           
            $html=view('order_track_url',compact('order'))->render();

            return response(array('message'=>$resultData['message'],'html'=>$html),$result->status);

        }else{

            return response(array('message'=>$resultData['message']),$result->status);
        }
        
 
    }

    
	
	public function contactUs(Request $request){


        if($request->ajax()){

            $data=array(
                'name'=>$request->post('name'),
                'mobile'=>$request->post('mobile'),
                'subject'=>$request->post('subject'),
                'message'=>$request->post('message'),
            );
            
            $apiData=\App\Helpers\commonHelper::callAPI('POST','/contact-form-submit',json_encode($data));
            $resultData=json_decode($apiData->content,true);
            return response(array('message'=>$resultData['message']),$apiData->status);

        }
        
        return view('contact');

    }

    public function blogs(Request $request){

        
        $query=\App\Models\Blog::where('status','1')->orderBy('id','DESC');

        if(isset($_GET['tag']) && $_GET['tag'] != ''){

            $tag = $_GET['tag'];
            $query->where(function($query1) use ($tag){

                    $query1->orWhere('tags',$tag);
                    $query1->OrWhere('tags','LIKE','%,'.$tag);
                    $query1->OrWhere('tags','LIKE',$tag.',%');
                    $query1->OrWhere('tags','LIKE','%,'.$tag.',%'); 
                
                

            }); 

        }
        $blogs= $query->paginate(10);

        $result=[];
        foreach($blogs as $blog){
            
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

        return view('blogs',compact('result','blogs'));
		
    }

    public function getSingleBlog(Request $request,$slug){

        $value=\App\Models\Blog::where('status','1')->where('slug',$slug)->first();

        if($value){
            

            $result=[
                'id'=>$value['id'],
                'name'=>ucfirst($value['title']),
                'slug'=>$value['slug'],
                'tags'=>$value['tags'],
                'description'=>ucfirst($value['description']),
                'other_description'=>ucfirst($value['other_description']),
                'quota_title'=>ucfirst($value['quota_title']),
                'quota_description'=>ucfirst($value['quota_description']),
                'images'=>$value['images'],
                'image'=>asset('uploads/blog/'.$value['image']),
                'date'=>date('M, d, Y', strtotime($value['created_at'])),
                'meta_title'=>$value['meta_title'],
                'meta_keywords'=>$value['meta_keywords'],
                'meta_description'=>$value['meta_description'],
            ];
            
            
            $blogs=\App\Models\Blog::where('status','1')->where('id','!=',$value['id'])->where('category_id',$value['category_id'])->get();

            return view('blog',compact('result','blogs'));
            
        }else{

            $result=[];

            $blogs= [];

            return view('blog',compact('result','blogs'));
        }

    }


	
}
