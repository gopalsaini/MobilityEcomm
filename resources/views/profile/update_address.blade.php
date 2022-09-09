<style>
        .labelbold{
            font-weight: bold;
        }
        .item-rate {
            width: 100%;
            display: flex;
            align-items: center;
            padding-top: 18px;
            justify-content: space-between;
        }
        .fs-wrap .fs-label-wrap{
            width: 100%;
            height: 46px;
            padding: 0px 6px;
            background: #FCF2E7;
            border: none;
        }
        .fs-wrap {
            display: inline-block;
            cursor: pointer;
            line-height: 1;
            width: 100% !important;
        }
        .fs-label-wrap .fs-label {
            padding: 14px 22px 14px 11px !important;
            text-overflow: ellipsis;
            white-space: nowrap;
            /* width: 120%; */
            overflow: hidden;
        }
        .fs-wrap {
			display: inline-block;
			cursor: pointer;
			line-height: 1;
			width: 100%;
		}
		.fs-dropdown {
			position: absolute;
			background-color: #FCF2E7;
			border: 1px solid #ddd;
			width: 100%;
			margin-top: 5px;
			z-index: 1000;
		}
    </style>
   
   <div class="modal fade address-popup" id="add-address-modal-update">

      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">@if(!empty($result)) Update @else Add New @endif Address</h5>
            <button type="button" class="close btnClose" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     
                     <div class="widget">
                           <form id="address" action="{{ url('add-address') }}" class="form-signin" method="post" accept-charset="utf-8">
                              @csrf
                              <input value="@if(!empty($result)){{ $result['id'] }}@else{{ 0 }}@endif" type="hidden" name="id" required >
                              <div class="address-separate">Contact Details</div>
                                 <div class="row">
                                       <div class="col-sm-12 " >
                                          <div class="form-group">
                                                <input class="form-control" required="" value="@if(!empty($result)) {{ $result['name'] }} @endif"
                                                   placeholder="Name*" type="text" name="name"
                                                   onkeypress="return /[A-Za-z ]/i.test(event.key)">
                                          </div>
                                       </div>
                                       <div class="col-sm-3">
                                          <div class="form-group ">
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                   <select class="selectbox code-select" name="phone_code" required >
                                                      <option value="">Phone Code</option>
                                                      @foreach($country as $cont)
                                                         <option value="{{ $cont['phonecode'] }}" @if(!empty($result) && $cont['phonecode']==$result['phone_code']) selected @endif >+ {{ $cont['phonecode'] }}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-9"  style="padding:0 ;">
                                             <div class="form-group">
                                                <input type="tel" placeholder="Mobile*" value="@if(!empty($result)) {{ $result['mobile'] }}@endif" style="width:100%;border-radius: 0 5px 5px 0;" onkeypress="return /[0-9 ]/i.test(event.key)" name="mobile">

                                             </div>
                                       </div>
                                    </div>

                                    <div class="row" style="padding:0 15px;">
                                       <div class="col-sm-12"  style="padding:0 ;">
                                             <div class="form-group">
                                                <input class="form-control" type="email" value="@if(!empty($result)) {{ $result['email'] }} @endif" required
                                                   placeholder="Email*" type="text" name="email" >
                                       </div>
                                    </div>

                              <div class="address-separate">Address</div>
                                    <div class="row">
                                       <div class="col-sm-6">
                                             <div class="form-group">
                                                <select class="country selectbox" name="country_id" data-state_id="@if(!empty($result)) {{ $result['state_id'] }} @else{{ '0' }}@endif" data-city_id="@if(!empty($result)) {{ $result['city_id'] }} @else{{ '0' }}@endif">
                                                   <option value="">--Select--</option>
                                                   @foreach($country as $con)
                                                         <option value="{{ $con['id'] }}" @if(!empty($result) && $con['id']==$result['country_id']) {{ 'selected' }} @endif>{{ ucfirst($con['name']) }}</option>
                                                   @endforeach
                                                </select>
                                             </div>
                                       </div>

                                       <div class="col-sm-6">
                                             <div class="form-group">
                                                <select class="selectbox statehtml" name="state_id" required data-placeholder="Select State">
                                                   <option value="">--Select--</option>
                                                </select>
                                             </div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                             <div class="form-group">
                                                <select class="selectbox cityHtml" name="city_id">
                                                   <option value="">--Select--</option>
                                                </select>
                                             </div>
                                       </div>
                                       
                                       <div class="col-sm-6">
                                             <div class="form-group">
                                                <input required class="form-control pincodesssss" 
                                                   placeholder="pincode*" type="tel" value="@if(!empty($result)){{ $result['pincode'] }}@endif" name="pincode" onkeypress="return /[0-9 ]/i.test(event.key)" minlength="6" maxlength="6">
                                             </div>
                                       </div>

                                       <div class="col-sm-12">
                                             <div class="form-group">
                                                <input required class="form-control" 
                                                   placeholder="Address 1(House No, Building, Street, Area)*" type="text" value="@if(!empty($result)) {{ $result['address_line1'] }} @endif" name="address_line1">
                                             </div>
                                       </div>
                                       

                                       <div class="col-sm-12">
                                             <div class="form-group">
                                                <input required="" class="form-control"
                                                   placeholder="Address 2(House No, Building, Street, Area)" type="text" value="@if(!empty($result)) {{ $result['address_line2'] }} @endif" name="address_line2">
                                             </div>
                                       </div>
                                       
                                       <div class="col-sm-12">
                                             <div class="form-group">
                                                <select class="form-control" name="type_id" required >
                                                   <option value="">Type</option>
                                                   <option value="1" @if(!empty($result) && $result['type']=='1') selected @endif>Home</option>
                                                   <option value="2" @if(!empty($result) && $result['type']=='2') selected @endif>Office</option>
                                                </select>
                                             </div>
                                       </div>
                                    </div>

                                    <div class="row">
                                       <div class="col-sm-12">
                                             <button name="signupBtn" type="submit" value="true" id=""
                                                class="submit-address d-flex btn btn-primary" style="align-items:center;">
                                                Submit
                                                <pre class="spinner-border spinner-border-sm addressloader"
                                                         style="color:white;font-size: 100%;position:relative;top:32%; margin-left:10px;display:none"></pre>
                                             </button>
                                       </div>
                                    </div>
                                 </form>
                           </div>
                        </div>
                     </div>
               </div>
         </div>
   </div>

