<x-app-layout :title="'Products List'">
    @push('style')
    
    @endpush
    @push('scripts')

    @endpush
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Categories</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-success edit-item-btn">Add New Category</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap table-striped-columns mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">URL Slug</th>
                                    <th scope="col">Parent Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>   
                                </tr>
                            </thead>
                            <tbody id="category-list">
                                @foreach($categories as $category)
                                <tr data-id="{{ $category->id }}">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->url_slug }}</td>
                                    <td>{{ $category->parentCategory->category_name ?? 'None' }}</td>
                                    <td><span class="badge bg-{{ $category->status == 'active' ? 'success' : 'danger' }}">{{ ucfirst($category->status) }}</span></td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary edit-category">Edit</a>
                                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-info show-category">Show</a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger edit-item-btn" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>