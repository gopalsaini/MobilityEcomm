

    
        @if(!empty($result))
            <div class="cart-tble-wrapper">
                <div class="table table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th class="text-right">Product Details</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach($result as $raw)
                                @php
                                    $productResult=\App\Models\Variantproduct::find($raw['product_id']);
                                @endphp
                                <tr>
                                    <td>
                                    <div class="cart-img-box">
                                        <div class="cart-img">
                                            <img class="img-fluid" src="{{ $raw['image'] }}" alt="img" />
                                        </div>
                                        <input type="hidden" class="cart_id" value="{{ $raw['id'] }}" name="cart_id" />
                                        <input type="hidden" class="cartproduct_id" value="{{ $raw['product_id'] }}" name="product_id" />

                                        <div class="cart-img-text">
                                            <span>
                                                @if($productResult)

                                                    @php echo \App\Helpers\commonHelper::getVaraintName($productResult->variant_id,$productResult->variant_attributes); @endphp

                                                @endif
                                            </span>
                                            
                                            <h3>{{ ucfirst($raw['product_name'] )}}</h3>
                                            @php $id = $raw['id'];@endphp
                                            <a href="#" onclick="deleteCartData('{{$id}}')">
                                                <div class="remove-product " style="display: flex;"><i class="icon-close iconClodeLoder{{$id}}"></i> <pre class="spinner-border spinner-border-sm Deleteloader{{$id}}" style="color:#296769;font-size: 100%;position:relative;top:6%;display:none"></pre>&nbsp;&nbsp;Remove </div>
                                            </a>
                                            <p style="color:red">{{\App\Helpers\commonHelper::checkProductInCountryAvailable(Session::get('country_type'),$productResult->canada_stock,$productResult->usa_stock,$productResult->india_stock)}}</p>

                                        </div>
                                    </div>
                                    </td>
                                    
                                    <td>
                                    
                                        <div class="number_pluse">
                                            <div class="nice-number">
                                                
                                                <button type="button" class="minus-btn-qty " data-id="{{$raw['id']}}" data-product_id="{{$raw['product_id']}}">-</button>
                                                    <input type="text" value="{{$raw['qty']}}" class="cartqty qty{{$raw['id']}}" style="width: 3ch;">
                                                <button type="button" class="plus-btn-qty " data-id="{{$raw['id']}}"  data-product_id="{{$raw['product_id']}}">+</button>
                                            </div>
                                        </div>
                                            
                                    </td>
                                    <td><h4>
                                            @if($raw['discount_amount']>0)
                                                <div class="cr-main-price cr-pr-bold"> {{ \App\Helpers\commonHelper::getPriceByCountry($raw['sale_price'])  }}</div>
                                                <div>
                                                    <span class="cr-del-price">
                                                        <span class="cr-del-text">{{ \App\Helpers\commonHelper::getPriceByCountry( $raw['offer_price']) }}</span>
                                                        <!--<span class="discount-price">55%  OFF</span>-->
                                                </div>
                                            @else
                                                <div class="cr-main-price cr-pr-bold">{{ \App\Helpers\commonHelper::getPriceByCountry($raw['sale_price'])  }}</div>
                                            @endif
                                        </h4>
                                    </td>
                                    <td><h4>
                                            @if($raw['discount_amount']>0)
                                                <div class="cr-main-price cr-pr-bold"> {{ (\App\Helpers\commonHelper::getPriceByCountry(($raw['qty']*$raw['sale_price'])))  }}</div>
                                                
                                            @else
                                                <div class="cr-main-price cr-pr-bold">{{ (\App\Helpers\commonHelper::getPriceByCountry(($raw['qty']*$raw['sale_price'])))  }}</div>
                                            @endif
                                        </h4>
                                    </td>
                                </tr>
                            @endforeach
                            
                        
                    </tbody>
                </table>
                </div>
            </div>
        @else
            <div class="thankyou-card" style="text-align: center;margin: 50px;">
                <div class="icon-box">
                    <img class="img-fluid" src="{{ asset('images/cart-empty.gif') }}" alt="">
                </div>
                <div class="thankyou-text">
                    <h4><span>Oops!</span> Your cart is empty!</h4>
                    <p>Looks like you haven't added anything to your cart yet.</p>
                    
                </div>
            </div>
        @endif

<script>

    jQuery(function(){
        var j = jQuery;
        var n = 1; 
        
        j('.plus-btn-qty').on('click', function(){
            
            var product_id = $(this).data('product_id');
            var id = $(this).data('id');
            var n = j('.qty'+id).val();
            j('.qty'+id).val(++n);
            change_quantity(+n,id,product_id);
            // alert(+n);
        })

        j('.minus-btn-qty').on('click', function(){
            var product_id = $(this).data('product_id'); 
            var id = $(this).data('id');
            var n = j('.qty'+id).val();
            if (n > 1) {
            j('.qty'+id).val(n-1);
            change_quantity(n-1,id,product_id);
            } else {
            
            }
        });
    });


</script>