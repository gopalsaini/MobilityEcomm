@extends('layouts.app')

@if(!empty($getCategoryId))
    @section('title',$getCategoryId->meta_title)
    @section('meta_description',$getCategoryId->meta_description)
    @section('meta_keywords',$getCategoryId->meta_keywords)
@endif
@push('custom_css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toggle.css')}}" /> 
<style>
    .va-product-list-inner-content-wrapper .product-sidebar-wrapper .sidebar_widget .va-select-box .form-group input {
        padding: 0;
        height: 20px;
        width: 20px;
        margin-right: 10px !important;
        cursor: pointer;
    }
    .va-product-list-inner-content-wrapper .product-sidebar-wrapper .sidebar_widget .va-select-box .form-group label:before {
    
        margin-right: -3px !important;
        padding: -4px!important;
    }
    @media  screen and (min-device-width: 768px) and (max-device-width: 3300px) { 
        .notfoundImage {
            width: 700px !important;
        }
    }
</style>
@endpush

@section('content')

    <div class="va-page-strip-tag">
        <ul>
            <li> <a href="{{url('/')}}">Home</a> </li>
            <li>/ &nbsp; Shop </li>
            @if(!empty($slugCategoryResult))
                @foreach($slugCategoryResult as $key=>$slug)
                    @if(count($slugCategoryResult)!=($key+1))
                        <li>/ &nbsp; <a href="{{ url('product-listing/'.$slug['slug'] )}}">{{ $slug['name'] }}</a></li>
                    @else
                        <li>/ &nbsp; <span>{{ $slug['name'] }}</span></li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>

    <div class="va-product-list-inner-content-wrapper">
        <div class="product-sidebar-wrapper">
            @if(!empty($categoryResult))
                <div class="sidebar_widget">
                    <h4 class="sidebar-title">
                        Categories
                    </h4>
                    
                    <div class="product-panel-wrapper">
                        <div class="accordions-wrapper">
                                @foreach($categoryResult['result'] as $cat)
                                <div class="accordion">
                                    <div class="accordion-header">
                                        <h4>{{ ucfirst($cat['name']) }} <span>{{\App\Helpers\commonHelper::getTotalProductByCategory($cat['id'])}}</span> </h4>
                                        <i class="fas fa-chevron-up accordion-icon"></i>
                                    </div>
                                    <div class="accordion-body">
                                        <ul>
                                            @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                                @foreach($cat['child'] as $fchild)
                                                    <li><a href="{{ url('product-listing/'.$fchild['slug']) }}">{{ ucfirst($fchild['name'] )}}</a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
          
            @endif
           
            <div class="sidebar_widget">
                <h4 class="sidebar-title">Price Range</h4>
                <div class="price-range-slider">
                        <div id="slider-range" class="range-bar"></div>
                        <p class="range-value">
                            Range:
                            <input type="text" id="amount" readonly>
                        </p>
                </div>
            </div>

            @if($variant->status==200)

                @php $variantData=json_decode($variant->content,true); @endphp

                @foreach($variantData['result'] as $raw)

                @if(!empty($raw['attributes']) && $raw['attributes'][0]!='')
                        <div class="sidebar_widget">
                            <h4 class="sidebar-title">{{ $raw['name'] }}</h4>
                            <div class="va-select-box scroll-box">
                    
                                @foreach($raw['attributes'] as $rawattribute)
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" style="" value="{{ $rawattribute['id'] }}" onchange="setSortOrder()"
                                                class="attribute_id">{{ $rawattribute['title'] }} &nbsp;&nbsp;
                                            <div class="checkbox-indicator"></div>
                                        </label>
                                    </div>
                                @endforeach
                            
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
                  

        <div class="product-blog-wrapper">
            <div class="product-filter-wrapper">
                <div class="filter-text">
                    <p>Showing all <span id="totalProduct">0</span> results</p>
                </div>
                <div class="filter-select">
                    <div class="select-box">
                        <select class="form-field-select  sort_by" title="Sort By" name="sort_by"
                                onchange="setSortOrder()">
                            <option value="1" selected>Price: Low to High</option>
                            <option value="2">Price: High to Low</option>
                            <option value="3">Order: ASC</option>
                            <option value="4">Order: DESC</option>
                        </select> 
                    </div>
                </div>
            </div>
            <input type="hidden" id="number" class="qty" value="1" />
            <input type="hidden" id="min_price" value="0" />
            <input type="hidden" id="max_price" value="5000" />
            
            <div class="va-product-main-box product-box listing-page" id="productScroll">
               
            </div> 
        </div> 

    </div>

@endsection

