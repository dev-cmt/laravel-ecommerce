<x-app-layout :title="'Products List'">
    @push('style')

    @endpush
    @push('scripts')
        <!-- Display Toastr notifications -->
        <script>
            @if(session('success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "timeOut": "5000",
                    "extendedTimeOut": "1000"
                };
                toastr.success("{{ session('success') }}");
            @endif

            @if($errors->any())
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "timeOut": "5000",
                    "extendedTimeOut": "1000"
                };
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        </script>
    @endpush

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Products</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('products.create') }}" class="btn btn-sm btn-success edit-item-btn">Add New Category</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap table-striped-columns mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">SKU Code</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="product-list">
                                @foreach ($products as $product)
                                    <tr data-id="{{ $product->id }}">
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->sku_code }}</td>
                                        <td>{{ $product->category->category_name }}</td>
                                        <td>{{ $product->brand->brand_name ?? 'No Brand'}}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->status === 'active' ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary edit-category">Edit</a>
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info show-category">Show</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger edit-item-btn" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>