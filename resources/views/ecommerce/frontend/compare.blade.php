<x-frontend-layout :title="'Compare'">
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Compare</h3>
                        <div class="breadcrumb__list">
                            <span><a href="#">Home</a></span>
                            <span>Compare</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->


    <!-- compare area start -->
    <section class="tp-compare-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-compare-table table-responsive text-center">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Remove</th>
                                    @foreach ($data as $item)
                                    <td class="tp-compare-remove">
                                        <button class="remove-item" data-action-name="compare" data-id="{{ $item->id }}"><i class="fal fa-trash-alt"></i></button>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Product</th>
                                    @foreach ($data as $item)
                                    <td>
                                        <div class="tp-compare-thumb m-auto">
                                            <img src="{{asset('public/frontend')}}/img/product/product-1.jpg" alt="">
                                            <h4 class="tp-compare-product-title">
                                                <a href="product-details.html">{{$item->product->product_name}}</a>
                                            </h4>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    @foreach ($data as $item)
                                    <td>
                                        <div class="tp-compare-price">
                                            <span>{{ round($item->product->price - ($item->product->price * $item->product->discount / 100)) }} ৳</span>
                                            <span class="old-price">{{$item->product->price}}</span>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Add to cart</th>
                                    @foreach ($data as $item)
                                    <td class="tp-compare-add-to-cart">
                                        @php
                                            // Check if the product is already in the cart
                                            $isInCart = DB::table('carts')
                                                ->where('product_id', $item->product_id)
                                                ->where('user_id', Auth::id())
                                                ->exists();
                                        @endphp
                                        {{-- <button type="submit" class="tp-btn">Add to Cart</button> --}}
                                      
                                        <button type="button"
                                            class="add-item tp-btn {{ $isInCart ? 'bg-dark text-white' : '' }}"
                                            data-action-name="cart"
                                            data-quantity="1"
                                            data-product-id="{{ $item->product_id }}"
                                            data-product-variant-id="{{ $item->product_variant_id ?? null }}">
                                            {{ $isInCart ? 'Remove From Cart' : 'Add To Cart' }}
                                        </button>
                                        
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Rating</th>
                                    @foreach ($data as $item)
                                    <td>
                                        <div class="tp-compare-rating">
                                            @php
                                                $averageRating = $item->product->reviews->avg('rating');
                                            @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span><i class="fas fa-star{{ $i <= $averageRating ? '' : '-o' }}"></i></span>
                                            @endfor
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    @foreach ($data as $item)
                                    <td>
                                        <div class="tp-compare-desc">
                                            <p>{!! $item->product->description !!}</p>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- compare area end -->

    @push('scripts')
    <script>
        document.addEventListener('click', e => {
            if (e.target.closest('.remove-item')) {
                e.preventDefault();
                location.reload();
            }
        });
    </script>
    @endpush
</x-frontend-layout>