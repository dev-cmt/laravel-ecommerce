<x-app-layout :title="'Products List'">
    @push('style')
    
    @endpush
    @push('scripts')

    @endpush


    <div class="container">
        <h1>Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>SKU Code</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->sku_code }}</td>
                        <td>{{ $product->category->category_name }}</td>
                        <td>{{ $product->brand->brand_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->status === 'active' ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    </div>

</x-app-layout>