@push('custom_js')
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/scroller.js') }}"></script>
    <script>

    $(function() {
		$( "#slider-range" ).slider({
			range:true,
			min: 0,
			max: 1000,
			values: [ 0,10000 ],
			slide: function( event, ui ) {
				$('#min_price').val(ui.values[ 0 ]);
				$('#max_price').val(ui.values[ 1 ]);
				$( "#amount" ).val( "₹ " + ui.values[ 0 ] + " - ₹" + ui.values[ 1 ] );
			},
			change: function( event, ui ) {
				$('#min_price').val(ui.values[ 0 ]);
				$('#max_price').val(ui.values[ 1 ]);
				
				setSortOrder();
			},
			
		});
		$( "#amount" ).val( "₹ " + $( "#slider-range" ).slider( "values", 0 ) +
		   " - ₹ " + $( "#slider-range" ).slider( "values", 1 ) );
	});
        // $(function() {
        //     $( "#slider-range" ).slider({
        //         range: true,
        //         min: 130,
        //         max: 500,
        //         values: [ 130, 250 ],
        //         slide: function( event, ui ) {
        //             $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        //         }
        //     });
        //     $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        //     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
        // });
   </script>
<script>
    var notscrolly = true;
    var notEmptyPost = true;
    var newData = true;
    var offset = 0;


    function setSortOrder() {
        offset = 0;
        notEmptyPost = true;
        newData = true;
        $('#productScroll').html(loading_set);
        getProductData();
    }

    getProductData();


    $(document).ready(function () {

        $(window).scroll(function () {
            var divheight = $('#productScroll').outerHeight();

            if (notscrolly == true && notEmptyPost == true && $(window).scrollTop() + $(window)
            .height() / 2 >= divheight) {
                getProductData();
            }

        });
    });

    function getProductData() {

        var orderBy = $('select[name=sort_by]').val();
        var minPrice = $('#min_price').val();
        var maxPrice = $('#max_price').val();
        var collection = "{{$_GET['collection'] ?? 0}}";
        var country_id = "{{Session::get('country_id')}}";
        var attributeId = $('.attribute_id:checked').map(function () {
            return this.value;
        }).get().join(',');


        $.ajax({
            url: "{{ route('product-listing',$categoryslug) }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            type: 'post',
            data: {
                "offset": offset,
                "limit": "12",
                "sort_order": orderBy,
                "minPrice": minPrice,
                "maxPrice": maxPrice,
                "attributeId": attributeId,
                "country_id":country_id,
                "collection":collection,
                "categoryslug":"{{$categoryslug}}",
                "ondemandproduct":"{{$ondemandCategory}}"
            },
            beforeSend: function () {
                notscrolly = false;

                if(offset==0){

                    $('#productScroll').html(loading_set); 
                }
            },
            error: function (xhr) {
                alert("Error: " + xhr.status + ": " + xhr.statusText);
            },
            success: function (response) {

                if (response.total != '12') {
                    notEmptyPost = false;
                } else {
                    offset += 12;
                }

                if (newData) {
                    $('#productScroll').html(response.html);
                    newData = false;
                } else {
                    $('#productScroll').append(response.html);
                }
                $('#totalProduct').html(response.total);
                
                productWishlist();

                productNotify();
                
                notscrolly = true;

                $(document).ready(addToCart);
            }
        });
    }
</script>
<script>
    // document.querySelector('.filter-mob').addEventListener('click', function () {
	// 	document.querySelector('.filter-sideBar').classList.toggle('left-move');
	// });
    
</script>
<script>
                // side bar accordian js

    const accordionHeaders = document.querySelectorAll(".accordion-header");

    ActivatingFirstAccordion();

    function ActivatingFirstAccordion() {
    accordionHeaders[0].parentElement.classList.add("active");
    accordionHeaders[0].nextElementSibling.style.maxHeight =
    accordionHeaders[0].nextElementSibling.scrollHeight + "px";
    }

    function toggleActiveAccordion(e, header) {
    const activeAccordion = document.querySelector(".accordion.active");
    const clickedAccordion = header.parentElement;
    const accordionBody = header.nextElementSibling;

    if (activeAccordion && activeAccordion != clickedAccordion) {
    activeAccordion.querySelector(".accordion-body").style.maxHeight = 0;
    activeAccordion.classList.remove("active");
    }

    clickedAccordion.classList.toggle("active");

    if (clickedAccordion.classList.contains("active")) {
    accordionBody.style.maxHeight = accordionBody.scrollHeight + "px";
    } else {
    accordionBody.style.maxHeight = 0;
    }
    }

    accordionHeaders.forEach(function (header) {
    header.addEventListener("click", function (event) {
    toggleActiveAccordion(event, header);
    });
    });

    function resizeActiveAccordionBody() {
    const activeAccordionBody = document.querySelector(
    ".accordion.active .accordion-body"
    );
    if (activeAccordionBody)
    activeAccordionBody.style.maxHeight =
        activeAccordionBody.scrollHeight + "px";
    }

    window.addEventListener("resize", function () {
    resizeActiveAccordionBody();
    });

</script>

@endpush