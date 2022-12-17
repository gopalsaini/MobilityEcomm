<div class="right-prs">
    
    <h6 class="total-mrp mb-3" style="font-size: 18px;"><label>Items</label><span class="total-mr-rs priceDetail-base-discount" style="float: right;">{{ $totalItems ?? 0 }}</span></h6>
    
</div>

<div class="right-prs">
    <div class="total-mrp">
        
        <input type="hidden" id="amountForCoupon" value="{{ $amountForCoupon }}" /> 
    </div>
    <br>
    <h6 class="total-mrp mb-3" style="font-size: 18px;"><label>Sub Total</label><span class="total-mr-rs priceDetail-base-discount" style="float: right;"> {{ \App\Helpers\commonHelper::getPriceByCountry($totalMrp) }}</span></h6>
    <h6 class="total-mrp mb-3" style="font-size: 18px;"><label>Discount on MRP</label><span class="total-mr-rs priceDetail-base-discount" style="float: right;"><span>-</span>{{ \App\Helpers\commonHelper::getPriceByCountry($discountAmount) }}</span></h6>
    <h6 class="total-mrp mb-3" style="font-size: 18px;"><label>Coupon Discount</label><span class="total-mr-rs priceDetail-base-discount" style="float: right;"><span>-</span>{{ \App\Helpers\commonHelper::getPriceByCountry($couponAmount) }}</span></h6>
    <h6 class="total-mrp mb-3" style="font-size: 18px;"><label>Shipping Charge</label><span class="total-mr-rs" style="float: right;"><span>+</span> {{ \App\Helpers\commonHelper::getPriceByCountry($totalShipping)  }}</span></h6>
    <h6 class="final-cr-price" style="font-size: 18px;"><label>Total Amount</label><span class="final-mr-rs" style="float: right;">{{\App\Helpers\commonHelper::getPriceByCountry($finalAmount)  }}</span>
    </h6>
</div>