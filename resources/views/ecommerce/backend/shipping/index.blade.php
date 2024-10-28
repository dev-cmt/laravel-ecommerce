<x-app-layout :title="'Shipping Methods List'">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Shipping Methods</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('shipping.methods.create') }}" class="btn btn-sm btn-success edit-item-btn">Add New Shipping</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table id="customTable" class="table table-nowrap table-striped-columns custom-datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Method Name</th>
                                    <th>Description</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($methods as $method)
                                    <tr>
                                        <td>{{ $method->id }}</td>
                                        <td>{{ $method->method_name }}</td>
                                        <td>{{ $method->description }}</td>
                                        <td>{{ $method->is_active ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <a href="{{ route('shipping.methods.edit', $method->id) }}" class="btn btn-sm btn-primary edit-category">Edit</a>
                                            <form action="{{ route('shipping.methods.destroy', $method->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
