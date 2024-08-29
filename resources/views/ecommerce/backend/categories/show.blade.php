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
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Category Details</h4>
                        <div class="flex-shrink-0">
                            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-danger">Back to List</a>
                        </div>
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

                            <dt class="col-sm-3">Description:</dt>
                            <dd class="col-sm-9">{{ $category->description }}</dd>

                            <dt class="col-sm-3">Status:</dt>
                            <dd class="col-sm-9">
                                @if($category->status)
                                    Active
                                @else
                                    Inactive
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
