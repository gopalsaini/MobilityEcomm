@extends('layouts.app')

@section('title',$result['meta_title'])
@section('meta_keywords',$result['meta_title'])
@section('meta_description',$result['meta_description'])

@push('custom_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/piczoomer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-slider.css') }}">
@endpush

@section('content')

<div class="va-page-strip-tag">
    <ul>
        <li> <a href="{{url('/')}}">Home</a> </li>
        <li>/ &nbsp; <a href="{{url('product-listing')}}">Product</a> </li>
        <li>/ &nbsp; {{ $result['name'] }} </li>
    </ul>
</div>

@php
    $imagesArray=explode(',',$result['images']);
@endphp

<div class="product-single-inner-content">
      <div class="va-product-list-inner-content-wrapper">
         <div class="va-product-slider-wrapper">
            <div class="product-slider">
                @if(!empty($imagesArray) && $imagesArray[0]!='')
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($imagesArray as $key=>$image)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="@if($key==0) active @endif" aria-current="true" aria-label="Slide {{$key}}">
                                    <img src="{{ $image }}" alt="">
                                </button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach($imagesArray as $key=>$image)
                                <div class="carousel-item @if($key==0) active @endif">
                                    <img src="{{ $image }}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
         </div>
         <div class="va-product-slider-text-wrapper">
            <div class="product-desp">
               <small>{{ $result['category'] }}</small>
               <small>
                    @php $stockCheck = \App\Helpers\commonHelper::getProductStock($result['canada_stock'],$result['usa_stock'],$result['india_stock']); @endphp
                    @if($stockCheck)
                        Out Of Stock
                    @else
                        In Stock
                    @endif
               </small>
               <h2>{{ $result['name'] }}</h2>
               <h2 class="price">
               @if(!empty($userDetail) && $userDetail['user_type'] == 'Custom Merchandise')

                    @if($result['discount_amount']>0)
                        <p><del>{{  \App\Helpers\commonHelper::getPriceByCountry( $result['b2b_price']) }}</del>{{  \App\Helpers\commonHelper::getPriceByCountry( $result['offer_price'])  }}</p>
                    @else
                        <p>{{  \App\Helpers\commonHelper::getPriceByCountry( $result['b2b_price']) }}</p>
                    @endif

                @else

                    @if($result['discount_amount']>0)
                        <p><del>{{  \App\Helpers\commonHelper::getPriceByCountry( $result['sale_price']) }}</del>{{  \App\Helpers\commonHelper::getPriceByCountry( $result['offer_price'])  }}</p>
                    @else
                        <p>{{  \App\Helpers\commonHelper::getPriceByCountry( $result['sale_price']) }}</p>
                    @endif

                @endif
               </h2><br>
               <p>{!! $result['short_description'] !!}</p>
               @if($result['variants'])

                    @php
                    $selectAttribute=explode(',',$result['variant_attributes']);
                    @endphp

                    @foreach($result['variants'] as $variant)
                        @if($variant['display_layout']==2)
                            <ul class="product-cate">
                                <li>
                                    <span class="list-width">{{ ucfirst($variant['name']) }} :</span>
                                    <div class="select-color">
                      
                                        @if(!empty($variant['attribute']))
                                        <div class="radio-box">

                                            @foreach($variant['attribute'] as $childAttribute)
                                            <div class="radio-color-parent">
                                                <input type="radio" class="geturl" value="{{ $childAttribute['id'] }}"
                                                    name="variant{{ $variant['id'] }}" id="color1-radio{{ $childAttribute['id'] }}"
                                                    @if(in_array($childAttribute['id'],$selectAttribute)) checked @endif>
                                                <label for="color1-radio{{ $childAttribute['id'] }}" class="color1"
                                                    style="background:{{ $childAttribute['color'] }}"></label>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        @else
                            <div class="row common-dropdown">

                                <div class="col-md-12 col-lg-3">
                                    <label>{{ ucfirst($variant['name']) }}</label>
                                    @if(!empty($variant['attribute']))
                                    <select class="form-field-select  geturl" aria-label="Size" name="hey[]">
                                        @foreach($variant['attribute'] as $childAttribute)
                                        <option value="{{ $childAttribute['id'] }}"
                                            @if(in_array($childAttribute['id'],$selectAttribute)) selected @endif>
                                            {{ $childAttribute['title'] }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
               <ul class="product-cate">
                  
               @if(!empty($userDetail) && $userDetail['user_type'] == 'Custom Merchandise')
                    <li>
                        <span class="list-width">Quantity :</span>
                        <div class="quantity">
                            <div class="value-button" >
                            <svg width="13" height="2" viewBox="0 0 13 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.5 0C8.10935 0 9.71871 0 11.3281 0C12.3184 0 12.9869 0.390244 12.9993 0.97561C13.0241 1.56098 12.3803 1.99364 11.39 1.99364C8.13411 2.00212 4.87827 2.00212 1.61004 1.99364C0.619672 1.99364 -0.0240695 1.56098 0.000689816 0.97561C0.0254491 0.390244 0.68157 0 1.67194 0C3.28129 0 4.89065 0 6.5 0Z" fill="#296769"/>
                            </svg>                                          
                            </div>
                            <input type="text" id="number" class="qty" value="{{$result['b2b_min_qty']}}" />
                            <div class="value-button" >
                            <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.5 6.46289C8.10935 6.46289 9.71871 6.46289 11.3281 6.46289C12.3184 6.46289 12.9869 6.85313 12.9993 7.4385C13.0241 8.02387 12.3803 8.45653 11.39 8.45653C8.13411 8.46501 4.87827 8.46501 1.61004 8.45653C0.619672 8.45653 -0.0240695 8.02387 0.000689816 7.4385C0.0254491 6.85313 0.68157 6.46289 1.67194 6.46289C3.28129 6.46289 4.89065 6.46289 6.5 6.46289Z" fill="#296769"/>
                                <path d="M5.5 7.46289C5.5 5.85354 5.5 4.24419 5.5 2.63483C5.5 1.64446 5.89024 0.975961 6.47561 0.963581C7.06097 0.938822 7.49364 1.58256 7.49364 2.57293C7.50212 5.82878 7.50212 9.08462 7.49364 12.3528C7.49364 13.3432 7.06098 13.987 6.47561 13.9622C5.89024 13.9374 5.5 13.2813 5.5 12.2909C5.5 10.6816 5.5 9.07224 5.5 7.46289Z" fill="#296769"/>
                                </svg>
                            </div>
                        </div>
                    </li>
               @else
                    <li>
                        <span class="list-width">Quantity :</span>
                        <div class="quantity">
                            <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">
                            <svg width="13" height="2" viewBox="0 0 13 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.5 0C8.10935 0 9.71871 0 11.3281 0C12.3184 0 12.9869 0.390244 12.9993 0.97561C13.0241 1.56098 12.3803 1.99364 11.39 1.99364C8.13411 2.00212 4.87827 2.00212 1.61004 1.99364C0.619672 1.99364 -0.0240695 1.56098 0.000689816 0.97561C0.0254491 0.390244 0.68157 0 1.67194 0C3.28129 0 4.89065 0 6.5 0Z" fill="#296769"/>
                            </svg>                                          
                            </div>
                            <input type="text" id="number" class="qty" value="1" />
                            <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">
                            <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.5 6.46289C8.10935 6.46289 9.71871 6.46289 11.3281 6.46289C12.3184 6.46289 12.9869 6.85313 12.9993 7.4385C13.0241 8.02387 12.3803 8.45653 11.39 8.45653C8.13411 8.46501 4.87827 8.46501 1.61004 8.45653C0.619672 8.45653 -0.0240695 8.02387 0.000689816 7.4385C0.0254491 6.85313 0.68157 6.46289 1.67194 6.46289C3.28129 6.46289 4.89065 6.46289 6.5 6.46289Z" fill="#296769"/>
                                <path d="M5.5 7.46289C5.5 5.85354 5.5 4.24419 5.5 2.63483C5.5 1.64446 5.89024 0.975961 6.47561 0.963581C7.06097 0.938822 7.49364 1.58256 7.49364 2.57293C7.50212 5.82878 7.50212 9.08462 7.49364 12.3528C7.49364 13.3432 7.06098 13.987 6.47561 13.9622C5.89024 13.9374 5.5 13.2813 5.5 12.2909C5.5 10.6816 5.5 9.07224 5.5 7.46289Z" fill="#296769"/>
                                </svg>
                            </div>
                        </div>
                    </li>
               @endif
                  
               </ul>
              
               <ul class="buttons">
                    
                    @if(!empty($userDetail) && $userDetail['user_type'] == 'Custom Merchandise')
                        
                        <li>
                            <a href="javascript:;" data-type="buynow" data-product_id="{{ $result['provariantid'] }}" class="va_btn green addtocart">Buy now without customization&nbsp;

                                <pre class="spinner-border spinner-border-sm loader"
                                                style="color:white;font-size: 100%;position:relative;margin:0;display:none"></pre>
                            </a>
                        </li>
                    @else
                        <li class="d-flex align-items-center">
                            <a href="javascript:;" class="va_btn addtocart" data-type="addtocart" data-product_id="{{ $result['provariantid'] }}">
                            <span class="me-3">
                                <svg width="27" height="22" viewBox="0 0 27 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M26.1178 5.03765C25.8568 4.70052 25.5211 4.42854 25.1372 4.24309C24.7533 4.05764 24.3316 3.96378 23.9053 3.9689H8.08027L6.71152 1.48452C6.49067 1.09614 6.16989 0.773955 5.78248 0.551402C5.39507 0.328848 4.95516 0.214041 4.5084 0.218898H1.31152C1.06288 0.218898 0.824426 0.31767 0.648611 0.493486C0.472795 0.669301 0.374023 0.907757 0.374023 1.1564C0.374023 1.40504 0.472795 1.64349 0.648611 1.81931C0.824426 1.99513 1.06288 2.0939 1.31152 2.0939H4.5084C4.61935 2.08915 4.72962 2.11347 4.82828 2.16444C4.92694 2.21542 5.01057 2.29128 5.0709 2.38452L6.61777 5.19702L7.42402 13.9345C7.53208 14.8392 7.97915 15.6692 8.67507 16.2573C9.37099 16.8454 10.264 17.1477 11.174 17.1033H20.8959C21.6998 17.1236 22.4882 16.8797 23.1402 16.4089C23.7921 15.9381 24.2717 15.2665 24.5053 14.497L26.5396 7.16577C26.6399 6.8027 26.6539 6.42123 26.5807 6.05176C26.5075 5.68229 26.3489 5.33503 26.1178 5.03765ZM24.749 6.65015L22.7146 13.9908C22.5879 14.3665 22.3413 14.6902 22.0127 14.912C21.6841 15.1339 21.2917 15.2417 20.8959 15.2189H11.1365C10.6983 15.251 10.2637 15.1191 9.91726 14.8489C9.57077 14.5786 9.33707 14.1893 9.26152 13.7564L8.5584 5.8439H23.9053C24.0423 5.84252 24.1779 5.87119 24.3026 5.92788C24.4273 5.98457 24.5381 6.06791 24.6272 6.17202C24.6831 6.23685 24.7232 6.31377 24.7444 6.39674C24.7655 6.47971 24.7671 6.56646 24.749 6.65015Z" fill="#E5B199"/>
                                <path d="M11.624 21.7812C12.6596 21.7812 13.499 20.9418 13.499 19.9062C13.499 18.8707 12.6596 18.0312 11.624 18.0312C10.5885 18.0312 9.74902 18.8707 9.74902 19.9062C9.74902 20.9418 10.5885 21.7812 11.624 21.7812Z" fill="#E5B199"/>
                                <path d="M20.999 21.7812C22.0346 21.7812 22.874 20.9418 22.874 19.9062C22.874 18.8707 22.0346 18.0312 20.999 18.0312C19.9635 18.0312 19.124 18.8707 19.124 19.9062C19.124 20.9418 19.9635 21.7812 20.999 21.7812Z" fill="#E5B199"/>
                                </svg>                                       
                            </span>
                            Add To Cart &nbsp;<pre class="spinner-border spinner-border-sm loader" style="color:white;font-size: 100%;position:relative;margin:0;display:none"></pre>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-type="buynow" data-product_id="{{ $result['provariantid'] }}" class="va_btn green addtocart">Buy Now &nbsp;

                                <pre class="spinner-border spinner-border-sm loader"
                                                style="color:white;font-size: 100%;position:relative;margin:0;display:none"></pre>
                            </a>
                        </li>
                    @endif
                </ul>
                <ul class="buttons">
                    @if(Session::has('5ferns_user'))

                        @if(!empty($userDetail) && $userDetail['user_type'] == 'Custom Merchandise')
                            
                            <li>
                                <a href="javascript:;" data-type="" data-toggle="modal" data-target="#productEnquiryModal" class="va_btn green">Product Customization &nbsp;</a>
                                <div class="modal fade" id="productEnquiryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Product Customization Detail </h5>
                                            
                                        </div>
                                        
                                        <form action="{{ route('product-customizations') }}" method="post"  id="contactUs" class="formsubmit">
                                        
                                            @csrf
                                            <div class="modal-body">
                                                
                                                <input type="hidden" name="product_id" value="{{ $result['provariantid'] }}" class="form-control" required >
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-12 col-12">
                                                        <label>Message</label>
                                                        <textarea cols="30" rows="6" name="description" class="form-control" required placeholder="Message"></textarea>
                                                    </div>
                                                </div>
                                            
                                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" id="contactusSubmit" class="btn btn-primary">Submit &nbsp;&nbsp;
                                                    <pre class="spinner-border spinner-border-sm contactUsLoader" style="display:none"></pre></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li>
                                <a href="javascript:;" data-type="" data-toggle="modal" data-target="#productEnquiryModal" class="va_btn green">I have a query &nbsp;</a>
                                <div class="modal fade" id="productEnquiryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">I have a query </h5>
                                            
                                        </div>
                                        
                                        <form action="{{ route('ondemand-enquiry') }}" method="post"  id="contactUs" class="formsubmit">
                                        
                                            @csrf
                                            <div class="modal-body">
                                                
                                                <input type="hidden" name="product_id" value="{{ $result['provariantid'] }}" class="form-control" required >
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-12 col-12">
                                                        <label>Message</label>
                                                        <textarea cols="30" rows="6" name="description" class="form-control" required placeholder="Message"></textarea>
                                                    </div>
                                                </div>
                                            
                                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" id="contactusSubmit" class="btn btn-primary">Submit &nbsp;&nbsp;
                                                    <pre class="spinner-border spinner-border-sm contactUsLoader" style="display:none"></pre></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    
                    @endif
                  <li><a href="javascript:;" data-productid="{{ $result['provariantid'] }}" class="heart-btn wishlist"><svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M5.21245 0.0263945C4.25721 0.133844 3.20247 0.546078 2.42933 1.11411C2.03976 1.40034 1.33699 2.13127 1.06235 2.53588C0.500253 3.364 0.13228 4.38899 0.0219361 5.43414C-0.02291 5.85864 0.00441513 6.86871 0.0729494 7.32126C0.417328 9.59516 1.63519 11.4707 4.67546 14.4091C5.89776 15.5904 7.47205 16.9905 10.0287 19.17L11.0024 20L11.782 19.334C13.8283 17.586 15.0686 16.5026 16.0366 15.6172C20.0663 11.9319 21.5483 9.84453 21.9267 7.32126C21.9954 6.86344 22.0229 5.85578 21.9783 5.43414C21.8675 4.38744 21.5026 3.37169 20.9371 2.53588C20.6636 2.13167 19.9619 1.40146 19.5708 1.11411C17.7864 -0.19689 15.3767 -0.364692 13.3959 0.684081C12.7376 1.03258 12.0653 1.58215 11.3768 2.33456L11.0001 2.74627L10.6126 2.32249C9.35553 0.947425 8.1529 0.259908 6.64192 0.0524757C6.31861 0.00807521 5.50676 -0.00672493 5.21245 0.0263945ZM6.82906 1.44783C8.16903 1.74759 9.12102 2.46049 10.5573 4.23964C10.7921 4.53051 10.9914 4.76853 11.0001 4.76853C11.0088 4.76853 11.208 4.53051 11.4428 4.23964C12.9012 2.43306 13.869 1.71947 15.2549 1.42869C15.6522 1.34535 16.6551 1.34469 17.0492 1.42751C18.8542 1.80679 20.225 3.20935 20.6175 5.07841C20.7005 5.47401 20.73 6.25289 20.6807 6.74833C20.438 9.18421 19.031 11.1533 14.8427 14.9183C13.5536 16.0771 11.0592 18.224 11.002 18.224C10.9427 18.224 8.40677 16.0425 7.13618 14.8985C3.87778 11.9646 2.36083 10.1584 1.70234 8.42858C1.22854 7.18392 1.15941 5.65881 1.52558 4.52893C1.86509 3.48141 2.60581 2.54186 3.53904 1.97508C3.98819 1.70227 4.555 1.49454 5.10296 1.40192C5.51204 1.33279 6.42317 1.35703 6.82906 1.44783Z" fill="#296769"/>
                     </svg>
                     </a></li>
               </ul>
               <div class="media">
                  <p>Share:</p>
                  @php $url = url('product-detail/'.$result['slug']); @endphp
                  <div class="social-icons">
                     <a href="javascript:;" onclick="sharePost('facebook','{{$url}}')"> <span><svg width="18" height="18" viewBox="0 0 266 513" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M172.7 512.1C141.5 512.1 110.3 512.1 79.0002 512.1C78.9002 510 78.6002 507.8 78.6002 505.7C78.6002 432.5 78.6002 359.3 78.6002 286.1C78.6002 284 78.6002 281.8 78.6002 279.1C52.2002 279.1 26.4002 279.1 0.700195 279.1C0.700195 248.4 0.700195 218.4 0.700195 187.9C26.7002 187.9 52.4002 187.9 78.6002 187.9C78.6002 185.5 78.6002 183.5 78.6002 181.6C78.6002 162.8 78.2003 144 78.8003 125.2C79.2003 112.5 79.8003 99.4998 82.4003 87.0998C91.8003 43.1998 118.4 15.2997 162.3 4.69974C182.7 -0.300258 203.5 0.799767 224.2 1.59977C237.9 2.09977 251.7 3.19979 265.4 3.99979C265.4 31.2998 265.4 58.5998 265.4 85.8998C245.7 86.1998 225.9 86.1998 206.2 86.8998C189.4 87.3998 178.2 96.4998 174.3 112.4C173.3 116.5 172.8 120.9 172.7 125.2C172.5 144.7 172.6 164.1 172.6 183.6C172.6 185 172.8 186.4 172.9 188.3C202.8 188.3 232.3 188.3 262.2 188.3C258.3 218.9 254.4 248.9 250.4 279.5C224.3 279.5 198.6 279.5 172.5 279.5C172.5 282 172.5 283.9 172.5 285.9C172.5 351.4 172.5 416.9 172.5 482.4C172.6 492.2 172.7 502.2 172.7 512.1Z" fill=""></path>
                        </svg></span> </a>
                     <a href="javascript:;" onclick="sharePost('instagram','{{$url}}')"> <span><svg width="18" height="18" viewBox="0 0 513 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M512.9 129.5C512.9 214 512.9 298.5 512.9 383C512 388 511.4 393.1 510.2 398.1C496.8 455.1 461.9 491.7 405.4 507.6C398.4 509.6 391.1 510.4 383.9 511.8C299.2 511.8 214.6 511.8 129.9 511.8C124.8 510.9 119.7 510.3 114.7 509.1C57.5999 495.7 20.8999 460.9 5.09991 404.4C3.09991 397.4 2.2999 390.2 0.899902 383C0.899902 298.5 0.899902 214 0.899902 129.5C1.7999 124.5 2.59991 119.4 3.59991 114.4C17.2999 47.8999 74.4999 0.899943 142.5 0.799943C218.8 0.599943 295.1 0.699919 371.4 0.899919C380.7 0.899919 390.2 1.49987 399.1 3.59987C456.2 16.7999 492.9 51.6999 508.7 108.1C510.6 115.1 511.5 122.3 512.9 129.5ZM46.6999 255.7C46.5999 255.7 46.4999 255.7 46.4999 255.7C46.4999 293 46.4999 330.2 46.4999 367.5C46.4999 378.9 47.6999 390 51.2999 400.9C63.5999 437.9 99.3999 466.7 144.8 466.4C219.5 465.9 294.1 466.3 368.8 466.3C380 466.3 391 465 401.7 461.5C438.9 449.2 467.6 413.5 467.3 368.1C466.8 293.6 467.2 219.1 467.2 144.5C467.2 133.3 465.9 122.3 462.4 111.6C450 74.3999 414.2 45.7999 368.9 46.0999C294.2 46.5999 219.6 46.2998 144.9 46.1998C132.1 46.1998 119.8 48.0999 107.7 52.4999C73.0999 65.2999 47.3999 100.1 46.8999 136.9C46.2999 176.5 46.6999 216.1 46.6999 255.7Z" fill=""></path>
                        <path d="M388.8 256.3C388.8 328.8 329.5 387.9 256.9 388C184.1 388 124.7 328.6 124.9 256C125.1 183.5 184.5 124.5 257 124.6C329.6 124.6 388.8 183.8 388.8 256.3ZM343.1 256.4C343.3 208.7 304.8 170.2 256.9 170.1C209.3 170 171 208 170.6 255.7C170.2 303.3 208.6 342 256.5 342.2C304.2 342.6 342.9 304.2 343.1 256.4Z" fill=""></path>
                        <path d="M394.2 152.5C375.8 152.4 360.8 137.3 360.9 119.1C361.1 101.1 376.1 86.1996 394.2 86.0996C412.3 85.8996 427.7 101.2 427.7 119.4C427.8 137.6 412.6 152.6 394.2 152.5Z" fill=""></path>
                        </svg></span> </a>
                     <a href="javascript:;" onclick="sharePost('twitter','{{$url}}')"> <span><svg width="18" height="18" viewBox="0 0 395 326" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M113.7 255.5C107.8 254.2 101.8 253.1 95.9002 251.4C76.2002 245.6 61.4002 233.4 50.5002 216.3C47.8002 212.1 45.7002 207.6 43.8002 203C42.0002 198.5 43.0002 197.6 47.9002 197.7C54.7002 197.8 61.5002 197.7 68.3002 197.5C69.8002 197.5 71.3002 197 74.2002 196.5C67.5002 193.5 62.1002 191.6 57.1002 188.9C35.9002 177.4 21.9002 160 15.9002 136.5C14.7002 131.7 13.9002 126.8 13.3002 121.8C12.6002 116.2 14.8002 114.7 19.9002 117.4C27.1002 121.2 34.8002 122.9 42.7002 123.8C43.4002 123.9 44.2002 123.6 46.1002 123.4C44.3002 121.4 43.2002 119.9 41.8002 118.6C27.2002 105.5 18.4002 89.5 15.2002 70C12.3002 52.5 15.8002 36.5 22.7002 20.7C24.3002 17 26.7002 16.6 29.4002 19.9C42.6002 35.8999 58.1002 49.3999 75.2002 61.0999C92.4002 72.8999 110.8 82 130.6 88.8C148.6 95 167.1 98.7 186 100.5C193.5 101.2 193.8 100.8 192.7 93.4C187.5 59.4 206.8 25.2999 236.5 9.89995C253.3 1.19995 270.8 -1.10005 288.8 1.39995C297.5 2.59995 305.8 7.49995 313.8 11.7C319.6 14.7 324.8 19.0999 329.8 23.2999C332.7 25.7999 335.5 26.2 338.9 25.2C352.6 21.3 366.2 17 378.7 9.99995C380.1 9.19995 382 9.09995 383.6 8.69995C383.4 10.6 383.7 12.6 383 14.2C377.1 27.9 368.4 39.3999 356.1 48C355.7 48.2999 355.5 48.7999 354.5 50.2C368.7 49.5 380.7 44 393.2 40.5C393.5 40.9 393.8 41.2999 394.1 41.7C393.4 43.1 392.8 44.7 391.9 46C382.8 58.3999 372 69.2 360 78.7C357.1 81 356.1 83.7 356.2 87.3C357 118.3 351.4 148.2 340.1 176.9C323.9 218.4 298.5 253.5 262.7 280.5C246.1 293 228.1 303.1 208.4 310.4C192.3 316.4 175.6 319.6 158.9 323.2C138.5 327.6 118.3 324.9 98.1002 325.3C92.8002 325.4 87.4002 323.1 82.1002 322.1C62.1002 318.3 42.9002 312.3 24.4002 303.8C17.8002 300.8 11.5002 297 5.10019 293.5C3.50019 292.6 2.1002 291.1 0.700195 289C42.5002 291.1 80.6002 281.8 114.1 256.8C114.1 256.5 113.9 256 113.7 255.5Z" fill=""></path>
                        </svg></span> </a>
                  </div>
               </div>
         </div>
         </div>
      </div>
      <div class="va-custom-tabs-wrapper">
         <ul class="nav nav-tabs">
            <li class="nav-item">
               <a class="nav-link active " data-bs-toggle="tab" data-bs-target="#information" aria-selected="true">Description</a>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link" data-bs-toggle="tab" data-bs-target="#stories" aria-selected="false">Additional information</a>
            </li> -->
            <!-- <li class="nav-item">
               <a class="nav-link" data-bs-toggle="tab" data-bs-target="#consult" aria-selected="false">Education</a>
            </li> -->
        </ul>
        <div class="tab-content">
         <div class="tab-pane active p-0 sec-gap" id="information">
            <div class="content-tabs-wrapper">
                @php echo $result['description']; @endphp 
            </div>
         </div>
         <div class="tab-pane  fade p-0" id="stories"> 
            <div class="content-tabs-wrapper">
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
               </p>
               <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                </p>
               <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
            </div>
         </div>
        
        
        </div>
      </div>
        @if($artisan->status==200)
            @php
                $artisan=(json_decode(($artisan->content),true));
                
            @endphp
     
            <div class="va-client-comment-wrapper">
                <div class="client-img">
                    <img src="{{$artisan['result']['image']}}" alt="img">
                </div>
                <div class="client-text">
                    <h3>Meet the Artisians</h3>
                    <h2>{{$artisan['result']['name']}}</h2>
                    <p>{{$artisan['result']['description']}}</p>
                </div>
            </div>
        @endif
   </div>

    <div class="va-product-main-box">
        @if($relatedProducts->status==200)
            @php
                $relatedProducts=(json_decode(($relatedProducts->content),true));
            @endphp
            <div class="va-product-main-wrapper">
                <h3>New Products</h3>
                <span>Quality that can be felt</span>
                <a class="line-btn" href="{{url('product-listing?collection=4')}}">
                    See Whole Collection 
                    <span>
                        <svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""/>
                        </svg>
                    </span>
                </a>
                <div class="va-product-main-box">
                    
                    <input type="hidden" id="number" class="qty" value="1" />
                    @foreach($relatedProducts['result'] as $topselling)
                        <div class="product-box">
                        
                            <div class="product-img">
                                <img src="{{ $topselling['first_image'] }}" alt="img">
                                <div class="social-icon">
                                    <a href="javascript:void();" class="getProductDetail" data-slug="{{ $topselling['slug']}}">
                                        <span class="IconCart">
                                            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.9036 21.0002C13.9745 20.9997 15.9856 20.3065 17.6168 19.0308L22.7455 24.1595L24.3951 22.5098L19.2665 17.3812C20.5428 15.7498 21.2365 13.7382 21.237 11.6668C21.237 6.52066 17.0498 2.3335 11.9036 2.3335C6.75748 2.3335 2.57031 6.52066 2.57031 11.6668C2.57031 16.813 6.75748 21.0002 11.9036 21.0002ZM11.9036 4.66683C15.7641 4.66683 18.9036 7.80633 18.9036 11.6668C18.9036 15.5273 15.7641 18.6668 11.9036 18.6668C8.04315 18.6668 4.90365 15.5273 4.90365 11.6668C4.90365 7.80633 8.04315 4.66683 11.9036 4.66683Z" fill="#A56852"/>
                                            <path d="M13.5498 10.0171C13.992 10.4604 14.2358 11.0461 14.2358 11.6668H16.5691C16.5702 11.0536 16.4497 10.4463 16.2146 9.88C15.9795 9.31369 15.6345 8.7996 15.1995 8.36743C13.4331 6.60343 10.3706 6.60343 8.60547 8.36743L10.2528 10.0194C11.1395 9.1351 12.6678 9.13743 13.5498 10.0171Z" fill="#A56852"/>
                                            </svg>
                                        </span>&nbsp;<pre class="spinner-border spinner-border-sm loaderView" style="color:#a56852;font-size: 100%;position:relative;margin:0;display:none"></pre>
                                    </a>
                                    <a href="javascript:;" class="addtocart" data-type="addtocart" data-product_id="{{ $topselling['variant_productid'] }}">
                                        <span class="IconCart">
                                            <svg width="27" height="22" viewBox="0 0 27 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M25.8531 5.03765C25.5921 4.70052 25.2565 4.42854 24.8726 4.24309C24.4886 4.05764 24.0669 3.96378 23.6406 3.9689H7.81563L6.44688 1.48452C6.22602 1.09614 5.90524 0.773955 5.51783 0.551402C5.13042 0.328848 4.69051 0.214041 4.24375 0.218898H1.04688C0.798235 0.218898 0.559778 0.31767 0.383962 0.493486C0.208147 0.669301 0.109375 0.907757 0.109375 1.1564C0.109375 1.40504 0.208147 1.64349 0.383962 1.81931C0.559778 1.99513 0.798235 2.0939 1.04688 2.0939H4.24375C4.3547 2.08915 4.46497 2.11347 4.56363 2.16444C4.66229 2.21542 4.74593 2.29128 4.80625 2.38452L6.35313 5.19702L7.15938 13.9345C7.26744 14.8392 7.7145 15.6692 8.41042 16.2573C9.10634 16.8454 9.99935 17.1477 10.9094 17.1033H20.6313C21.4352 17.1236 22.2235 16.8797 22.8755 16.4089C23.5275 15.9381 24.007 15.2665 24.2406 14.497L26.275 7.16577C26.3752 6.8027 26.3893 6.42123 26.3161 6.05176C26.2428 5.68229 26.0843 5.33503 25.8531 5.03765ZM24.4844 6.65015L22.45 13.9908C22.3233 14.3665 22.0767 14.6902 21.7481 14.912C21.4195 15.1339 21.0271 15.2417 20.6313 15.2189H10.8719C10.4336 15.251 9.99909 15.1191 9.65261 14.8489C9.30612 14.5786 9.07242 14.1893 8.99687 13.7564L8.29375 5.8439H23.6406C23.7776 5.84252 23.9132 5.87119 24.038 5.92788C24.1627 5.98457 24.2735 6.06791 24.3625 6.17202C24.4184 6.23685 24.4586 6.31377 24.4797 6.39674C24.5009 6.47971 24.5025 6.56646 24.4844 6.65015Z" fill="#A56852"/>
                                            <path d="M11.3594 21.7814C12.3949 21.7814 13.2344 20.9419 13.2344 19.9064C13.2344 18.8709 12.3949 18.0314 11.3594 18.0314C10.3238 18.0314 9.48438 18.8709 9.48438 19.9064C9.48438 20.9419 10.3238 21.7814 11.3594 21.7814Z" fill="#A56852"/>
                                            <path d="M20.7344 21.7814C21.7699 21.7814 22.6094 20.9419 22.6094 19.9064C22.6094 18.8709 21.7699 18.0314 20.7344 18.0314C19.6988 18.0314 18.8594 18.8709 18.8594 19.9064C18.8594 20.9419 19.6988 21.7814 20.7344 21.7814Z" fill="#A56852"/>
                                            </svg>
                                        </span> &nbsp;
                                        <pre class="spinner-border spinner-border-sm loader" style="color:#a56852;font-size: 100%;position:relative;margin:0;display:none"></pre>
                                    </a>
                                    <a href="{{ url('product-detail/'.$topselling['slug'] )}}">
                                        <span>
                                            <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23.2646 11.8755C23.7781 12.5472 23.7781 13.4539 23.2646 14.1245C21.6471 16.2359 17.7666 20.5833 13.2361 20.5833C8.70564 20.5833 4.82514 16.2359 3.20772 14.1245C2.95789 13.8029 2.82227 13.4072 2.82227 13C2.82227 12.5927 2.95789 12.1971 3.20772 11.8755C4.82514 9.76407 8.70564 5.41666 13.2361 5.41666C17.7666 5.41666 21.6471 9.76407 23.2646 11.8755V11.8755Z" stroke="#A56852" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.2363 16.25C15.0313 16.25 16.4863 14.7949 16.4863 13C16.4863 11.2051 15.0313 9.75 13.2363 9.75C11.4414 9.75 9.98633 11.2051 9.98633 13C9.98633 14.7949 11.4414 16.25 13.2363 16.25Z" stroke="#A56852" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-text">
                                <span>{{ $topselling['category'] }}</span>
                                <a href="{{ url('product-detail/'.$topselling['slug'] )}}">{{ $topselling['name'] }}</a>
                                <h5> <small>
                                    @if($topselling['discount_amount']>0)
                                        <del>{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}</del>{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['offer_price']) }}
                                    @else
                                        {{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}
                                    @endif
                                </small> </h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif 
    </div>   
@endsection

@push('custom_js')

<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.picZoomer.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('.picZoomer').picZoomer();
        $('.piclist li').on('click', function (event) {
            var $pic = $(this).find('img');
            $('.picZoomer-pic').attr('src', $pic.attr('src'));
        });
    });
