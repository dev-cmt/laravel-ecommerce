<x-app-layout>
    @push('style')
        <!-- Custom Styles -->
        <style>
            .product-image {
                max-width: 100%;
                height: auto;
            }

            .product-gallery img {
                width: 100px;
                height: 100px;
                object-fit: cover;
                margin: 5px;
                border-radius: 10px;
            }
        </style>
    @endpush

    <div class="container">
        <!-- Product Details -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">{{ $product->product_name }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Product Image -->
                    <div class="col-md-4">
                        <img src="{{ asset('public/images/product/'.$product->img_path) }}" alt="{{ $product->product_name }}" class="product-image">
                    </div>
                    <!-- Product Description -->
                    <div class="col-md-8">
                        <h6>Description</h6>
                        <p>{!! $product->description !!}</p>
                        <hr>
                        <h6>Price: ${{ number_format($product->price, 2) }}</h6>
                        @if($product->discount)
                            <p>Discount: {{ $product->discount }}%</p>
                        @endif
                        <hr>
                        <h6>Manufacturer: {{ $product->manufacturer_name }}</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Gallery Images -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Product Gallery</h5>
            </div>
            <div class="card-body product-gallery">
                @foreach($product->galleryImages as $image)
                    <img src="{{ asset('public/images/product/gallery/'.$image->path) }}" alt="Gallery Image">
                @endforeach
            </div>
        </div>

        <!-- Product Variants -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Variants</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->variants as $variant)
                            <tr>
                                <td><img src="{{ asset('public/images/product/variants/'.$variant->img_path) }}" alt="Variant Image" class="product-image"></td>
                                <td>{{ $variant->color }}</td>
                                <td>{{ $variant->size }}</td>
                                <td>${{ number_format($variant->price, 2) }}</td>
                                <td>{{ $variant->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Product Specifications -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Specifications</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Specification Name</th>
                            <th>Specification Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->specifications as $specification)
                            <tr>
                                <td>{{ $specification->specification_name }}</td>
                                <td>{{ $specification->specification_value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Product Details -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Details</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Detail Name</th>
                            <th>Detail Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->details as $detail)
                            <tr>
                                <td>{{ $detail->detail_name }}</td>
                                <td>{{ $detail->detail_value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
