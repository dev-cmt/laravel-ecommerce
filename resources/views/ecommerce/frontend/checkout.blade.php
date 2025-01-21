<x-frontend-layout :titles="'Checkout'">
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Checkout</h3>
                        <div class="breadcrumb__list">
                            <span><a href="#">Home</a></span>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- checkout area start -->
    <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="tp-checkout-bill-area">
                        <h3 class="tp-checkout-bill-title">Delivery Information</h3>

                        <div class="tp-checkout-bill-form">
                            <form action="#">
                                <div class="tp-checkout-bill-inner">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="tp-checkout-input">
                                                <label>Full Name <span>*</span></label>
                                                <input type="text" placeholder="Enter your first and last name">
                                            </div>
                                            <div class="tp-checkout-input">
                                                <label>Phone Number <span>*</span></label>
                                                <input type="text" placeholder="Please enter your phone number">
                                            </div>
                                            <div class="tp-checkout-input">
                                                <label>Building / House No / Floor / Street <span>*</span></label>
                                                <input type="text" placeholder="Please enter">
                                            </div>
                                            <div class="tp-checkout-input">
                                                <label>Colony / Suburb / Locality / Landmark <span>*</span></label>
                                                <input type="text" placeholder="Please enter">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="tp-checkout-input">
                                                <label>Region <span>*</span></label>
                                                <select name="region_id" id="region">
                                                    <option value="">Please choose your region</option>
                                                    @foreach ($divisions as $region)
                                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="tp-checkout-input">
                                                <label>City <span>*</span></label>
                                                <select name="city_id" id="city" disabled>
                                                    <option value="">Please choose your city</option>
                                                </select>
                                            </div>
                                            <div class="tp-checkout-input">
                                                <label>Area <span>*</span></label>
                                                <select name="area_id" id="area" disabled>
                                                    <option value="">Please choose your area</option>
                                                </select>
                                            </div>
                                            <div class="tp-checkout-input">
                                                <label>Address <span>*</span></label>
                                                <input type="text" name="address" placeholder="For Example: House# 123, Street# 123, ABC Road">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="tp-checkout-input">
                                                <label>Order notes (optional)</label>
                                                <textarea placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <!-- checkout place order -->
                    <div class="tp-checkout-place white-bg">
                        <h3 class="tp-checkout-place-title">Your Order</h3>

                        <div class="tp-order-info-list">
                            <ul>
                                <!-- header -->
                                <li class="tp-order-info-list-header">
                                    <h4>Product</h4>
                                    <h4>Amount</h4>
                                </li>

                                <!-- item list -->
                                @foreach ($cartItems as $item)
                                <li class="tp-order-info-list-desc">
                                    <p>{{ $item['name'] }} <span> x {{ $item['qty'] }}</span></p>
                                    <span>৳ {{ number_format($item['price'] * $item['qty'], 2) }}</span>
                                </li>
                                @endforeach

                                <!-- subtotal -->
                                <li class="tp-order-info-list-subtotal">
                                    <span>Subtotal</span>
                                    <span>৳ {{ number_format($subtotal, 2) }}</span>
                                </li>

                                <!-- shipping -->
                                @if ($shippingMethod)
                                <li class="tp-order-info-list-shipping">
                                    {{ $shippingMethod->method_name }}: <span>৳ {{ number_format($shippingMethod->cost, 2) }}</span>
                                </li>
                                @endif

                                <!-- total -->
                                <li class="tp-order-info-list-total">
                                    <span>Total</span>
                                    <span id="order-total">৳ {{ number_format($total, 2) }}</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="tp-checkout-payment">
                            <div class="tp-checkout-payment-item">
                                <input type="radio" id="back_transfer" name="payment">
                                <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Direct Bank Transfer</label>
                                <div class="tp-checkout-payment-desc direct-bank-transfer">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the
                                        payment reference. Your order will not be shipped until the funds have cleared in
                                        our account.</p>
                                </div>
                            </div>
                            <div class="tp-checkout-payment-item">
                                <input type="radio" id="cheque_payment" name="payment">
                                <label for="cheque_payment">Cheque Payment</label>
                                <div class="tp-checkout-payment-desc cheque-payment">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the
                                        payment reference. Your order will not be shipped until the funds have cleared in
                                        our account.</p>
                                </div>
                            </div>
                            <div class="tp-checkout-payment-item">
                                <input type="radio" id="cod" name="payment">
                                <label for="cod">Cash on Delivery</label>
                                <div class="tp-checkout-payment-desc cash-on-delivery">
                                    <p>Pay for your order when it is delivered to your address.</p>
                                </div>
                            </div>
                            <div class="tp-checkout-payment-item paypal-payment">
                                <input type="radio" id="paypal" name="payment">
                                <label for="paypal">PayPal <img src="{{asset('public/frontend')}}/img/icon/payment-option.png" alt=""> <a
                                        href="#">What is PayPal?</a></label>
                            </div>
                        </div>
                        <div class="tp-checkout-agree">
                            <div class="tp-checkout-option">
                                <input id="read_all" type="checkbox">
                                <label for="read_all">I have read and agree to the website's Terms and Conditions.</label>
                            </div>
                        </div>
                        <div class="tp-checkout-btn-wrapper">
                            <a href="#" class="tp-checkout-btn w-100">Place Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .tp-checkout-input .nice-select.open .list{
            max-height: 200px;
            overflow-y: auto;
        }
        .tp-checkout-input .disabled {
            background-color: #f2f2f2 !important;
        }
    </style>
    @push('scripts')
    <script type="text/javascript">
        $('#region').change(function() {
            var region_id = $(this).val();
            var option = '';

            $.ajax({
                url: "{{ route('get.districts') }}",
                method: "GET",
                data: { 'division_id': region_id },
                dataType: 'json',
                success: function(response) {
                    if (response.length) {
                        option = "<option selected disabled>Please choose your city</option>"; // Default text
                        
                        $.each(response, function(index, district) {
                            $.each(district.upazila, function(index, upazila) {
                                // Concatenate district and upazila names as option text
                                option += "<option value='" + upazila.id + "'>" + district.name + " - " + upazila.name + "</option>";
                            });
                        });

                        $('#city').html(option); 
                        $('#city').prop('disabled', false);
                        $('#city').niceSelect('update');
                    } else {
                        // If no data is returned, show no cities message
                        option = "<option disabled>No cities available</option>";
                        $('#city').html(option);  // Update the dropdown
                        
                        // Reinitialize nice-select
                        $('#city').niceSelect('update');  // Update the nice-select plugin to handle changes
                    }
                },
                error: function() {
                    alert("Error fetching cities.");
                    option = "<option disabled>Error loading cities</option>";
                    $('#city').html(option);  // Show error message if AJAX fails
                    $('#city').niceSelect('update');  // Reinitialize
                }
            });
        });

        // City (District) change event to fetch areas (Unions)
        $('#city').change(function() {
            var city_id = $(this).val();
            var option = '';

            $.ajax({
                    url: "{{ route('get.areas') }}",  // Adjust URL for getting areas
                    method: "GET",
                    data: { 'upazila_id': city_id },
                    dataType: 'json',
                    success: function(response) {
                        if (response.length) {
                            option = "<option selected disabled>Please choose your city</option>";
                            $.each(response, function(index, area) {
                                option += "<option value='" + area.id + "'>" + area.name + "</option>";
                            });
                            $('#area').html(option);  // Update the areas dropdown
                            $('#area').prop('disabled', false);
                            $('#area').niceSelect('update');  // Reinitialize
                        } else {
                            option = "<option disabled>No areas available</option>";
                            $('#area').html(option);  // Show message if no areas
                            $('#area').niceSelect('update');  // Reinitialize
                        }
                    },
                    error: function() {
                        alert("Error fetching areas.");
                        option = "<option disabled>Error loading areas</option>";
                        $('#area').html(option);  // Show error message if AJAX fails
                        $('#area').niceSelect('update');  // Reinitialize
                    }
                });
        });

    </script>
    @endpush
</x-frontend-layout>
