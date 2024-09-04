<x-app-layout>
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
                    <h4 class="card-title mb-0 flex-grow-1">Edit Category</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-danger">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Category Name -->
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name', $category->category_name) }}" required>
                            @error('category_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category Images -->
                        <div class="form-group">
                            <label for="img_path">Category Images</label>
                            <input type="file" name="img_path" id="img_path" class="form-control @error('img_path') is-invalid @enderror">
                            @error('img_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($category->img_path)
                                <img src="{{ asset('public/' . $category->img_path) }}" height="150" alt="Category Image">
                            @else
                                <img src="{{ asset('public/backend/images/product-img.png') }}" height="150" alt="Default Image">
                            @endif
                        </div>

                        <!-- Parent Category -->
                        <div class="form-group">
                            <label for="parent_cat_id">Parent Category</label>
                            <select name="parent_cat_id" id="parent_cat_id" class="form-control @error('parent_cat_id') is-invalid @enderror">
                                <option value="">None</option>
                                @foreach($parentCategories as $parent)
                                    <option value="{{ $parent->id }}" {{ old('parent_cat_id', $category->parent_cat_id) == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_cat_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="1" {{ old('status', $category->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $category->status) == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
