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

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Shipping Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('default-shipping-address') }}" method="POST">
                        @csrf
                        @php
                            $shippingAddresses = DB::table('shipping_addresses')->where('user_id', Auth::user()->id)->get();
                        @endphp
                        @foreach ($shippingAddresses as $address)
                            <div class="p-3 m-1" style="border: 1px solid #3333">
                                <span>{{ $address->full_name }}</span> 
                                <span>{{ $address->phone_number }}</span>
                                <p>
                                    <span class="badge bg-secondary">{{ $address->delivery_label }}</span>  
                                    <span>{{ $address->area_name }}, {{ $address->city_name }}, {{ $address->region_name }}</span>
                                </p>
                                <!-- Radio button to select this address as default -->
                                <input type="radio" name="shipping_address_id" value="{{ $address->id }}" 
                                    {{ Auth::user()->shipping_address_id == $address->id ? 'checked' : '' }} /> Set as Default
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Submit button inside the form -->
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form> <!-- Closing the form tag -->
            </div>
        </div>
        
    </div>
    

    <!-- checkout area start -->
    <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="wrapper">
                        <div class="d-flex justify-content-between px-4" style="background: #dedede">
                            <h6 class="mt-2">Shipping & Billing</h6>
                            <button type="button" class="fs-6 text-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New Address</button>
                        </div>
                        @php
                            $row = DB::table('shipping_addresses')->find(Auth::user()->shipping_address_id);
                        @endphp
                        <div class="tp-checkout-bill-area px-4 p-2">
                            <div>
                                <span>{{$row->full_name}}</span> <span>{{$row->phone_number}}</span>
                                <p>
                                    <span class="badge bg-secondary">{{$row->delivery_label}}</span>  
                                    <span>{{$row->area_name}}, {{$row->city_name}}, {{$row->region_name}}
                                </p>
                            </div>
                        </div>

                        <!---->
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-warning btn-sm rounded-0" href="#collapseExample" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>

                        <div class="collapse" id="collapseExample">
                            <form action="{{ route('default-shipping-address') }}" method="POST">
                                @csrf
                                @php
                                    $shippingAddresses = DB::table('shipping_addresses')->where('user_id', Auth::user()->id)->get();
                                @endphp
                                @foreach ($shippingAddresses as $address)
                                    <div class="p-3 m-1" style="border: 1px solid #3333">
                                        <span>{{ $address->full_name }}</span> 
                                        <span>{{ $address->phone_number }}</span>
                                        <p>
                                            <span class="badge bg-secondary">{{ $address->delivery_label }}</span>  
                                            <span>{{ $address->area_name }}, {{ $address->city_name }}, {{ $address->region_name }}</span>
                                        </p>
                                        <!-- Radio button to select this address as default -->
                                        <input type="radio" name="shipping_address_id" value="{{ $address->id }}" 
                                            {{ Auth::user()->shipping_address_id == $address->id ? 'checked' : '' }} /> Set as Default
                                    </div>
                                @endforeach
                                <button type="submit" class="tp-btn">Update</button>
                            </form>
                        </div>

                    </div>
                </div>
                    <div class="col-lg-7">
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        @if(count($shippingAddresses) == 0)
                            <div class="tp-checkout-bill-area">
                                <h3 class="tp-checkout-bill-title">Delivery Information</h3>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="tp-checkout-input">
                                            <label>Full Name <span>*</span></label>
                                            <input type="text" name="full_name" value="{{ old('full_name', Auth::user()->name ?? '') }}" placeholder="Enter your full name">
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
                                            <select name="city_name" id="city" {{ old('city_name') ? '' : 'disabled' }}>
                                                <option value="">Choose your city</option>
                                            </select>
                                            @error('city_name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        
                                        <div class="tp-checkout-input">
                                            <label>Area <span>*</span></label>
                                            <select name="area_name" id="area" {{ old('area_name') ? '' : 'disabled' }}>
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
                                            <div class="delivery-option {{ old('delivery_label') == 'Home' ? 'active' : '' }}" data-for="delivery_home">
                                                <input type="radio" id="delivery_home" name="delivery_label" value="Home" hidden {{ old('delivery_label') == 'Home' ? 'checked' : '' }}>
                                                <label for="delivery_home"><i class="fa fa-home" aria-hidden="true"></i> HOME</label>
                                            </div>

                                            <!-- OFFICE Option -->
                                            <div class="delivery-option {{ old('delivery_label') == 'Office' ? 'active' : '' }}" data-for="delivery_office">
                                                <input type="radio" id="delivery_office" name="delivery_label" value="Office" hidden {{ old('delivery_label') == 'Office' ? 'checked' : '' }}>
                                                <label for="delivery_office"><i class="fa fa-briefcase" aria-hidden="true"></i> OFFICE</label>
                                            </div>
                                            <style>
                                                .delivery-option {
                                                    border-radius: 5px;
                                                    border: 2px solid var(--tp-theme-primary);
                                                    color: var(--tp-theme-primary);
                                                    padding: 5px 20px;
                                                    margin: 10px;
                                                    font-weight: 600;
                                                    cursor: pointer;
                                                    text-align: center;
                                                }
                                                .delivery-option.active {
                                                    /* color: #00ffb8; */
                                                    border: 2px solid #00ffb8;
                                                    background: var(--tp-theme-primary);
                                                    color: var(--tp-common-white);;
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
                                        @error('delivery_label') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        @endif

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
                                        <!-- Adjust hidden input names for structured array submission -->
                                        <input type="hidden" name="cart_items[{{ $loop->index }}][product_id]" value="{{ $item['product_id'] }}">
                                        <input type="hidden" name="cart_items[{{ $loop->index }}][product_variant_id]" value="{{ $item['product_variant_id'] ?? '' }}">
                                        <input type="hidden" name="cart_items[{{ $loop->index }}][product_name]" value="{{ $item['name'] }}">
                                        <input type="hidden" name="cart_items[{{ $loop->index }}][price]" value="{{ $item['price'] }}">
                                        <input type="hidden" name="cart_items[{{ $loop->index }}][qty]" value="{{ $item['qty'] }}">
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
        $(document).ready(function () {
            var oldRegion = "{{ old('region_name') }}";
            var oldCity = "{{ old('city_name') }}";
            var oldArea = "{{ old('area_name') }}";

            // If a region is selected (from old()), load its cities
            if (oldRegion) {
                var regionId = $('#region option:selected').data('id');
                fetchCities(regionId, oldCity);
            }

            // Region change event
            $('#region').change(function () {
                var regionId = $(this).find(':selected').data('id');
                fetchCities(regionId, null);
            });

            // City change event
            $('#city').change(function () {
                var cityId = $(this).find(':selected').data('id');
                fetchAreas(cityId, null);
            });

            function fetchCities(regionId, selectedCity) {
                $.ajax({
                    url: "{{ route('get.districts') }}",
                    method: "GET",
                    data: { division_id: regionId },
                    dataType: "json",
                    success: function (response) {
                        var options = '<option value="">Choose your city</option>';
                        if (response.length) {
                            response.forEach(function (district) {
                                district.upazila.forEach(function (upazila) {
                                    var selected = selectedCity === (district.name + " - " + upazila.name) ? "selected" : "";
                                    options += `<option value="${district.name} - ${upazila.name}" data-id="${upazila.id}" ${selected}>
                                        ${district.name} - ${upazila.name}
                                    </option>`;
                                });
                            });
                            $('#city').html(options).prop('disabled', false).niceSelect('update');

                            // If old city is set, call fetchAreas for oldCity
                            if (oldCity) {
                                var selectedCityId = $('#city').find(':selected').data('id');
                                fetchAreas(selectedCityId, oldArea);
                            }

                        } else {
                            options = '<option selected disabled>No cities available</option>';
                            $('#city').html(options).prop('disabled', true).niceSelect('update');
                        }
                    },
                    error: function () {
                        alert("Error fetching cities.");
                    }
                });
            }

            function fetchAreas(cityId, selectedArea) {
                $.ajax({
                    url: "{{ route('get.areas') }}",
                    method: "GET",
                    data: { upazila_id: cityId },
                    dataType: "json",
                    success: function (response) {
                        var options = '<option value="">Choose your area</option>';
                        if (response.length) {
                            response.forEach(function (area) {
                                var selected = selectedArea === area.name ? "selected" : "";
                                options += `<option value="${area.name}" ${selected}>${area.name}</option>`;
                            });
                            
                            $('#area').html(options).prop('disabled', false).niceSelect('update');
                        } else {
                            options = '<option selected disabled>No areas available</option>';
                            $('#area').html(options).prop('disabled', true).niceSelect('update');
                        }
                    },
                    error: function () {
                        alert("Error fetching areas.");
                    }
                });
            }
        });
    </script>
    @endpush
</x-frontend-layout>
