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

    <div class="offcanvas__filter--sidebar widget__area">
        <button type="button" class="offcanvas__filter--close">
            <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path></svg> <span class="offcanvas__filter--close__text">Close</span>
        </button>
        <div class="offcanvas__filter--sidebar__inner">

            @if(!empty($categoryResult))
                <div class="single__widget widget__bg">
                    <h2 class="widget__title position__relative h3">Categories</h2>
                    @foreach($categoryResult['result'] as $cat)
                        <ul class="widget__categories--menu">
                            <li class="widget__categories--menu__list">
                                <label class="widget__categories--menu__label d-flex align-items-center">
                                    <img class="widget__categories--menu__img" src="{{ asset('uploads/category/'.$cat['image']) }}" alt="{{ ucfirst($cat['name']) }}">
                                    <span class="widget__categories--menu__text"><a href="{{ url('product-listing/'.$cat['slug']) }}">{{ ucfirst($cat['name']) }}</a></span>
                                    @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                        <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                            <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                        </svg>
                                    @endif
                                </label>
                                @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                    <ul class="widget__categories--sub__menu">
                                        @foreach($cat['child'] as $fchild)
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="{{ url('product-listing/'.$fchild['slug']) }}">
                                                    <img class="widget__categories--sub__menu--img" src="{{ asset('uploads/category/'.$fchild['image']) }}" alt="{{ ucfirst($fchild['name']) }}">
                                                    <span class="widget__categories--sub__menu--text">{{ ucfirst($fchild['name']) }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        </ul>
                    @endforeach
                </div>
            @endif
            <div class="single__widget price__filter widget__bg">
                <h2 class="widget__title position__relative h3">Filter By Price</h2>
                
                <div class="sidebar_widget">
                    <div class="price-range-slider">
                            <div id="slider-range" class="range-bar"></div>
                            <p class="range-value">
                                Range:
                                <input type="text" id="amount" readonly>
                            </p>
                    </div>
                </div>
            </div>
            @if($variant->status==200)

                @php $variantData=json_decode($variant->content,true); @endphp

                @foreach($variantData['result'] as $raw)

                @if(!empty($raw['attributes']) && $raw['attributes'][0]!='')
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title position__relative h3">{{ $raw['name'] }}</h2>
                            <ul class="widget__form--check">
                    
                                @foreach($raw['attributes'] as $rawattribute)
                                    <li class="widget__form--check__list">
                                        <label class="widget__form--check__label" for="check{{ $rawattribute['id'] }}">{{ $rawattribute['title'] }}</label>
                                        <input class="widget__form--check__input" id="check{{ $rawattribute['id'] }}" value="{{ $rawattribute['id'] }}" onchange="setSortOrder()" type="checkbox">
                                        <span class="widget__form--checkmark"></span>

                                    </li>
                                @endforeach
                            
                            </ul>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>

<main class="main__content_wrapper">

    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container-fluid">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Shop </span></li>
                            
                            @if(!empty($slugCategoryResult))
                                @foreach($slugCategoryResult as $key=>$slug)
                                    @if(count($slugCategoryResult)!=($key+1))
                                        <li class="breadcrumb__content--menu__items"><a href="{{ url('product-listing/'.$slug['slug'] )}}" class="text-white">{{ $slug['name'] }}</a></li>
                                    @else
                                        <li class="breadcrumb__content--menu__items"><span class="text-white">{{ $slug['name'] }}</span></li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop__section section--padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="shop__sidebar--widget widget__area d-md-none">
                        @if(!empty($categoryResult))
                            <div class="single__widget widget__bg">
                                <h2 class="widget__title position__relative h3">Categories</h2>
                                @foreach($categoryResult['result'] as $cat)
                                    <ul class="widget__categories--menu " style="padding: 1px;">
                                        <li class="widget__categories--menu__list">
                                            <label class="widget__categories--menu__label d-flex align-items-center">
                                                <img class="widget__categories--menu__img" src="{{ asset('uploads/category/'.$cat['image']) }}" alt="{{ ucfirst($cat['name']) }}">
                                                <span class="widget__categories--menu__text"><a href="{{ url('product-listing/'.$cat['slug']) }}">{{ ucfirst($cat['name']) }}</a></span>
                                                @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                                    <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                        <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                                    </svg>
                                                @endif
                                            </label>
                                            @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                            <ul class="widget__categories--sub__menu">
                                                
                                                    @foreach($cat['child'] as $fchild)
                                                        <li class="widget__categories--sub__menu--list">
                                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="{{ url('product-listing/'.$fchild['slug']) }}">
                                                                <img class="widget__categories--sub__menu--img" src="{{ asset('uploads/category/'.$fchild['image']) }}" alt="{{ ucfirst($fchild['name']) }}">
                                                                <span class="widget__categories--sub__menu--text">{{ ucfirst($fchild['name']) }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                
                                                
                                            </ul>
                                            @endif
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        @endif
                        <div class="single__widget price__filter widget__bg">
                            <h2 class="widget__title position__relative h3">Filter By Price</h2>
                            <div class="range-slider">
                                <div id="price-range" data-min="0" data-max="6000" data-unit="$"></div>
                                <div class="clearfix" style="display: flex;">
                                    <input type='text' class='first-slider-value' disabled style='margin: 22px;width: 40%;'/><input type='text' class='second-slider-value' disabled style='margin: 22px;width: 40%;'/>
                                </div>
                            </div>
                        </div>
                        @if($variant->status==200)

                            @php $variantData=json_decode($variant->content,true); @endphp

                            @foreach($variantData['result'] as $raw)

                            @if(!empty($raw['attributes']) && $raw['attributes'][0]!='')
                                    <div class="single__widget widget__bg">
                                        <h2 class="widget__title position__relative h3">{{ $raw['name'] }}</h2>
                                        <ul class="widget__form--check">
                                
                                            @foreach($raw['attributes'] as $rawattribute)
                                                <li class="widget__form--check__list">
                                                    <label class="widget__form--check__label" for="check{{ $rawattribute['id'] }}">{{ $rawattribute['title'] }}</label>
                                                    <input class="widget__form--check__input" id="check{{ $rawattribute['id'] }}" value="{{ $rawattribute['id'] }}" onchange="setSortOrder()" type="checkbox">
                                                    <span class="widget__form--checkmark"></span>

                                                </li>
                                            @endforeach
                                        
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        
                    
                    </div>
                </div>
                
                <input type="hidden" id="number" class="qty" value="1" />
                <input type="hidden" id="min_price" value="0" />
                <input type="hidden" id="max_price" value="600000" />
                <div class="col-xl-9 col-lg-8">
                    <div class="shop__header bg__gray--color d-flex align-items-center justify-content-between mb-30">
                        <button class="widget__filter--btn d-none d-md-flex align-items-center">
                            <svg  class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80"/><circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/></svg> 
                            <span class="widget__filter--btn__text">Filter</span>
                        </button>
                        <div class="product__view--mode d-flex align-items-center">
                            
                            <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                                <label class="product__view--label">Sort By :</label>
                                <div class="select shop__header--select">
                                    <select class="form-field-select product__view--select sort_by" title="Sort By" name="sort_by"
                                            onchange="setSortOrder()">
                                        <option value="1" selected>Price: Low to High</option>
                                        <option value="2">Price: High to Low</option>
                                        <option value="3">Order: ASC</option>
                                        <option value="4">Order: DESC</option>
                                    </select> 
                                </div>
                            </div>
                        </div>
                        <p class="product__showing--count">Showing <span id="totalProduct">0</span> results</p>
                    </div>
                    <div class="shop__product--wrapper">
                        <div class="tab_content">
                            <div id="product_grid" class="tab_pane active show">
                                <div class="product__section--inner product__grid--inner">
                                    <div class="row row-cols-xxl-4 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-2 mb--n30" id="productScroll">
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

    @php

        $type = ''; 
        if(isset($_GET['type']) && $_GET['type'] != ''){
            $type = $_GET['type'];

        }
    @endphp

@endsection

@push('custom_js')
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/scroller.js') }}"></script>
    <script>

    
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
                "ondemandproduct":"{{$ondemandCategory}}",
                "type":"{{$type}}"
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
                
                // productWishlist();

                productNotify();
                
                notscrolly = true;

                $(document).ready(addToCart);
            }
        });
    }
</script>
<script>
    document.querySelector('.filter-mob').addEventListener('click', function () {
		document.querySelector('.filter-sideBar').classList.toggle('left-move');
	});
    
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