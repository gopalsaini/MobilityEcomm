@extends('layouts.app')

@section('title','Blogs')
@section('meta_keywords','Blogs')
@section('meta_description','Blogs')

@section('content')
<style>
.laravel-pagination .flex-1, .laravel-pagination p.leading-5{display:none;}
.w-5.h-5{height: 20px;}
.hidden {
    display: block !important;
}

.py-2 {
    padding-top: 0rem!important;
    padding-bottom: 0.5rem!important;
}
</style>


      <main class="main__content_wrapper">

            <section class="breadcrumb__section breadcrumb__bg">
               <div class="container">
                  <div class="row row-cols-1">
                        <div class="col">
                           <div class="breadcrumb__content">
                              <h1 class="breadcrumb__content--title text-white mb-10">Blogs</h1>
                              <ul class="breadcrumb__content--menu d-flex">
                                    <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb__content--menu__items"><span class="text-white">Blog </span></li>
                              </ul>
                           </div>
                        </div>
                  </div>
               </div>
            </section>

            <section class="blog__section section--padding">
               <div class="container">
                  <div class="section__heading text-center mb-40">
                        <h2 class="section__heading--maintitle">Latest Post From Blog</h2>
                  </div>
                  <div class="blog__section--inner p-0">
                        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 mb--n30">
                           @if(!empty($result) && count($result)>0)
                     
                              @foreach($result as $key=>$blog)
                                 <div class="col mb-30">
                                    <div class="blog__items">
                                          <div class="blog__thumbnail">
                                             <a class="blog__thumbnail--link display-block" href="{{route('single.blog',['slug'=>$blog['slug']])}}"><img class="blog__thumbnail--img display-block" src="{{ $blog['image'] }}" alt="blog-img"></a>
                                          </div>
                                          <div class="blog__content">
                                             <ul class="blog__content--meta d-flex">
                                                <li class="blog__content--meta__text">
                                                      <svg class="blog__content--meta__icon" xmlns="http://www.w3.org/2000/svg" width="11.001" height="11.001" viewBox="0 0 11.001 11.001">
                                                         <path  data-name="Icon awesome-user-circle" d="M5.5.313a5.5,5.5,0,1,0,5.5,5.5A5.5,5.5,0,0,0,5.5.313Zm0,2.129A1.952,1.952,0,1,1,3.549,4.394,1.952,1.952,0,0,1,5.5,2.442Zm0,7.63A4.25,4.25,0,0,1,2.251,8.559,2.473,2.473,0,0,1,4.436,7.232a.543.543,0,0,1,.157.024A2.937,2.937,0,0,0,5.5,7.41a2.925,2.925,0,0,0,.907-.153.543.543,0,0,1,.157-.024A2.473,2.473,0,0,1,8.75,8.559,4.25,4.25,0,0,1,5.5,10.071Z" transform="translate(0 -0.313)" fill="currentColor"/>
                                                      </svg> Admin
                                                </li>
                                                <li class="blog__content--meta__text">
                                                      <svg class="blog__content--meta__icon" xmlns="http://www.w3.org/2000/svg" width="12.569" height="13.966" viewBox="0 0 12.569 13.966">
                                                         <path  data-name="Icon material-date-range" d="M8.69,9.285h-1.4v1.4h1.4Zm2.793,0h-1.4v1.4h1.4Zm2.793,0h-1.4v1.4h1.4Zm1.4-4.888h-.7V3h-1.4V4.4H7.991V3h-1.4V4.4H5.9a1.39,1.39,0,0,0-1.39,1.4L4.5,15.569a1.4,1.4,0,0,0,1.4,1.4h9.776a1.4,1.4,0,0,0,1.4-1.4V5.793A1.4,1.4,0,0,0,15.673,4.4Zm0,11.173H5.9V7.888h9.776Z" transform="translate(-4.5 -3)" fill="currentColor"/>
                                                      </svg> {{ date('d M Y',strtotime($blog['date'])) }}
                                                </li>
                                             </ul>
                                             <h3 class="blog__content--title h4"><a href="{{route('single.blog',['slug'=>$blog['slug']])}}">{{$blog['title']}}</a></h3>
                                             <p class="blog__content--desc">{{$blog['shor_desc']}}</p>
                                             <a class="blog__content--btn primary__btn" href="{{route('single.blog',['slug'=>$blog['slug']])}}">Read more </a>
                                          </div>
                                    </div>
                                 </div>
                              @endforeach
                           @endif
                        </div>
                        <div class="pagination__area bg__gray--color">
                           <nav class="pagination">
                              {!! $blogs->onEachSide(0)->links() !!}
                           </nav>
                        </div>
                  </div>
               </div>
            </section>

            <section class="newsletter__banner--section section--padding pt-0">
               <div class="container">
                  <div class="newsletter__banner--thumbnail position__relative">
                        <img class="newsletter__banner--thumbnail__img" src="assets/img/banner/banner-bg7.webp" alt="newsletter-banner">
                        <div class="newsletter__content newsletter__subscribe">
                           <h5 class="newsletter__content--subtitle text-white">Want to offer regularly ?</h5>
                           <h2 class="newsletter__content--title text-white h3 mb-25">Subscribe Our Newsletter <br> for Get Daily Update</h2>
                           <form class="newsletter__subscribe--form position__relative" action="#">
                              <label>
                                    <input class="newsletter__subscribe--input" placeholder="Enter your email address" type="email">
                              </label>
                              <button class="newsletter__subscribe--button primary__btn" type="submit">Subscribe
                                    <svg class="newsletter__subscribe--button__icon" xmlns="http://www.w3.org/2000/svg" width="9.159" height="7.85" viewBox="0 0 9.159 7.85">
                                       <path  data-name="Icon material-send" d="M3,12.35l9.154-3.925L3,4.5,3,7.553l6.542.872L3,9.3Z" transform="translate(-3 -4.5)" fill="currentColor"/>
                                    </svg>
                              </button>
                           </form>
                        </div>
                  </div>
               </div>
            </section>

      </main>
  

@endsection

@push('custom_js')

<script>
    $("form#trackform").submit(function(e) {

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
                $('.order_fatch').html(data.html);
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
@endpush