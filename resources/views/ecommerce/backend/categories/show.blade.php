<x-app-layout>
    <div class="container">
        <!-- Display errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Category Details</h4>
                        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-danger">Back to List</a>
                    </div>
                    <div class="card-body">
                        <!-- Display category details -->
                        <dl class="row">
                            <dt class="col-sm-3">Category Name:</dt>
                            <dd class="col-sm-9">{{ $category->category_name }}</dd>

                            <dt class="col-sm-3">Parent Category:</dt>
                            <dd class="col-sm-9">
                                @if($category->parentCategory)
                                    {{ $category->parentCategory->category_name }}
                                @else
                                    None
                                @endif
                            </dd>

                            <dt class="col-sm-3">Category Images:</dt>
                            <dd class="col-sm-9">
                                @if($category->img_path)
                                    <img src="{{ asset('public/' . $category->img_path) }}" height="150" alt="Category Image">
                                @else
                                    <img src="{{ asset('public/backend/images/product-img.png') }}" class="img-fluid" alt="Default Image">
                                @endif
                            </dd>

                            <dt class="col-sm-3">Description:</dt>
                            <dd class="col-sm-9">{{ $category->description ?? 'N/A' }}</dd>

                            <dt class="col-sm-3">Status:</dt>
                            <dd class="col-sm-9">
                                @if($category->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </dd>
                        </dl>

                        <!-- Action buttons -->
                        <div class="mt-3">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('categories.index') }}" class="btn btn-danger">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
