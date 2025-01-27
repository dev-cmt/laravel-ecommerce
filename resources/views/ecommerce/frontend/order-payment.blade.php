<x-frontend-layout :title="'Order Payment'">

    <!-- checkout area start -->
    <section class="tp-checkout-area mb-120 mt-60">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-9">
                    <form action="{{ route('order-payment.store') }}" method="POST" id="payment-form">
                        @csrf
                        <div class="profile__tab mb-10">
                            <div class="nav nav-tabs" id="profile-tab" role="tablist">
                                <!-- Payment Gateway Tabs -->
                                <ul class="nav nav-tabs" id="paymentGatewayTabs" role="tablist">
                                    @foreach ($paymentGateway as $key => $item)
                                        <li class="nav-item" role="presentation">
                                            <button type="button" id="nav-{{ $key }}-tab" 
                                                    class="nav-link text-center {{ $loop->first ? 'active' : '' }} {{ $item->is_active ? '' : 'image-filter' }}"
                                                    data-bs-toggle="tab" data-bs-target="#nav-{{ $key }}" 
                                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}" 
                                                    onclick="setActivePaymentGateway({{ $item->id }})" 
                                                    {{ $item->is_active ? '' : 'disabled' }}>
                                                <img src="{{ asset('public/' . $item->image_path) }}" width="45" alt=""/>
                                                <p class="m-0 fw-bold" style="font-size: 9px;">{{ $item->name }}</p>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- Hidden Input to Store the Selected Payment Gateway ID -->
                                <input type="hidden" name="payment_gateway_id" id="payment_gateway_id" value="{{ $paymentGateway->first()->id }}">
                                <script>
                                    function setActivePaymentGateway(paymentGatewayId) {
                                        document.getElementById('payment_gateway_id').value = paymentGatewayId;
                                    }
                                </script>                         
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
                                            <a href="#" class="tp-btn mb-10" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Pay Now</a>
                                        @elseif ($item->gateway_type === 'Manual')
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
                    
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-0">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Payment Confirm</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                        <div class="mb-3">
                                            <label for="payment-number" class="col-form-label">Payment Number: </label>
                                            <input type="number" class="form-control" name="payment_number" id="payment-number" placeholder="01X XXXX XXXX">
                                        </div>
                                        <div class="mb-3">
                                            <label for="transaction-number" class="col-form-label">Transaction ID: </label>
                                            <input type="text" class="form-control" name="transaction_number" id="transaction-number" placeholder="e.g transaction id...">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary rounded-0">Confirm Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </form>
                    
                    <script>
                        // JavaScript to check if the fields are empty before submitting the form
                        document.getElementById('payment-form').addEventListener('submit', function(e) {
                            var paymentNumber = document.getElementById('payment-number').value;
                            var transactionNumber = document.getElementById('transaction-number').value;
                    
                            if (paymentNumber.trim() === "" || transactionNumber.trim() === "") {
                                e.preventDefault(); // Prevent form submission
                    
                                // Display an alert or message to the user
                                alert("Please fill out all required fields.");
                            }
                        });
                    </script>
                    
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