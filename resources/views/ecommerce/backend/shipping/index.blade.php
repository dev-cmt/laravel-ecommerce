<x-app-layout :title="'Shipping Methods List'">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Shipping Methods</h4>
                    <div class="flex-shrink-0">
                        <button type="button" id="open_modal" class="btn btn-success btn-label btn-sm">
                            <i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table id="customTable" class="table table-nowrap table-striped-columns custom-datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Method Name</th>
                                    <th>Cost</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($methods as $method)
                                    <tr>
                                        <td>{{ $method->id }}</td>
                                        <td>{{ $method->method_name }}</td>
                                        <td>{{ $method->cost }}</td>
                                        <td>{{ $method->description }}</td>
                                        <td>
                                            @if ($method->is_active)
                                                <span class="badge badge-label bg-success">
                                                    <i class="mdi mdi-circle-medium"></i> Active
                                                </span>
                                            @else
                                                <span class="badge badge-label bg-danger">
                                                    <i class="mdi mdi-circle-medium"></i> Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <button type="button" data-id="{{ $method->id }}" class="btn btn-sm btn-primary edit-modal mx-1">Edit</button>
                                            <form action="{{ route('shipping-methods.destroy', $method->id) }}" method="POST" style="display:inline;">
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

    <!-- Modal for Adding/Editing Shipping Method -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h4 class="card-title">Shipping Methods</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('shipping-methods.store') }}" method="POST" enctype="multipart/form-data" id="shippingMethodForm">
                        @csrf
                        <input type="hidden" name="id" id="methodId">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="method_name" class="form-label">Method Name</label>
                                <input type="text" name="method_name" id="methodName" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cost" class="form-label">Cost</label>
                                <input type="number" name="cost" id="cost" class="form-control" placeholder="Enter cost" required />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="1"></textarea>
                            </div>
                            <div class="col-md-6 mb-3" id="zone-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="defaultIndeterminateCheck">
                                    <label class="form-check-label" for="defaultIndeterminateCheck">
                                        Add Costs for Different Zones?
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" checked>
                                    <label class="form-check-label" for="isActive">
                                        Is Enabled?
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive mb-3" id="zoneTableContainer" style="display: none;">
                            <table class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Zone Name</th>
                                        <th scope="col">Cost</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="zoneTableBody"></tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <button type="button" class="addRow btn btn-sm btn-primary mt-2">
                                                <i class="ri-add-line label-icon align-middle fs-16"></i> Add Zone
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            <div class="hstack gap-2 justify-content-center">
                                <a href="javascript:void(0);" class="btn btn-link link-success fw-medium material-shadow-none" data-bs-dismiss="modal">
                                    <i class="ri-close-line me-1 align-middle"></i> Close
                                </a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            // open modal
            $('#open_modal').click(function() {
                $('#staticBackdrop').modal('show');
            });

            $('.edit-modal').click(function() {
                // Show the modal
                $('#staticBackdrop').modal('show');
                
                // Get the method ID from the data-id attribute
                var methodId = $(this).data('id');
                
                // Make an AJAX request to get the shipping method data
                $.ajax({
                    url: "{{ route('shipping-methods.edit', ':id') }}".replace(':id', methodId),
                    type: 'GET',
                    success: function(response) {
                        // Populate the form fields with the data from the response
                        $('#methodId').val(response.id);
                        $('#methodName').val(response.method_name);
                        $('#cost').val(response.cost);
                        $('#description').val(response.description);

                        // Set the "Is Active?" checkbox
                        if (response.is_active) {
                            $('#isActive').prop('checked', true);
                        } else {
                            $('#isActive').prop('checked', false);
                        }
                        
                        // Clear any existing rows in the zones table
                        $('#zoneTableBody').empty();
                        
                        // Populate the shipping zones table if there are zones
                        if (response.shipping_zones.length > 0) {
                            response.shipping_zones.forEach(zone => {
                                const zoneRow = `
                                    <tr>
                                        <td>
                                            <select name="zone_name[]" class="form-control zone_name" required>
                                                <option value="${zone.zone_name}" selected>${zone.zone_name}</option>
                                                @foreach ($divisions as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="zone_cost[]" class="form-control zone_cost" value="${zone.zone_cost}" required />
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger delete-zone" data-zone-id="${zone.id}">
                                                <i class="ri-delete-bin-line label-icon align-middle fs-16"></i>
                                            </button>
                                        </td>
                                    </tr>
                                `;
                                $('#zoneTableBody').append(zoneRow);
                            });
                            $('#zone-check').hide();
                            $('#zoneTableContainer').show(); // Show the zones table
                        } else {
                            $('#zone-check').show();
                            $('#zoneTableContainer').hide(); // Hide the zones table
                        }
                    }
                });
            });

            // Updated delete-zone click handler
            $('#zoneTableBody').on('click', '.delete-zone', function() {
                var zoneId = $(this).data('zone-id'); // Get the zone ID
                
                // Confirm the deletion
                if (confirm('Are you sure you want to delete this zone?')) {
                    $.ajax({
                        url: "{{ route('shipping-zones.destroy', ':id') }}".replace(':id', zoneId), // Use the route helper to generate the URL
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}' // Include CSRF token for security
                        },
                        success: function(response) {
                            // On success, remove the row from the table
                            $(this).parents('tr').remove();
                            alert(response.message); // Show success message
                        },
                        error: function(xhr) {
                            alert('Error deleting zone: ' + xhr.responseText);
                        }
                    });
                }
            });

            // Clear form inputs when modal is closed
            $('#staticBackdrop').on('hidden.bs.modal', function () {
                $('#shippingMethodForm')[0].reset();
                $('#zoneTableContainer').hide();
                $('#zoneTableBody').empty(); // Clear the table
            });
        });
    </script>

    <!--Shipping Zone Manage-->
    <script>
        // Function to check for duplicates
        function hasDuplicates(array) {
            return new Set(array).size !== array.length; // Check for duplicates by converting the array to a Set
        }

        // Function to collect current zone names
        function getCurrentZoneNames() {
            return $('.zone_name').map(function() {
                return $(this).val().trim(); // Get the value of each zone name, trimming any extra spaces
            }).get();
        }

        // Function to validate required fields
        function hasValueCheck() {
            var allSubValuesNotNull = true;

            // Iterate through each row (use '.zone_name' and '.zone_cost' together)
            $('#zoneTableBody tr').each(function() {
                var zoneName = $(this).find('.zone_name').val().trim();
                var zoneCost = $(this).find('.zone_cost').val().trim();

                // Check if either zone_name or zone_cost is empty
                if (zoneName === '' || zoneCost === '') {
                    allSubValuesNotNull = false; // Mark as false if any of them are empty
                    return false; // Break out of the loop if we find any empty field
                }
            });

            return allSubValuesNotNull;
        }

        // Event handler for changes in zone_name
        $('#zoneTableBody').on('change', '.zone_name', function() {
            var currentZoneNames = getCurrentZoneNames(); // Get current list of zone names
            // Check if there are duplicates
            if (hasDuplicates(currentZoneNames)) {
                alert('Duplicate zone names are not allowed.');

                $(this).val(''); // Reset the dropdown to '--Select--'
            }
            $(this).closest('tr').find('input[name="zone_cost[]"]').val('');
        });

        // Add Row
        $('.addRow').click(function() {
            if (hasValueCheck() && !hasDuplicates(getCurrentZoneNames())) {
                addRow(); // If validation passes, add a new row
            } else {
                alert('Please fill in all required fields and make sure there are no duplicate zone names.');
            }
        });

        // Function to add a new row (zone)
        function addRow() {
            const newZoneRow = `
                <tr>
                    <td>
                        <select name="zone_name[]" class="form-control zone_name" required>
                            <option value="">--Select--</option>
                            @foreach ($divisions as $item)
                                <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="zone_cost[]" class="form-control zone_cost" placeholder="Enter zone cost" required /></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger removeRow"><i class="ri-delete-bin-line label-icon align-middle fs-16"></i></button>
                    </td>
                </tr>
            `;
            $('#zoneTableBody').append(newZoneRow); // Append the new row to the table
        }

        // Remove Row
        $('#zoneTableBody').on('click', '.removeRow', function() {
            $(this).closest('tr').remove(); // Remove the selected row from the table
        });

        // Show/hide table based on checkbox state
        $('#defaultIndeterminateCheck').change(function() {
            if (this.checked) {
                $('#zoneTableContainer').show();
                addRow(); // Automatically add a new row when the checkbox is checked
            } else {
                $('#zoneTableContainer').hide();
                $('#zoneTableBody').empty(); // Clear all rows if the checkbox is unchecked
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Submission form AJAX
            $('#shippingMethodForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission
    
                // Prepare the form data
                var formData = $(this).serialize();
    
                // Send AJAX request
                $.ajax({
                    url: $(this).attr('action'), // Get the action URL from the form
                    type: 'POST', // POST method
                    data: formData,
                    success: function(response) {
                        // Handle success (e.g., update the table)
                        alert('Shipping method added successfully!');
                        $('#zoneTableBody').empty(); // Clear the zone table
                        $('#staticBackdrop').modal('hide'); // Hide the modal
                        // Optionally, refresh the table or add the new row to it
                        location.reload(); // Reload to see the updated table
                    },
                    error: function(xhr) {
                        // Handle error
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '\n'; // Collect error messages
                        });
                        alert('Error: \n' + errorMessage);
                    }
                });
            });
        });
    </script>
    @endpush
</x-app-layout>
