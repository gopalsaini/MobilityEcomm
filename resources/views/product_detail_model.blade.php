    <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.5662 20.5004L30.7773 11.2893C30.9593 11.0768 31.0545 10.8033 31.0437 10.5237C31.0329 10.2441 30.9169 9.97879 30.7191 9.78091C30.5212 9.58303 30.2559 9.4671 29.9763 9.4563C29.6966 9.4455 29.4232 9.54062 29.2106 9.72265L19.9995 18.9338L10.7884 9.71153C10.5792 9.50231 10.2954 9.38477 9.99954 9.38477C9.70365 9.38477 9.41987 9.50231 9.21065 9.71153C9.00142 9.92076 8.88388 10.2045 8.88388 10.5004C8.88388 10.7963 9.00142 11.0801 9.21065 11.2893L18.4329 20.5004L9.21065 29.7115C9.09433 29.8111 8.99987 29.9337 8.93317 30.0716C8.86648 30.2094 8.829 30.3596 8.82309 30.5126C8.81718 30.6656 8.84297 30.8182 8.89883 30.9608C8.95469 31.1034 9.03942 31.2329 9.1477 31.3411C9.25599 31.4494 9.38548 31.5342 9.52807 31.59C9.67065 31.6459 9.82324 31.6717 9.97626 31.6658C10.1293 31.6598 10.2794 31.6224 10.4173 31.5557C10.5551 31.489 10.6777 31.3945 10.7773 31.2782L19.9995 22.0671L29.2106 31.2782C29.4232 31.4602 29.6966 31.5553 29.9763 31.5445C30.2559 31.5337 30.5212 31.4178 30.7191 31.2199C30.9169 31.0221 31.0329 30.7568 31.0437 30.4771C31.0545 30.1975 30.9593 29.9241 30.7773 29.7115L21.5662 20.5004Z" fill="#A56852"/>
                </svg>
        </button>
    </div>
    @php
        $imagesArray=explode(',',$result['images']);
    @endphp

    <div class="modal-body">
        <div class="popup-main-wrap">
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
                            @if($result['discount_amount']>0)
                                <p><del>{{  \App\Helpers\commonHelper::getPriceByCountry( $result['sale_price']) }}</del>{{  \App\Helpers\commonHelper::getPriceByCountry( $result['offer_price'])  }}</p>
                            @else
                                <p>{{  \App\Helpers\commonHelper::getPriceByCountry( $result['sale_price']) }}</p>
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
                    </ul>
                    
                    <ul class="buttons">
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
                            </a></li>
                        <li>
                                <a href="javascript:;" data-type="buynow" data-product_id="{{ $result['provariantid'] }}" class="va_btn green addtocart">Buy Now &nbsp;

                                    <pre class="spinner-border spinner-border-sm loader"
                                                    style="color:white;font-size: 100%;position:relative;margin:0;display:none"></pre>
                                </a>
                        </li>
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
    </div>

    <script>
        
        addToCart();
        productWishlist();
        getTotalCartProduct();
        
    </script>

<script>
        function increaseValue() {
            
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            $('.qty').val(value);
            }

            function decreaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            $('.qty').val(value);
            }
   </script>
