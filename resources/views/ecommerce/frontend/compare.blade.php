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
                                    <td>
                                        <div class="tp-compare-remove">
                                            <button><i class="fal fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Product</th>
                                    @foreach ($data as $item)
                                    <td>
                                        <div class="tp-compare-thumb">
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
                                    <td>
                                        <div class="tp-compare-add-to-cart">
                                            <button type="submit" class="tp-btn">Add to Cart</button>
                                        </div>
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
</x-frontend-layout>