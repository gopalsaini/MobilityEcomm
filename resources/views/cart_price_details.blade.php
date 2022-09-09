
<div class="item-rate">
    <h5>Items </h5>
    <h5>{{ $totalItems ?? 0 }}</h5>
    <!-- <h5>{{\App\Helpers\commonHelper::getPriceByCountry($finalAmount)  }}</h5> -->
</div>
<div class="right-prs">
    <div class="total-mrp">
        
        <input type="hidden" id="amountForCoupon" value="{{ $amountForCoupon }}" /> 
    </div>
    <br>
    <h6 class="total-mrp mb-3"><label>Discount on MRP</label><span class="total-mr-rs priceDetail-base-discount" style="float: right;"><span>-</span>{{ \App\Helpers\commonHelper::getPriceByCountry($discountAmount) }}</span></h6>
    <h6 class="total-mrp mb-3"><label>Coupon Discount</label><span class="total-mr-rs priceDetail-base-discount" style="float: right;"><span>-</span>{{ \App\Helpers\commonHelper::getPriceByCountry($couponAmount) }}</span></h6>
    <h6 class="total-mrp mb-3"><label>Shipping Charge</label><span class="total-mr-rs" style="float: right;"><span>+</span> {{ \App\Helpers\commonHelper::getPriceByCountry($totalShipping)  }}</span></h6>
    <h6 class="final-cr-price"><label>Total Amount</label><span class="final-mr-rs" style="float: right;">{{\App\Helpers\commonHelper::getPriceByCountry($finalAmount)  }}</span>
    </h6>
</div>