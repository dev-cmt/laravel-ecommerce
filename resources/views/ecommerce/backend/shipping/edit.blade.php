<x-app-layout :title="'Edit Shipping Method'">
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @endpush

    <div class="container mt-4">
        <h1>Edit Shipping Method</h1>
        <form action="{{ route('shipping.methods.update', $shippingMethod->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="method_name" class="form-label">Method Name</label>
                <input type="text" name="method_name" class="form-control" value="{{ $shippingMethod->method_name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $shippingMethod->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('shipping.methods.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @endpush
</x-app-layout>
