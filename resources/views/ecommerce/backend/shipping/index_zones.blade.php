<x-app-layout :title="'Shipping Zones List'">
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @endpush

    <div class="container mt-4">
        <h1>Shipping Zones</h1>
        <a href="{{ route('shipping.zones.create') }}" class="btn btn-primary mb-3">Add New Zone</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Zone Name</th>
                    <th>Shipping Method</th>
                    <th>Cost</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($zones as $zone)
                    <tr>
                        <td>{{ $zone->id }}</td>
                        <td>{{ $zone->zone_name }}</td>
                        <td>{{ $zone->shippingMethod->method_name }}</td>
                        <td>${{ number_format($zone->cost, 2) }}</td>
                        <td>{{ $zone->is_active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('shipping.zones.edit', $zone->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('shipping.zones.destroy', $zone->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @endpush
</x-app-layout>
