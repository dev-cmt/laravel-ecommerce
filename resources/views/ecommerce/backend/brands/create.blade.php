<x-app-layout :title="'Products List'">
    @push('style')
    
    @endpush
    @push('scripts')

    @endpush
    
    <div class="container">
        <h1>Add New Brand</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('brands.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="brand_name">Brand Name</label>
                <input type="text" name="brand_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="url_slug">URL Slug</label>
                <input type="text" name="url_slug" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="img_path">Brand Images</label>
                <input type="file" name="img_path" id="img_path" class="form-control @error('img_path') is-invalid @enderror">
                @error('img_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Brand</button>
        </form>
    </div>
</x-app-layout>