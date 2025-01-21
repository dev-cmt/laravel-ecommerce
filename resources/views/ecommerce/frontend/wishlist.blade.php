<x-frontend-layout :title="'Wishlist'">
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Wishlist</h3>
                        <div class="breadcrumb__list">
                            <span><a href="#">Home</a></span>
                            <span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- wishlist area start -->
    <section class="tp-cart-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-cart-list mb-45 mr-30">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2" class="tp-cart-header-product">Product</th>
                                    <th class="tp-cart-header-price">Price</th>
                                    <th class="tp-cart-header-quantity">Quantity</th>
                                    <th>Action</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $item)
                                    @php
                                        $price = round($item->product->price - ($item->product->price * $item->product->discount / 100));
                                        $quantity = 1;  // Default quantity for the wishlist item is 1
                                        $subtotal = $price * $quantity;
                                    @endphp
                                    <tr class="remove{{ $item->id }}" data-price="{{ $price }}" data-id="{{ $item->id }}">
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
                                                <input class="tp-cart-input" type="text" value="{{ $quantity }}">
                                                <button class="tp-cart-plus">+</button>
                                            </div>
                                        </td>
                                        <td class="tp-cart-add-to-cart">
                                            @php
                                                // Check if the product is already in the cart
                                                $isInCart = DB::table('carts')
                                                    ->where('product_id', $item->product_id)
                                                    ->where('user_id', Auth::id())
                                                    ->exists();
                                            @endphp
                                            <button type="button"
                                                class="add-item tp-btn tp-btn-2 tp-btn-blue {{ $isInCart ? 'bg-dark text-white' : '' }}"
                                                data-action-name="cart"
                                                data-quantity="1"
                                                data-product-id="{{ $item->product_id }}"
                                                data-product-variant-id="{{ $item->product_variant_id ?? null }}">
                                                {{ $isInCart ? 'Remove From Cart' : 'Add To Cart' }}
                                            </button>
                                        </td>
                                        
                                        
                                        <td class="tp-cart-subtotal"><span>৳ {{ $subtotal }}</span></td>
                                        <td class="tp-cart-action">
                                            <button class="tp-cart-action-btn remove-item" data-action-name="wishlist" data-id="{{ $item->id }}">✖ Remove</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tp-cart-bottom">
                        <div class="row align-items-end">
                            <div class="col-xl-6 col-md-4">
                                <div class="tp-cart-update">
                                    <a href="{{route('cart')}}" class="tp-cart-update-btn">Go To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- wishlist area end -->

    
    @push('scripts')
    <script>
        $(document).ready(function() {
            function updateSubtotal(row, price, quantity) {
                row.find('.tp-cart-subtotal span').text('৳ ' + (price * quantity));
            }

            $('.tp-cart-plus, .tp-cart-minus').click(function() {
                const row = $(this).closest('tr');
                const price = parseFloat(row.data('price'));
                let quantity = parseInt(row.find('.tp-cart-input').val());
                $(".add-item").attr('data-quantity', quantity);
                updateSubtotal(row, price, quantity);
            });
        });
    </script>
    @endpush
</x-frontend-layout>
