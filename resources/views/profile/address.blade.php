@extends('layouts.app')

@push('custom_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')

<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row row-cols-1">
                <div class="col">
                <div class="breadcrumb__content">
                    <h1 class="breadcrumb__content--title text-white mb-10">Address Book</h1>
                    <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Address Book</span></li>
                    </ul>
                </div>
                </div>
        </div>
    </div>
    </section>

    <section class="my__account--section section--padding">

        <div class="dasboard-main-wrap">
            <div class="container-fluid pd-50">
                <div class="row">

                    @include('profile.sidebar')

                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="address-main-wrap">
                            <div class="row">
                                <div class="wishlist-bg row" id="addaddressget">
                                            
                                </div>
                                @if($resultData['data']['designation_id'] != '3')
                                    <div class="col-lg-12 col-12">
                                    <a href="javascript:void(0)" class="va_btn add-list-item add-list-item-new" onclick="getUpdateAddress('0')">+ Add Address</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="updateaddressget">

        </div>

   </section>
</main>
@endsection

@push('custom_js')

<script>

    
   
   $(document).ready(getSavedAddress);

    function getSavedAddress(){

        $.ajax({
            url: "{{ route('get-profile-saved-address') }}",
            dataType: 'json',
            type: 'get',
            beforeSend:function(){

                $('#addaddressget').html(loading_set);
            },
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                }

            },
            success: function(data) {

                $('#addaddressget').html(data.html);

            },
            cache: false,
            timeout: 5000
        });

    }

    function getUpdateAddress(address_id){
        
        $.ajax({
            url: "{{ url('get-update-address-modal?address_id=') }}"+address_id,
            dataType: 'json',
            type: 'GET',
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                }

            },
            success: function(data) {
                $('#updateaddressget').html(data.html);
                $('#add-address-modal-update').addClass('is-visible');
            },
            cache: false,
            timeout: 5000
        });

    }

</script>

@endpush