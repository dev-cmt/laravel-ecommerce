<x-app-layout :title="'Color List'">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="card-title mb-0 flex-grow-1">Colors</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('colors.create') }}" class="btn btn-sm btn-success">Add New Color</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Color Name</th>
                                    <th scope="col">Hex Value</th>
                                    <th scope="col">Action</th>   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td>{{ $color->color_name }}</td>
                                    <td>{{ $color->hex_value }}</td>
                                    <td>
                                        <a href="{{ route('colors.edit', $color->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('colors.show', $color->id) }}" class="btn btn-sm btn-info">Show</a>
                                        <form action="{{ route('colors.destroy', $color->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this color?');">Delete</button>
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
