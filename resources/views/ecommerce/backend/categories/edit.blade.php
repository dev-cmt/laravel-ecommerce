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
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="category_name" class="form-control" value="{{ old('category_name', $category->category_name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="parent_cat_id">Parent Category</label>
                            <select name="parent_cat_id" class="form-control">
                                <option value="">None</option>
                                @foreach($parentCategories as $parent)
                                    <option value="{{ $parent->id }}" @if(old('parent_cat_id', $category->parent_cat_id) == $parent->id) selected @endif>
                                        {{ $parent->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="1" @if(old('status', $category->status) == '1') selected @endif>Active</option>
                                <option value="0" @if(old('status', $category->status) == '0') selected @endif>Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
