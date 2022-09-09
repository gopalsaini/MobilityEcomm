@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update Collection Product
	@else
		Add Collection Product
	@endif
	Product
@endsection

@push('custom_css')
	<link href="{{ asset('admin-assets/dragimage/dist/image-uploader.min.css')}}" rel="stylesheet"> 
	<link rel="stylesheet" href="{{ asset('admin-assets/colorpicker/spectrum.css')}}" />
	<style>
		.fs-wrap {
			display: inline-block;
			cursor: pointer;
			line-height: 1;
			width: 100%;
		}
		.fs-dropdown {
			position: absolute;
			background-color: #fff;
			border: 1px solid #ddd;
			width: 100%;
			margin-top: 5px;
			z-index: 1000;
		}

	</style>
@endpush

@section('content')



<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i>  Go To</h2>
					</div>
					<div class="body">
						<div class="btn-group top-head-btn">
                            <a class="btn-primary" href="{{ url('admin/catalog/product-collection/list/')}}">
                                <i class="fa fa-list"></i> Collection Product List 
							</a>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i> @if(!empty($result)) Update @else Add @endif Collection Product</h2>
					</div>
					<div class="body">
						<form id="form" action="{{ route('admin.collection.add') }}" method="post" enctype="multipart/form-data" autocomplete="off">
						@csrf
						<input  value="@if(!empty($result)){{ $result['id'] }}@else{{ '0' }}@endif" type="hidden" required class="form-control" name="id" />

						<div class="row clearfix">

							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Select Products <label class="text-danger">*</label></label>
										<select name="variant_product[]" id="select" class="form-control" multiple="multiple">
											<option value="">Select Products</option>
											@if(!empty($products))
												@foreach($products as $key=>$value)
													@php 
														$variant_product_id=[];

														if($result){
												
															$variant_product_id=explode(',',$result->variant_product_id);
														}
													@endphp 

													<option value="{{$value->id}}" @if(in_array($value->id,$variant_product_id)) selected @endif >{{$value->name}}-{{$value->sku_id}} </option>
												@endforeach
											@endif
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="row clearfix">

							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Collection Name <label class="text-danger">*</label></label>
										<input type="text" name="name" required class="form-control" placeholder="Collection Name" value="@if(!empty($result)){{ $result['name'] }}@endif"/>
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">SKU <label class="text-danger">*</label></label>
										<input type="text" name="sku_id" required class="form-control" placeholder="Enter SKU" value="@if(!empty($result)){{ $result['sku_id'] }}@endif"/>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row clearfix">

							<div class="col-sm-@if( !empty($result) && $result->b2b == '1'){{'4'}}@else{{'12'}}@endif" id="B2BCheck">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Is applicable for B2B <label class="text-danger">*</label></label>
										<select class="form-control" name="b2b" required id="B2B">
											<option value="" disabled selected>--Select--</option>
											<option value="1" @if(!empty($result))@if($result->b2b == '1') selected @endif @endif>Yes</option>
											<option value="2" @if(!empty($result))@if($result->b2b == '2') selected @endif @endif>No</option>
												
										</select>
									</div>
								</div>
							</div>

							<div class="col-sm-4" style="display:@if(!empty($result) && $result->b2b == '1') block @else none @endif " id="B2BMinQty">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">B2B Min Qty <label class="text-danger">*</label></label>
										<input type="text" id="b2b_min_qty" name="b2b_min_qty" class="form-control" placeholder="Enter B2B Min Qty" value="@if(!empty($result)){{ $result['b2b_min_qty'] }}@endif"/>
									</div>
								</div>
							</div>

							<div class="col-sm-4" style="display:@if(!empty($result) && $result->b2b == '1') block @else none @endif " id="B2BPrice">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">B2B Price <label class="text-danger">*</label></label>
										<input type="text" id="b2b_price" name="b2b_price" required class="form-control" placeholder="Enter SKU" value="@if(!empty($result)){{ $result['b2b_price'] }}@endif"/>
									</div>
								</div>
							</div>
						</div>
						<p></p>
						
						<div class="row clearfix">
						
							<div class="col-sm-3">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Canada Stock (Qty) <label class="text-danger">*</label></label>
										<input type="tel" name="canada_stock" onkeypress="return /[0-9 a-z A-Z]/i.test(event.key)" value="@if(!empty($result)){{ $result['canada_stock'] }}@endif" class="form-control" placeholder="Enter Stock (Qty)" required />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">USA Stock (Qty) <label class="text-danger">*</label></label>
										<input type="tel" name="usa_stock" onkeypress="return /[0-9 a-z A-Z]/i.test(event.key)" value="@if(!empty($result)){{ $result['usa_stock'] }}@endif" class="form-control" placeholder="Enter Stock (Qty)" required />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">India Stock (Qty) <label class="text-danger">*</label></label>
										<input type="tel" name="india_stock" onkeypress="return /[0-9 a-z A-Z]/i.test(event.key)" value="@if(!empty($result)){{ $result['india_stock'] }}@endif" class="form-control" placeholder="Enter Stock (Qty)" required />
									</div>
								</div>
							</div>
							
							<div class="col-sm-3">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Sale Price (Rs) <label class="text-danger">*</label></label>
										<input type="tel" name="sale_price" value="@if(!empty($result)){{ $result['sale_price'] }}@endif" onkeypress="return isNumberKey(event)"  class="form-control" placeholder="Enter sale price" required />
									</div>
								</div>
							</div>

						</div>
						
						<div class="row clearfix">
						
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Package Length (in cm) <label class="text-danger">*</label></label>
										<input type="tel" name="package_length" value="@if(!empty($result)){{ $result['package_length'] }}@endif" onkeypress="return isNumberKey(event)"  class="form-control" placeholder="Enter Package Length (in cm)" required />
									</div>
								</div>
							</div>
							
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Package Breadth (in cm) <label class="text-danger">*</label></label>
										<input type="tel" name="package_breadth" value="@if(!empty($result)){{ $result['package_breadth'] }}@endif" onkeypress="return isNumberKey(event)"  class="form-control" placeholder="Enter Package Breadth (in cm)" required />
									</div>
								</div>
							</div>
						</div>
						
						<div class="row clearfix">
						
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Package Height (in cm) <label class="text-danger">*</label></label>
										<input type="tel" name="package_height"  value="@if(!empty($result)){{ $result['package_height'] }}@endif" onkeypress="return isNumberKey(event)"  class="form-control" placeholder="Enter Package Height (in cm)" required />
									</div>
								</div>
							</div>
							
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Package Weight (in kg) <label class="text-danger">*</label></label>
										<input type="tel" name="package_weight" value="@if(!empty($result)){{ $result['package_weight'] }}@endif" onkeypress="return isNumberKey(event)"  class="form-control" placeholder="Enter Package Weight (in kg)" required />
									</div>
								</div>
							</div>

						</div>
						
						
						<div class="row clearfix">
						
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Package Label <label class="text-danger">*</label></label>
										<input type="tel" name="package_label"  value="@if(!empty($result)){{ $result['package_label'] }}@endif"  class="form-control" placeholder="Enter Package Label" required />
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Images</label>
										<div class="input-images" style="padding-top: .5rem;"></div>
										<!--<p style="color:red;width:100%">Size must be 800*800</p>-->
									</div>
									<p>
								</div>
							</div>
						</div>

						<div class="row clearfix">
						
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Meta Title <label class="text-danger">*</label></label>
										<input type="text" name="meta_title"  class="form-control" placeholder="Meta Title" required value="@if(!empty($result)){{ $result['meta_title'] }}@endif" />
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Meta Keywords <label class="text-danger">*</label></label>
										<textarea class="form-control" name="meta_keywords" rows="4" placeholder="Meta Keywords"  cols="50">@if(!empty($result)){{ $result['meta_keywords'] }}@endif</textarea>
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Meta Description <label class="text-danger">*</label></label>
										<textarea class="form-control" name="meta_description" rows="4" cols="50" placeholder="Meta Description">@if(!empty($result)){{ $result['meta_description'] }}@endif</textarea>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="col-lg-12 p-t-20 text-center">
							@if(empty($result)) 
								<button type="reset" class="btn btn-danger waves-effect">Reset</button>
							@endif
							<button style="background:#353c48;" type="submit" class="btn btn-primary waves-effect m-r-15" >@if(!empty($result)) Update @else Submit @endif</button> 
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@push('custom_js')


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

	<script src="{{ asset('admin-assets/colorpicker/spectrum.js') }}" ></script>
	<script src="{{ asset('admin-assets/colorpicker/docs/docs.js') }}" ></script> 

	<script type="text/javascript" src="{{ asset('admin-assets/dragimage/dist/image-uploader.min.js')}}"></script>
	<script>  

		let preloaded = [
			@if(!empty($result->images))
				
				@php $images = explode(',',$result->images);  @endphp 
					@foreach($images as $key=>$image)
						{id: "{{$image}}", src: "{{ asset('uploads/products')}}/{{$image}}"},
					@endforeach
			@endif
			
		];

		$('.input-images').imageUploader({
			extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
			mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
			preloaded: preloaded,
			imagesInputName: 'uploadfile',
			preloadedInputName: 'images',
			maxSize: 2 * 1024 * 1024,
			maxFiles: 10
		});

		@if(!empty($event->image))

			var input_id = $('input[type=file]')[0]['id'];
			$('#'+input_id).change(function(){
				confirm("do you want to add images ?");
				var file = $(this)[0].files;
				var form_data = new FormData();

				for (i = 0; i < file.length; i++) {
					form_data.append('file[]', file[i]);
				}
				form_data.append('file_length', file.length);
				form_data.append('id', "@if($event) {{ $event->id }} @else 0 @endif");
				form_data.append('sid', "@if($event) {{ $event->id }} @else 0 @endif");

				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{route('admin.product.addproduct')}}",
					data: form_data,
					dataType:'json',
					type: 'post',
					beforeSend: function(){
						$('#preloader').css('display','block');
					},
					error:function(xhr,textStatus){
						location.reload();
						window.scrollTo({top: 0, behavior: 'smooth'});
						$('#preloader').css('display','none');
					},
					success: function(data){
						if(data.error){
							alert(data.error);
						}else{
							location.reload();
							window.scrollTo({top: 0, behavior: 'smooth'});
							$('#preloader').css('display','none');
						}
					},
					cache:false,
					contentType:false,
					processData:false,
					timeout: 5000
				});
			});
		@endif
		
		$(function() {
			$( ".uploaded" ).sortable({
				update: function() {
				}
			});
		});


		function resetFormData(){ 
			$('.image-uploader').removeClass('has-files');
			$('.uploaded').html('');
		}
	</script>
	<script>
		$('.attributeAdd').click(function() {
				
			var id = $(this).data('id');
			var color_type = $(this).data('color_type');
			
			if(color_type != '2'){

				$('#colordiv').css('display','none');
			}else{
				$('#colordiv').css('display','block');
			}
			$('#varientAttributeModel').modal('toggle');
			$('#attributeId').val(id);
		});
	</script>
	 <script>
		$('#select').fSelect({
			placeholder: 'Select Products',
			numDisplayed: 8,
			overflowText: '{n} selected',
			noResultsText: 'No results found',
			searchText: 'Search',
			showSearch: true
		});
		

		$("#B2B").on('change', function() {
			
			var id = $(this).val();
		
			if(id == 1){
				$('#B2BMinQty').css('display','block');
				$('#B2BPrice').css('display','block');
				$('#B2BCheck').addClass('col-sm-4').removeClass('col-sm-12');
				$("#b2b_min_qty").attr("required", true);
				$("#b2b_price").attr("required", true);

			}else{
				$('#B2BMinQty').css('display','none');
				$('#B2BCheck').addClass('col-sm-12').removeClass('col-sm-4');
				$('#B2BPrice').css('display','none');
				$("#b2b_min_qty").attr("required", false);
				$("#b2b_price").attr("required", false);
			}
		
		});
	</script>   
@endpush
