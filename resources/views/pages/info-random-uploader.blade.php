<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Random Uploader Tool</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('random-uploader-tool.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ count($data) > 0 ? '1' : '' }}" id="hasData">

                        <div class="table-responsive table-card">
                            <table id="dataTableUploadTool" class="table table-nowrap table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Document Name</th>
                                        <th scope="col">Sub-Type (If Any)</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Additional Note(s)</th>
                                        <th scope="col">Upload Tool</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=> $row)
                                        <tr>
                                            <td><h6 class="mt-2">{{++$key}}</h6></td>
                                            <input type="hidden" name="data[{{ $key }}][id]" value="{{$row->id}}">
                                            <td><input type="text" class="form-control document_name" name="data[{{$key}}][document_name]" value="{{$row->document_name}}" disabled></td>
                                            <td><input type="text" class="form-control sub_type" name="data[{{$key}}][sub_type]" value="{{$row->sub_type}}" disabled></td>
                                            <td><input type="date" class="form-control date" name="data[{{$key}}][date]" value="{{$row->date}}" disabled></td>
                                            <td><input type="text" class="form-control additional_note" name="data[{{$key}}][additional_note]" value="{{$row->additional_note}}" disabled></td>
                                            <td><input type="file" class="form-control upload_tool" name="data[{{$key}}][upload_tool]" value="{{$row->upload_tool}}" disabled></td>
                                            <td class="d-flex">
                                                <a href="{{ route('random-uploader-tool.download', $row->id) }}" class="btn btn-primary {{empty($row->upload_tool) ? 'd-none': ''}}"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="6"><button type="button" id="addRowSugar" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add Row</button></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-label waves-effect waves-light" id="edit-btn-1"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Edit</button>
                                            <button type="submit" class="btn btn-success btn-label waves-effect waves-light" id="save-btn-1"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
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







    @push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ Session::get('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if(Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ Session::get('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>
    @endpush
</x-app-layout>
