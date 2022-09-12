



@if(!empty($result))

    <div class="minicart__product">
    @php $total = 0;  @endphp
    @foreach($result as $raw)
        @php
            $productResult=\App\Models\Variantproduct::find($raw['product_id']);
            
        @endphp
        <div class="minicart__product--items d-flex">
            <div class="minicart__thumbnail">
                <a href="#"><img src="{{ $raw['image'] }}" alt="prduct-img"></a>
            </div>
            <div class="minicart__text">
                <h4 class="minicart__subtitle"><a href="#">{{ ucfirst($raw['product_name'] )}}</a></h4>
                <span class="color__variant"><b>Quantity:</b> {{$raw['qty']}}</span>
                <div class="minicart__price">
                    
                    @if($raw['discount_amount']>0)
                        <span class="current__price">{{ \App\Helpers\commonHelper::getPriceByCountry($raw['offer_price'])  }}</span>

                        @php $total+= $raw['offer_price']; @endphp
                        
                    @else
                        <span class="current__price">{{ \App\Helpers\commonHelper::getPriceByCountry($raw['offer_price'])  }}</span>

                        <span class="old__price">{{ \App\Helpers\commonHelper::getPriceByCountry($raw['sale_price'])  }}</span>
                        @php $total+= $raw['sale_price'];  
                        
                        @endphp
                    @endif
                </div>
                <div class="minicart__text--footer d-flex align-items-center">
                    
                    @php $id = $raw['id'];@endphp
                    <button class="minicart__product--remove" onclick="deleteCartData('{{$id}}')"  aria-label="minicart remove btn">
                        <div class="remove-product " style="display: flex;"><i class="icon-close iconClodeLoder{{$id}}"></i> <pre class="spinner-border spinner-border-sm Deleteloader{{$id}}" style="color:#296769;font-size: 100%;position:relative;top:6%;display:none"></pre>&nbsp;&nbsp;Remove </div>
                    </button>
                </div>
            </div>
        </div>

        @endforeach
        
    </div>
    <div class="minicart__amount">
        <div class="minicart__amount_list d-flex justify-content-between">
            <span>Sub Total:</span>
            <span><b>{{ \App\Helpers\commonHelper::getPriceByCountry($total)  }}</b></span>
        </div>
    </div><br>
    <div class="minicart__button d-flex justify-content-center">
        <a class="primary__btn minicart__button--link" href="{{url('cart')}}">View cart</a>
        <a class="primary__btn minicart__button--link" href="{{url('checkout')}}">Checkout</a>
    </div>

@else
    <div class="minicart__product">
        <div class="thankyou-card " style="text-align: center;margin: 50px;">
            <div class="icon-box">
                <img class="img-fluid" src="{{ asset('images/cart-empty.gif') }}" alt="">
            </div>
            <div class="thankyou-text">
                <h4><span>Oops!</span> Your cart is empty!</h4><br>
                <p>Looks like you haven't added anything to your cart yet.</p>
                
            </div>
        </div>
    </div>
@endif