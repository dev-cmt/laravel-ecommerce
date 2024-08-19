<x-app-layout :title="'Products List'">
    @push('style')
    
    @endpush
    @push('scripts')

    @endpush

    <div class="container">
        <h1>Brand Details</h1>

        <p><strong>Name:</strong> {{ $brand->brand_name }}</p>
        <p><strong>Slug:</strong> {{ $brand->url_slug }}</p>
        <p><strong>Description:</strong> {{ $brand->description }}</p>
        <p><strong>Status:</strong> {{ $brand->status ? 'Active' : 'Inactive' }}</p>

        <a href="{{ route('brands.index') }}" class="btn btn-secondary">Back to Brands</a>
    </div>

</x-app-layout>