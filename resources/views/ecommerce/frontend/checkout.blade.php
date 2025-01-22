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
            <form class="row" action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="col-lg-7">
                    <div class="tp-checkout-bill-area">
                        <h3 class="tp-checkout-bill-title">Delivery Information</h3>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="tp-checkout-input">
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Enter your full name">
                                    @error('full_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="tp-checkout-input">
                                    <label>Phone Number <span>*</span></label>
                                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" placeholder="Enter your number">
                                    @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="tp-checkout-input">
                                    <label>Building / House No / Floor / Street <span>*</span></label>
                                    <input type="text" name="building" value="{{ old('building') }}" placeholder="Please enter">
                                    @error('building') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="tp-checkout-input">
                                    <label>Colony / Suburb / Locality / Landmark</label>
                                    <input type="text" name="colony" value="{{ old('colony') }}" placeholder="Please enter">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="tp-checkout-input">
                                    <label>Region <span>*</span></label>
                                    <select name="region_name" id="region">
                                        <option value="">Choose your region</option>
                                        @foreach ($divisions as $region)
                                            <option value="{{ $region->name }}" data-id="{{ $region->id }}" {{ old('region_name') == $region->name ? 'selected' : '' }}>
                                                {{ $region->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('region_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="tp-checkout-input">
                                    <label>City <span>*</span></label>
                                    <select name="city_name" id="city" disabled>
                                        <option value="">Choose your city</option>
                                    </select>
                                    @error('city_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="tp-checkout-input">
                                    <label>Area <span>*</span></label>
                                    <select name="area_name" id="area" disabled>
                                        <option value="">Choose your area</option>
                                    </select>
                                    @error('area_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="tp-checkout-input">
                                    <label>Address <span>*</span></label>
                                    <input type="text" name="address" value="{{ old('address') }}" placeholder="House#123, Street#123, AB Road">
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="tp-checkout-input mb-0">
                                    <label>Order notes (optional)</label>
                                    <textarea name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery.">{{ old('order_notes') }}</textarea>
                                </div>
                            </div>                                

                            <div class="col-md-12 text-center">
                                <div class="tp-checkout-input mb-0">
                                    <label><em>Select a label for effective delivery <span>*</span></em></label>
                                </div>
                                <div class="d-flex justify-content-center mx-4">
                                    <!-- HOME Option -->
                                    <div class="delivery-option" data-for="delivery_home">
                                        <input type="radio" id="delivery_home" name="delivery_label" value="Home" hidden {{ old('delivery_label') == 'Home' ? 'checked' : '' }}>
                                        <label for="delivery_home"><i class="fa fa-home" aria-hidden="true"></i> HOME</label>
                                    </div>
                                    
                                    <!-- OFFICE Option -->
                                    <div class="delivery-option" data-for="delivery_office">
                                        <input type="radio" id="delivery_office" name="delivery_label" value="Office" hidden {{ old('delivery_label') == 'Office' ? 'checked' : '' }}>
                                        <label for="delivery_office"><i class="fa fa-briefcase" aria-hidden="true"></i> OFFICE</label>
                                    </div>
                                    <style>
                                        .delivery-option {
                                            border-radius: 5px;
                                            border: 2px solid var(--tp-theme-primary);
                                            background: var(--tp-theme-primary);
                                            color: var(--tp-common-white);;
                                            padding: 5px 20px;
                                            margin: 10px;
                                            font-weight: 600;
                                            cursor: pointer;
                                            text-align: center;
                                        }
                                    
                                        .delivery-option.active {
                                            color: #00ffb8;
                                            border: 2px solid #00ffb8;
                                        }
                                    </style>
                                    
                                    <script>
                                        document.querySelectorAll('.delivery-option').forEach(opt => {
                                            opt.addEventListener('click', function () {
                                                document.querySelectorAll('.delivery-option').forEach(o => o.classList.remove('active'));
                                                this.classList.add('active');
                                                document.getElementById(this.dataset.for).checked = true;
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
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
                                    <input type="hidden" name="product_id[]" value="{{ $item['product_id'] }}">
                                    <input type="hidden" name="product_variant_id[]" value="{{ $item['product_variant_id'] ?? '' }}">
                                    <input type="hidden" name="product_name[]" value="{{ $item['name'] }}">
                                    <input type="hidden" name="price[]" value="{{ $item['price'] }}">
                                    <input type="hidden" name="quantity[]" value="{{ $item['qty'] }}">
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
                        <div class="tp-checkout-agree">
                            <div class="tp-checkout-option">
                                <input id="read_all" type="checkbox">
                                <label for="read_all">I have read and agree to the website's Terms and Conditions.</label>
                            </div>
                        </div>
                        <div class="tp-checkout-btn-wrapper">
                            <button type="submit" class="tp-checkout-btn w-100">Place Order</button>
                        </div>

                    </div>
                </div>
            </form>
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
            var region_name = $(this).val();
            var region_id = $('#region option:selected').data('id');
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
                                option += "<option value='" + district.name + " - " + upazila.name + "' data-id='" + upazila.id + "'>" + district.name + " - " + upazila.name + "</option>";
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
            var city_name = $(this).val();
            var city_id = $('#city option:selected').data('id');
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
                                option += "<option value='" + area.name + "'>" + area.name + "</option>";
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
