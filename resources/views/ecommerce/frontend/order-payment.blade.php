<x-frontend-layout :title="'Order Payment'">

    <!-- checkout area start -->
    <section class="tp-checkout-area mb-120 mt-60">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-9">
                    <div class="profile__tab mb-10">
                        <div class="nav nav-tabs" id="profile-tab" role="tablist">
                            @foreach ($paymentGateway as $key => $item)
                                <button type="button" id="nav-{{ $key }}-tab"  class="nav-link text-center {{ $loop->first ? 'active' : '' }}" 
                                    data-bs-toggle="tab" data-bs-target="#nav-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    <img src="{{ asset('public/' . $item->image_path) }}" width="45" alt=""> <!-- style="filter: grayscale(100%)" -->
                                    <p class="m-0 fw-bold" style="font-size: 9px;">{{ $item->name }}</p>
                                </button>
                            @endforeach
                        </div>
                    </div>
                
                    <div class="profile__tab-content">
                        <div class="tab-content">
                            @foreach ($paymentGateway as $key => $item)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="nav-{{ $key }}" role="tabpanel">
                                    <h5 class="fw-bold">Please ensure the following before you proceed:</h5>
                                    @if ($item->gateway_type === 'Online')
                                        <ul class="m-3">
                                            <li>You have an activated <strong>{{ $item->name }}</strong> account.</li>
                                            <li>You can receive an <strong>OTP</strong> on your registered Mobile Number.</li>
                                            <li>You have sufficient balance for the transaction.</li>
                                        </ul>
                                        <a href="#" class="tp-btn mb-10">Pay Now</a>
                                    @else
                                        <ul class="m-3">
                                            <li>1. You may pay in cash to our courier upon receiving your parcel at the doorstep.</li>
                                            <li>2. Before agreeing to receive the parcel, check if your delivery status has been updated to <strong>'Out for Delivery'</strong>.</li>
                                            <li>3. Before receiving, confirm that the airway bill shows that the parcel is from <strong>Icon ISL</strong>.</li>
                                            <li>4. Before you make payment to the courier, confirm your order number, sender information, and tracking number on the parcel.</li>
                                        </ul>
                                        <a href="#" class="tp-btn mb-10">Confirm Order</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="col-xxl-4 col-lg-3">
                    <div class="profile__tab-content">
                        <h5 class="fw-bold mb-20">Order Summary</h5>
                        <ol class="list-decimal ps-0">
                            <li class="d-flex justify-content-between">
                                <span>Subtotal (1 item and shipping fee included)</span>
                                <span>৳ 252</span>
                            </li>
                            <hr>
                            <li class="d-flex justify-content-between">
                                <span>Cash Payment Fee</span>
                                <span>৳ 10</span>
                            </li>
                            <hr>
                            <li class="d-flex justify-content-between fw-bold">
                                <span>Total Amount</span>
                                <span>৳ 262</span>
                            </li>
                        </ol>
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
    
 
</x-frontend-layout>