<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script>

$(".btnClose").click(function () {
   $("#add-address-modal-update").modal('hide');
   $("#add-address-modal").modal('hide');
});

$(document).ready(function(){
    $('.selectpicker').selectpicker('refresh');
    $('.selectbox').fSelect();

    $('.code-select').fSelect({
      placeholder: 'Phone Code',
      numDisplayed: 3,
      overflowText: '{n} selected',
      noResultsText: 'No results found',
      searchText: 'Search',
      showSearch: true
   });
});

var selectedId=0;
var city_id=0;

getState();
getCity();

@if($result)
    $(".country").trigger('change');
@endif


$("form#address").submit(function(e) {

    e.preventDefault();

    var formId = $(this).attr('id');
    var formAction = $(this).attr('action');

    var form_data = new FormData(this);

    $.ajax({
        url: formAction,
        data: new FormData(this),
        dataType: 'json',
        type: 'post',
        beforeSend: function() {
            $('.addressloader').css('display', 'block');
        },
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {
                showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
            } else {
                showMsg('error', xhr.status + ': ' + xhr.statusText);
            }

            $('.addressloader').css('display', 'none');
        },
        success: function(data) {
            if (data.error) {
                showMsg('error', data.message);
            } else {
                showMsg('success', data.message);
            }
            
            $('#add-address-modal-update').modal('toggle');

            getSavedAddress();

            $('.addressloader').css('display', 'none');
        },
        cache: false,
        contentType: false,
        processData: false,
        timeout: 5000
    });
});
</script>
