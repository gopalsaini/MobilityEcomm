@if(!empty($result))
    <div class="toggle-content">
        @php $total = 0;  @endphp
        @foreach($result as $raw)
            @php
                $productResult=\App\Models\Variantproduct::find($raw['product_id']);
                
            @endphp
            <div class="toggle-details-box">
                <div class="toggle-strip">
                    <img class="img-fluid" src="{{ $raw['image'] }}" alt="img" style="width: 74px;"/>
                </div>
                <div class="toggle-text">
                    <span>{{ ucfirst($raw['product_name'] )}}</span>
                    <small>{{$raw['qty']}} X 
                        
                    @if($raw['discount_amount']>0)
                        {{ \App\Helpers\commonHelper::getPriceByCountry($raw['offer_price'])  }}

                        @php $total+= $raw['offer_price']; @endphp
                        
                    @else
                        {{ \App\Helpers\commonHelper::getPriceByCountry($raw['sale_price'])  }}
                        @php $total+= $raw['sale_price'];  
                        
                        @endphp
                    @endif

                    @php $id = $raw['id'];@endphp
                    </small>
                    <a href="#" onclick="deleteCartData('{{$id}}')"  class="">
                        <div class="remove-product " style="display: flex;"><i class="icon-close iconClodeLoder{{$id}}"></i> <pre class="spinner-border spinner-border-sm Deleteloader{{$id}}" style="color:#296769;font-size: 100%;position:relative;top:6%;display:none"></pre>&nbsp;&nbsp;Remove </div>
                    </a>
                </div>
            </div>
        @endforeach
        
        <div class="subtotal">
            <span>Subtotal :</span>
            <p>{{ \App\Helpers\commonHelper::getPriceByCountry($total)  }}</p>
        </div>
        <div class="cart-btn-sec">
            
                <a class="va_btn" href="{{url('cart')}}">View Cart</a>
            @if(!empty($userResultData) && $userResultData['data']['designation_id'] != '3')
                <a class="va_btn" href="{{url('checkout')}}">Checkout</a>
            @endif
        </div>
    </div>
@else
    <div class="thankyou-card" style="text-align: center;margin: 50px;">
        <div class="icon-box">
            <img class="img-fluid" src="{{ asset('images/cart-empty.gif') }}" alt="">
        </div>
        <div class="thankyou-text">
            <h4><span>Oops!</span> Your cart is empty!</h4><br>
            <p>Looks like you haven't added anything to your cart yet.</p>
            
        </div>
    </div>
@endif