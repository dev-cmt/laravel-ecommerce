<x-app-layout :title="'Edit Color'">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Color</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('colors.update', $color->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="color_name">Color Name</label>
                            <input type="text" class="form-control" id="color_name" name="color_name" value="{{ $color->color_name }}" required>
                        </div>
                        <!-- Status -->
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="1" {{ old('status', $color->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $color->status) == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('colors.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
