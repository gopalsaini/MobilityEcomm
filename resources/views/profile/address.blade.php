@extends('layouts.app')

@push('custom_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')
    <div class="va-page-strip-tag">
        <ul>
            <li> <a href="{{url('/')}}">Home</a> </li>
            <li>/ &nbsp; Address Book </li>
        </ul>
    </div>

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
                $('#add-address-modal-update').modal('toggle');
            },
            cache: false,
            timeout: 5000
        });

    }

@if(Session::has('5ferns_user'))

    getSavedAddress();

    $("form#address").submit(function (e) {
    
        e.preventDefault();

        var formId = $(this).attr('id');
        var formAction = $(this).attr('action');

        $.ajax({
            url: formAction,
            data: new FormData(this),
            dataType: 'json',
            type: 'post',
            beforeSend: function () {
                $('.addressloader').css('display', 'inline-block');
            },
            error: function (xhr, textStatus){

                if(xhr && xhr.responseJSON.message){

                    showMsg('error',xhr.responseJSON.message);

                }else{

                    showMsg('error',xhr.statusText);
                
                }

                $('.addressloader').css('display', 'none');
            },
            success: function (data) {

                $('.addressloader').css('display', 'none');

                showMsg('success',data.message);

                $('#add-address-modal').modal('toggle');

                getSavedAddress();
            },
            cache: false,
            contentType: false,
            processData: false,
            timeout: 5000
        });

    });

@endif
</script>

@endpush