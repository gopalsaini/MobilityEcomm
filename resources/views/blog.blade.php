@extends('layouts.app')

@section('title',$result['meta_title'])
@section('meta_keywords',$result['meta_keywords'])
@section('meta_description',$result['meta_description'])

@section('content')




<main class="main__content_wrapper">

<!-- Start breadcrumb section -->
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb__content">
                    <h1 class="breadcrumb__content--title text-white mb-10">{{$result['name']}}</h1>
                    <ul class="breadcrumb__content--menu d-flex">
                        <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{route('blogs')}}"><span class="text-white">Blogs</span></a></li>
                        <li class="breadcrumb__content--menu__items"><span class="text-white">{{$result['name']}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb section -->

<!-- Start blog details section -->
<section class="blog__details--section section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog__details--wrapper">
                    <div class="entry__blog">
                        <div class="blog__post--header mb-30">
                            <h2 class="post__header--title mb-15">{{$result['name']}}</h2>
                            <p class="blog__post--meta">Posted by : admin / On : {{$result['date']}} </p>
                        </div>
                        <div class="blog__thumbnail mb-30">
                            <img class="blog__thumbnail--img border-radius-10" src="{{$result['image']}}" alt="blog-img">
                        </div>
                        <div class="blog__details--content">
                            <p class="blog__details--content__desc mb-20">{!! $result['description'] !!}</p>
                            
                        </div>
                    </div>
                    <div class="blog__tags--social__media d-flex align-items-center justify-content-between">
                        <div class="blog__tags--media d-flex align-items-center">
                            <label class="blog__tags--media__title">Releted Tags :</label>
                            <ul class="d-flex">
                                 {!! \App\Helpers\commonHelper::getTagsByArrayId($result['tags']) !!}
                           </ul>
                        </div>
                        <div class="blog__social--media d-flex align-items-center">
                            <label class="blog__social--media__title">Social Share :</label>
                            @php $url = url('blog/'.$result['slug']); @endphp
                            <ul class="d-flex">
                                <li class="blog__social--media__list">
                                    <a class="blog__social--media__link" href="javascript:;" onclick="sharePost('facebook','{{$url}}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                            <path data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"></path>
                                        </svg>
                                        <span class="visually-hidden">Facebook</span>
                                    </a>
                                </li>
                                <li class="blog__social--media__list">
                                    <a class="blog__social--media__link" href="javascript:;" onclick="sharePost('twitter','{{$url}}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                            <path data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"></path>
                                        </svg>
                                        <span class="visually-hidden">Twitter</span>
                                    </a>
                                </li>
                                <li class="blog__social--media__list">
                                    <a class="blog__social--media__link" href="javascript:;" onclick="sharePost('instagram','{{$url}}')">
                                       <span><svg width="16.489" height="13.384" viewBox="0 0 513 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M512.9 129.5C512.9 214 512.9 298.5 512.9 383C512 388 511.4 393.1 510.2 398.1C496.8 455.1 461.9 491.7 405.4 507.6C398.4 509.6 391.1 510.4 383.9 511.8C299.2 511.8 214.6 511.8 129.9 511.8C124.8 510.9 119.7 510.3 114.7 509.1C57.5999 495.7 20.8999 460.9 5.09991 404.4C3.09991 397.4 2.2999 390.2 0.899902 383C0.899902 298.5 0.899902 214 0.899902 129.5C1.7999 124.5 2.59991 119.4 3.59991 114.4C17.2999 47.8999 74.4999 0.899943 142.5 0.799943C218.8 0.599943 295.1 0.699919 371.4 0.899919C380.7 0.899919 390.2 1.49987 399.1 3.59987C456.2 16.7999 492.9 51.6999 508.7 108.1C510.6 115.1 511.5 122.3 512.9 129.5ZM46.6999 255.7C46.5999 255.7 46.4999 255.7 46.4999 255.7C46.4999 293 46.4999 330.2 46.4999 367.5C46.4999 378.9 47.6999 390 51.2999 400.9C63.5999 437.9 99.3999 466.7 144.8 466.4C219.5 465.9 294.1 466.3 368.8 466.3C380 466.3 391 465 401.7 461.5C438.9 449.2 467.6 413.5 467.3 368.1C466.8 293.6 467.2 219.1 467.2 144.5C467.2 133.3 465.9 122.3 462.4 111.6C450 74.3999 414.2 45.7999 368.9 46.0999C294.2 46.5999 219.6 46.2998 144.9 46.1998C132.1 46.1998 119.8 48.0999 107.7 52.4999C73.0999 65.2999 47.3999 100.1 46.8999 136.9C46.2999 176.5 46.6999 216.1 46.6999 255.7Z" fill=""></path>
                                                <path d="M388.8 256.3C388.8 328.8 329.5 387.9 256.9 388C184.1 388 124.7 328.6 124.9 256C125.1 183.5 184.5 124.5 257 124.6C329.6 124.6 388.8 183.8 388.8 256.3ZM343.1 256.4C343.3 208.7 304.8 170.2 256.9 170.1C209.3 170 171 208 170.6 255.7C170.2 303.3 208.6 342 256.5 342.2C304.2 342.6 342.9 304.2 343.1 256.4Z" fill=""></path>
                                                <path d="M394.2 152.5C375.8 152.4 360.8 137.3 360.9 119.1C361.1 101.1 376.1 86.1996 394.2 86.0996C412.3 85.8996 427.7 101.2 427.7 119.4C427.8 137.6 412.6 152.6 394.2 152.5Z" fill=""></path>
                                             </svg>
                                       </span>   
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog__sidebar--widget left widget__area">
                    <!-- <div class="single__widget widget__bg">
                        <h2 class="widget__title position__relative h3">Search</h2>
                        <form class="widget__search--form" action="#">
                            <label>
                                <input class="widget__search--form__input border-0" placeholder="Search by" type="text">
                            </label>
                            <button class="widget__search--form__btn" type="submit">
                                Search 
                            </button>
                        </form>
                    </div> -->
                    @if(!empty($blogs) && count($blogs)>0)
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title position__relative h3">Releted Article</h2>
                            <div class="articl__post--inner">
                                @foreach($blogs as $val)
                                    <div class="articl__post--items d-flex align-items-center">
                                        <div class="articl__post--items__thumbnail position__relative">
                                            <a class="articl__post--items__link display-block" href="{{route('single.blog',['slug'=>$val['slug']])}}">
                                                <img class="articl__post--items__img display-block" src="{{asset('uploads/blog/'.$val['image'])}}" alt="product-img">
                                            </a>
                                        </div>
                                        <div class="articl__post--items__content">
                                            <h4 class="articl__post--items__content--title"><a href="{{route('single.blog',['slug'=>$val['slug']])}}">{{ucfirst($val['title'])}}</a></h4>
                                            <span class="meta__deta text__secondary">{{date('M, d, Y', strtotime($val['created_at']))}}</span>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

</main>


     

@endsection

@push('custom_js')

@endpush