</script>

<script>
    $('.geturl').change(function () {

        var value = $('.geturl:checked,.geturl :selected').map(function () {
            return this.value;
        }).get().join(',');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('get-product-detail-variant-slug') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'value': value,
                'product_id': "{{  $result['product_id'] }}"
            },
            error: function (xhr, textStatus) {

                showMsg('error', xhr.responseJSON.message);
            },
            success: function (data) {

                location.href = data.url;

            }
        });
    });

    $("form#checkpincode").submit(function (e) {

        e.preventDefault();

        var formId = $(this).attr('id');
        var formAction = $(this).attr('action');

        $.ajax({
            url: formAction,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: new FormData(this),
            dataType: 'json',
            type: 'post',
            beforeSend: function () {

                $('.pincodeloader').css('display', 'block');
            },
            error: function (xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {

                    showMsg('error', xhr.responseJSON.message);

                } else {

                    showMsg('error', xhr.statusText);

                }

                $('.pincodeloader').css('display', 'none');
            },
            success: function (data) {

                showMsg('success', data.message);

                $('.pincodeloader').css('display', 'none');

            },
            cache: false,
            contentType: false,
            processData: false,
            timeout: 5000
        });

    });

    $(document).ready(function () {

        $('.changeMobileImage').click(function () {

            $('.mobilezoomer').attr('src', $(this).data('src'));
            $('.mobilezoomer').attr('href', $(this).data('src'));

        });

    });
</script>
<script>
    $("form#ondemand").submit(function(e) {
        
        e.preventDefault();
        var formId = $(this).attr('id');
        var formAction = $(this).attr('action');

        var form_data = new FormData(this);

        $.ajax({
            url: formAction,
            data: new FormData(this),
            async: false,
            dataType: 'json',
            type: 'post',
            beforeSend: function() {
                $('#' + formId + 'Loader').css('display', 'inline-block');
                $('#' + formId + 'Submit').prop('disabled', true);
            },
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                }

                $('#' + formId + 'Loader').css('display', 'none');
                $('#' + formId + 'Submit').prop('disabled', false);
                
            },
            success: function(data) {
                showMsg('success', data.message);
                $('#enquiry').modal('hide')
                $('#' + formId + 'Loader').css('display', 'none');
                $('#' + formId + 'Submit').prop('disabled', false);
            },
            cache: false,
            contentType: false,
            processData: false,
            timeout: 5000
        });
    });

</script>
<script src="{{ asset('js/slick-slider.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@endpush