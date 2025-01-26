<x-frontend-layout :title="'Cart'">
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Shopping Cart</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{route('home')}}">Home</a></span>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- cart area start -->
    <section class="tp-cart-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="tp-cart-list mb-25 mr-30">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2" class="tp-cart-header-product">Product</th>
                                    <th class="tp-cart-header-price">Price</th>
                                    <th class="tp-cart-header-quantity">Quantity</th>
                                    <th class="tp-cart-header-subtotal">Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $item)
                                    @php
                                        $price = round($item->product->price - ($item->product->price * $item->product->discount / 100));
                                    @endphp
                                    <tr class="remove{{ $item->id }}" data-price="{{ $price }}">
                                        <td class="tp-cart-img">
                                            <a href="product-details.html">
                                                <img src="{{asset('public/frontend')}}/img/product/cart/product-cart-2.jpg" alt="">
                                            </a>
                                        </td>
                                        <td class="tp-cart-title">
                                            <a href="product-details.html">{{$item->product->product_name}}</a>
                                        </td>
                                        <td class="tp-cart-price"><span>৳ {{ $price }}</span></td>
                                        <td class="tp-cart-quantity">
                                            <div class="tp-product-quantity mt-10 mb-10">
                                                <button class="tp-cart-minus">-</button>
                                                <input class="tp-cart-input" type="text" value="1">
                                                <button class="tp-cart-plus">+</button>
                                            </div>
                                        </td>
                                        <td class="tp-cart-subtotal"><span>৳ {{ $price }}</span></td>
                                        <td class="tp-cart-action">
                                            <button class="tp-cart-action-btn remove-item" data-action-name="cart" data-id="{{ $item->id }}">✖ Remove</button>
                                            <input type="hidden" class="product-id" value="{{$item->product_id}}">
                                            <input type="hidden" class="product-variant-id" value="{{$item->product_variant_id}}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="tp-cart-checkout-wrapper">
                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="tp-cart-checkout-top-title">Subtotal</span>
                            <span class="tp-cart-checkout-top-price" id="cart-subtotal">৳ 0</span>
                        </div>
                        <div class="tp-cart-checkout-shipping">
                            <h4 class="tp-cart-checkout-shipping-title mt-3">Shipping</h4>
                            <div class="tp-cart-checkout-shipping-option-wrapper">
                                @foreach ($shipping as $item)
                                <div class="tp-cart-checkout-shipping-option">
                                    <input id="shipping{{$item->id}}" type="radio" name="shipping" value="{{$item->id}}" {{ count($shipping) == 1 || $item->id == 1 ? 'checked' : '' }}>
                                    <label for="shipping{{$item->id}}">{{$item->method_name}} <strong>{{$item->description}}</strong>: <span>৳{{$item->cost}}</span></label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tp-cart-coupon my-2">
                            <form action="#" id="coupon-form">
                                <div class="tp-cart-coupon-input d-flex align-items-center">
                                    <input type="text" placeholder="Enter Coupon Code" id="coupon-code">
                                    <button type="submit">Apply</button>
                                </div>
                            </form>
                        </div>

                        <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                            <span>Total</span>
                            <span id="cart-total">৳ 0</span>
                        </div>

                        <div class="tp-cart-checkout-proceed">
                            <a href="{{route('checkout')}}" id="proceed-btn" class="tp-cart-checkout-btn w-100" disabled>Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart area end -->

    @push('scripts')
    <script>
        $(document).ready(function () {
            let discountAmount = 0;

            function updateTotals() {
                let subtotal = 0;
                $(".tp-cart-subtotal span").each(function () {
                    subtotal += parseFloat($(this).text().replace("৳", "")) || 0;
                });

                $("#cart-subtotal").text(`৳ ${subtotal}`);

                // Get selected shipping method cost (default to 0 if none selected)
                let shippingCost = 0;
                $("input[name='shipping']:checked").each(function () {
                    shippingCost = parseFloat($(this).next("label").find("span").text().replace("৳", "")) || 0;
                });

                let total = subtotal + shippingCost - discountAmount; // Subtract discount from total

                // Update the total
                $("#cart-total").text(`৳ ${total}`);
            }

            // Cart functionality
            $(".tp-cart-quantity").each(function () {
                let qtyWrapper = $(this);
                let qtyInput = qtyWrapper.find(".tp-cart-input");
                let row = qtyWrapper.closest("tr");
                let price = parseFloat(row.data("price"));

                function updateSubtotal() {
                    let qty = parseInt(qtyInput.val()) || 1;
                    let subtotal = price * qty;
                    row.find(".tp-cart-subtotal span").text(`৳ ${subtotal}`);
                    updateTotals();
                }

                qtyWrapper.find(".tp-cart-minus, .tp-cart-plus").click(function () {
                    updateSubtotal();
                });

                qtyInput.on("input", function () {
                    let qty = parseInt(qtyInput.val()) || 1;
                    qtyInput.val(qty); // Ensure it stays as an integer
                    updateSubtotal();
                });
            });

            $(".remove-item").click(function () {
                updateTotals();
            });

            $("input[name='shipping']").change(updateTotals);

            // Coupon code handling via AJAX
            $("#coupon-form").submit(function (e) {
                e.preventDefault();
                let couponCode = $("#coupon-code").val();
                let subtotal = parseFloat($("#cart-subtotal").text().replace("৳", "")) || 0;

                $.ajax({
                    url: "{{ route('cart.applyCoupon') }}",  // AJAX call to apply the coupon
                    type: "POST",
                    data: {
                        coupon_code: couponCode,
                        cart_subtotal: subtotal,
                        _token: "{{ csrf_token() }}",  // CSRF token for security
                    },
                    success: function (response) {
                        if (response.success) {
                            let newSubtotal = response.new_subtotal;
                            discountAmount = response.discount; // Update the discount amount
                            $("#cart-subtotal").text(`৳ ${newSubtotal}`);
                            updateTotals();  // Recalculate the totals after applying the coupon
                            alert("Coupon applied! Discount: ৳" + discountAmount);
                        } else {
                            alert("Invalid Coupon Code");
                        }
                    },
                    error: function () {
                        alert("An error occurred while applying the coupon.");
                    }
                });
            });

            $("#proceed-btn").click(function (e) {
                e.preventDefault();
                    let cartData = $(".tp-cart-list tbody tr").map(function () {
                    let product_id = $(this).find(".product-id").val();
                    let product_variant_id = $(this).find(".product-variant-id").val();
                    let name = $(this).find(".tp-cart-title a").text();
                    let price = parseFloat($(this).data("price"));
                    let qty = parseInt($(this).find(".tp-cart-input").val()) || 1;
                    let subtotal = price * qty;

                    return { product_id, product_variant_id, name, price, qty, subtotal };
                }).get();

                let shippingId = $("input[name='shipping']:checked").val();
                if (!shippingId) {
                    alert("Please select a shipping method.");
                    return;
                }

                let subtotal = $("#cart-subtotal").text().replace("৳", "");
                let total = $("#cart-total").text().replace("৳", "");

                // Proceed button based on subtotal
                if (subtotal == 0) {
                    alert("Please select at least one item to proceed!");
                } else {
                    window.location.href = `{{ route('checkout', []) }}?cart=${btoa(JSON.stringify(cartData))}&shipping=${shippingId}&subtotal=${subtotal}&total=${total}`;
                }
            });

            updateTotals();
        });
    </script>
    @endpush
</x-frontend-layout>
