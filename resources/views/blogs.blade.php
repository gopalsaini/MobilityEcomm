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
.va-latest-news-main-wrapper span {
    font-size: 38px !important;
}
.py-2 {
    padding-top: 0rem!important;
    padding-bottom: 0.5rem!important;
}
</style>

   <div class="va-page-strip-tag">
      <ul>
         <li> <a href="{{url('/')}}">Home</a> </li>
         <li>/ &nbsp; Blog </li>
         
      </ul>
   </div>

   <div class="va-latest-news-main-wrapper va-blog-wrapper">
      <div class="news-main-box-wrapper">
      @if(!empty($result) && count($result)>0)
        
            @foreach($result as $key=>$blog)
               <div class="news-box-wrapper">
                  <div class="news-img">
                     <img src="{{ $blog['image'] }}" alt="img">
                  </div>
                  <div class="news-text">
                     <p>
                        <span>
                           <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M17.4173 3.66634H15.584V2.74967C15.584 2.50656 15.4874 2.2734 15.3155 2.10149C15.1436 1.92958 14.9104 1.83301 14.6673 1.83301C14.4242 1.83301 14.191 1.92958 14.0191 2.10149C13.8472 2.2734 13.7507 2.50656 13.7507 2.74967V3.66634H8.25065V2.74967C8.25065 2.50656 8.15407 2.2734 7.98217 2.10149C7.81026 1.92958 7.5771 1.83301 7.33398 1.83301C7.09087 1.83301 6.85771 1.92958 6.6858 2.10149C6.51389 2.2734 6.41732 2.50656 6.41732 2.74967V3.66634H4.58398C3.85464 3.66634 3.15517 3.95607 2.63944 4.4718C2.12372 4.98752 1.83398 5.687 1.83398 6.41634V17.4163C1.83398 18.1457 2.12372 18.8452 2.63944 19.3609C3.15517 19.8766 3.85464 20.1663 4.58398 20.1663H17.4173C18.1467 20.1663 18.8461 19.8766 19.3619 19.3609C19.8776 18.8452 20.1673 18.1457 20.1673 17.4163V6.41634C20.1673 5.687 19.8776 4.98752 19.3619 4.4718C18.8461 3.95607 18.1467 3.66634 17.4173 3.66634ZM18.334 17.4163C18.334 17.6595 18.2374 17.8926 18.0655 18.0645C17.8936 18.2364 17.6604 18.333 17.4173 18.333H4.58398C4.34087 18.333 4.10771 18.2364 3.9358 18.0645C3.76389 17.8926 3.66732 17.6595 3.66732 17.4163V10.9997H18.334V17.4163ZM18.334 9.16634H3.66732V6.41634C3.66732 6.17323 3.76389 5.94007 3.9358 5.76816C4.10771 5.59625 4.34087 5.49967 4.58398 5.49967H6.41732V6.41634C6.41732 6.65946 6.51389 6.89261 6.6858 7.06452C6.85771 7.23643 7.09087 7.33301 7.33398 7.33301C7.5771 7.33301 7.81026 7.23643 7.98217 7.06452C8.15407 6.89261 8.25065 6.65946 8.25065 6.41634V5.49967H13.7507V6.41634C13.7507 6.65946 13.8472 6.89261 14.0191 7.06452C14.191 7.23643 14.4242 7.33301 14.6673 7.33301C14.9104 7.33301 15.1436 7.23643 15.3155 7.06452C15.4874 6.89261 15.584 6.65946 15.584 6.41634V5.49967H17.4173C17.6604 5.49967 17.8936 5.59625 18.0655 5.76816C18.2374 5.94007 18.334 6.17323 18.334 6.41634V9.16634Z" fill="#A56852"/>
                           </svg>
                        </span>
                        {{ date('d M Y',strtotime($blog['date'])) }}
                     </p>
                     <a href="{{route('single.blog',['slug'=>$blog['slug']])}}">{{$blog['title']}} <br></a>
                     <p class="blog-text"> {{$blog['shor_desc']}}</p>
                     <a class="line-btn" href="{{route('single.blog',['slug'=>$blog['slug']])}}">
                        Read More 
                        <span>
                           <svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M13.8065 13.5436L20.0565 7.2936C20.1729 7.1765 20.2383 7.01809 20.2383 6.85298C20.2383 6.68786 20.1729 6.52946 20.0565 6.41235L13.8065 0.162353L12.9253 1.0436L18.1065 6.22485L0.237785 6.22485L0.237785 7.47485L18.1065 7.47485L12.9253 12.6561L13.8065 13.5436Z" fill=""></path>
                           </svg>
                        </span>
                     </a>
                     
                  </div>
               </div>
            @endforeach
         @endif
         
      </div>
     
            <div class="laravel-pagination text-center mt-5">
					{!! $blogs->onEachSide(0)->links() !!}
				</div>
         
   </div>

      
      

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