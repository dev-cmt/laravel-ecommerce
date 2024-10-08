<x-app-layout :title="'Edit Shipping Zone'">
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @endpush

    <div class="container mt-4">
        <h1>Edit Shipping Zone</h1>
        <form action="{{ route('shipping.zones.update', $zone->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="zone_name" class="form-label">Zone Name</label>
                <input type="text" name="zone_name" class="form-control" value="{{ $zone->zone_name }}" required>
            </div>
            <div class="mb-3">
                <label for="shipping_method_id" class="form-label">Shipping Method</label>
                <select name="shipping_method_id" class="form-control" required>
                    @foreach($methods as $method)
                        <option value="{{ $method->id }}" {{ $zone->shipping_method_id == $method->id ? 'selected' : '' }}>
                            {{ $method->method_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="cost" class="form-label">Cost</label>
                <input type="number" step="0.01" name="cost" class="form-control" value="{{ $zone->cost }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('shipping.zones.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @endpush
</x-app-layout>
