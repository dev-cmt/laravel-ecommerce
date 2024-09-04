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
                    <h4 class="card-title mb-0 flex-grow-1">Add New Category</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-danger">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}" required>
                            @error('category_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="img_path">Category Images</label>
                            <input type="file" name="img_path" id="img_path" class="form-control @error('img_path') is-invalid @enderror">
                            @error('img_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="parent_cat_id">Parent Category</label>
                            <select name="parent_cat_id" id="parent_cat_id" class="form-control @error('parent_cat_id') is-invalid @enderror">
                                <option value="">None</option>
                                {{-- @foreach($parentCategories as $parent)
                                    <option value="{{ $parent->id }}" {{ old('parent_cat_id') == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->category_name }}
                                    </option>
                                @endforeach --}}
                                @foreach ($categories->where('parent_cat_id', null) as $category)
                                    @include('ecommerce.backend.partials.category-option', ['category' => $category, 'categories' => $categories, 'level' => 0])
                                @endforeach
                            </select>
                            @error('parent_cat_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Save Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
