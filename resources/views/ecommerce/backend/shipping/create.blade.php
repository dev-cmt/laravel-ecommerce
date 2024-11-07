<x-app-layout :title="'Create Shipping Method'">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="card-title mb-0 flex-grow-1">Shipping Method</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="method_name" class="form-label">Method Name</label>
                            <input type="text" name="method_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="1"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-2">
                    <button type="submit" class="btn btn-success btn-label"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex align-items-center py-2">
                    <h4 class="card-title mb-0 flex-grow-1">Shipping Method</h4>
                    <div class="flex-shrink-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-secondary btn-label btn-sm"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row</button>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('shipping.methods.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive table-card">
                            <table class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Zone Name</th>
                                        <th scope="col">Cost</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        
            <!-- staticBackdrop Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom">
                            <h4 class="card-title">Shipping Zone</h4>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="zoneName" class="form-label">Zone Name</label>
                                <select name="zone_name" id="zoneName" class="form-control" required>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Chattogram">Chattogram</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Barishal">Barishal</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="International">International</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="cost" class="form-label">Cost</label>
                                <input type="number" name="cost" id="cost" class="form-control" placeholder="Enter cost" required />
                            </div>
                            
                            <div class="mt-4">
                                <div class="hstack gap-2 justify-content-center">
                                    <a href="javascript:void(0);" class="btn btn-link link-success fw-medium material-shadow-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            var index = $('#dataTableUploadTool tbody tr').length + 1;
            if (index == 1) {
                addRowUploadTool(index);
            }

            // Add Row Button Click
            $('#addRowSugar').click(function() {
                var index = $('#dataTableUploadTool tbody tr').length + 1;
                addRowUploadTool(index);
                updateRowNumbers();
            });

            function addRowUploadTool(index) {
                var newRow = `
                    <tr>
                        <td><h6 class="mt-2">${index}</h6></td>
                        <td><input type="text" class="form-control" name="data[${index}][document_name]"></td>
                        <td><input type="text" class="form-control" name="data[${index}][sub_type]"></td>
                        <td><input type="date" class="form-control" name="data[${index}][date]"></td>
                        <td><input type="text" class="form-control" name="data[${index}][additional_note]"></td>
                        <td><input type="file" class="form-control" name="data[${index}][upload_tool]"></td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                    </tr>
                `;
                $('#dataTableUploadTool tbody').append(newRow);
            }

            // Remove Row Button Click
            $(document).on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateRowNumbers();
            });

            // Function to update row numbers
            function updateRowNumbers() {
                $('#dataTableUploadTool tbody tr').each(function(index) {
                    $(this).find('td:first-child h6').text(index + 1);
                });
            }

            function setupEditAndSave(step, idSelector, fields) {
                var id = $(idSelector).val();
                if (id === null || id === '') {
                    $('#save-btn-' + step).show();
                    $('#edit-btn-' + step).hide();
                } else {
                    $('#edit-btn-' + step).show();
                    $('#save-btn-' + step).hide();
                    fields.forEach(function(field) {
                        $(field).prop('disabled', true);
                    });
                }

                $('#edit-btn-' + step).on('click', function() {
                    $('#save-btn-' + step).show();
                    $('#edit-btn-' + step).hide();
                    fields.forEach(function(field) {
                        $(field).prop('disabled', false);
                    });
                });
            }
            setupEditAndSave(1, "#hasData", [
                '.document_name',
                '.sub_type',
                '.date',
                '.additional_note',
                '.upload_tool',
            ]);
        });
    </script>
    @endpush
</x-app-layout>
