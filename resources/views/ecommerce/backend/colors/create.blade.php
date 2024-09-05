<x-app-layout :title="'Create Color'">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Color</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('colors.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="color_name">Color Name</label>
                            <input type="text" class="form-control" id="color_name" name="color_name" value="{{ old('color_name') }}" required>
                        </div>
                        <!-- Status -->
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('colors.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
