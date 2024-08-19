<x-app-layout :title="'Products List'">
    @push('style')
    
    @endpush
    @push('scripts')

    @endpush


    <div class="container">
        <h1>{{ $product->product_name }}</h1>
        
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $product->img_path ? asset('storage/' . $product->img_path) : 'default-image.jpg' }}" alt="{{ $product->product_name }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>Product Details</h2>
                <p><strong>SKU:</strong> {{ $product->sku_code }}</p>
                <p><strong>Category:</strong> {{ $product->category->name }}</p>
                <p><strong>Brand:</strong> {{ $product->brand->name }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Price:</strong> {{ $product->price }}</p>
                <p><strong>Status:</strong> {{ ucfirst($product->status) }}</p>
            </div>
        </div>
    
        <hr>
    
        <h2>Variants</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product->variants as $variant)
                <tr>
                    <td>{{ $variant->color }}</td>
                    <td>{{ $variant->size }}</td>
                    <td>{{ $variant->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
        <hr>
    
        <h2>Images</h2>
        <div class="row">
            @foreach($product->images as $image)
            <div class="col-md-3">
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" class="img-fluid">
            </div>
            @endforeach
        </div>
    
        <hr>
    
        <h2>Details</h2>
        <ul>
            @foreach($product->details as $detail)
            <li><strong>{{ $detail->detail_name }}:</strong> {{ $detail->detail_value }}</li>
            @endforeach
        </ul>
    
        <hr>
    
        <h2>Specifications</h2>
        <ul>
            @foreach($product->specifications as $specification)
            <li><strong>{{ $specification->specification_name }}:</strong> {{ $specification->specification_value }}</li>
            @endforeach
        </ul>
    
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
    </div>

</x-app-layout>