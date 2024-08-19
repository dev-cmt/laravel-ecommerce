<x-app-layout :title="'Products List'">
    @push('style')
    
    @endpush
    @push('scripts')

    @endpush

    <div class="container">
        <h1>Category Details</h1>

        <p><strong>Name:</strong> {{ $category->category_name }}</p>
        <p><strong>Slug:</strong> {{ $category->url_slug }}</p>
        <p><strong>Description:</strong> {{ $category->description }}</p>
        <p><strong>Status:</strong> {{ $category->status ? 'Active' : 'Inactive' }}</p>

        <h3>Subcategories</h3>
        @if($category->children->isEmpty())
            <p>No subcategories available.</p>
        @else
            <ul>
                @foreach($category->children as $child)
                    <li>{{ $child->category_name }}</li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
    </div>

</x-app-layout>