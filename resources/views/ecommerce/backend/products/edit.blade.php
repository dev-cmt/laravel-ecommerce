<x-app-layout>
    @push('style')
        <!-- Dropzone CSS -->
        <link href="{{ asset('public/backend/libs/dropzone/5.9.3/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Custom Dropzone Styles -->
        <style>
            #product-gallery-dropzone {
                border: 2px dashed #ced4da;
                background-color: #f8f9fa;
                padding: 30px;
                text-align: center;
                cursor: pointer;
            }

            #product-gallery-dropzone .dz-message {
                font-size: 18px;
                font-weight: 500;
                color: #495057;
            }

            #product-gallery-dropzone .dz-message:hover {
                color: #007bff;
            }

            .dz-preview {
                display: inline-block;
                margin: 10px;
            }

            .dz-preview .dz-image img {
                width: 100px;
                height: 100px;
                object-fit: cover;
                border-radius: 10px;
            }

            .dz-preview .dz-remove {
                margin-top: 10px;
                display: block;
                text-align: center;
                cursor: pointer;
                color: #dc3545;
            }

            .dz-preview .dz-error-message {
                display: none !important;
            }
        </style>

        <!-- Quill CSS -->
        <link href="{{ asset('public/backend/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/backend/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/backend/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <form action="{{ route('products.store') }}" method="POST" class="dropzone" id="my-dropzone" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product_name">Product Title</label>
                            <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" placeholder="Enter product title" value="{{ old('product_name') }}" required>
                            @error('product_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_description">Product Description</label>
                            <div id="product_description" class="snow-editor" style="height: 300px;">
                                {!! old('description', $product->description) !!}
                            </div>
                            <input type="hidden" name="description" id="description" value="{{ old('description', $product->description ?? '') }}">
                        </div>

                    </div>
                </div>
                <!-- end card -->

                <!-- Product Image -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Gallery</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Product Image</h5>
                            <p class="text-muted">Add Product main Image.</p>
                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <!-- Upload Icon & File Input -->
                                    <div class="position-absolute top-100 start-100 translate-middle">
                                        <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                            <div class="avatar-xs">
                                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input type="file" name="img_path" class="form-control d-none @error('img_path') is-invalid @enderror" id="product-image-input" accept="image/png, image/gif, image/jpeg">
                                        @error('img_path')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Image Preview -->
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded">
                                            <img src="{{ asset('public/backend/images/product-img.png') }}" id="product-img" class="avatar-md h-auto" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- JavaScript for image preview -->
                        <script>
                            document.getElementById('product-image-input').addEventListener('change', function() {
                                const [file] = this.files;
                                if (file) {
                                    document.getElementById('product-img').src = URL.createObjectURL(file);
                                }
                            });
                        </script>

                        <!-- Product Gallery Images -->
                        <div>
                            <h5 class="fs-14 mb-1">Product Gallery Images</h5>
                            <p class="text-muted">Add multiple images for the product gallery.</p>
                            <div class="dropzone" id="product-gallery-dropzone">
                                <div class="dz-message">
                                    <i class="ri-upload-cloud-2-fill display-4 mb-3"></i>
                                    <h3>Drop files here to upload</h3>
                                    <p>or click to select files</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end card -->


                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                    General Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                    Meta Data
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#addproduct-variants" role="tab">
                                    Variants
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#addproduct-specifications" role="tab">
                                    Specifications
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#addproduct-details" role="tab">
                                    Details
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">Manufacturer Company Name</label>
                                            <input type="text" name="manufacturer_name" class="form-control" id="manufacturer-name-input" placeholder="Enter manufacturer name">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-price-input">Price</label>
                                            <div class="input-group has-validation mb-3">
                                                <span class="input-group-text" id="product-price-addon">$</span>
                                                <input type="text" name="price" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required>
                                                <div class="invalid-feedback">Please Enter a product price.</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-discount-input">Discount</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="product-discount-addon">%</span>
                                                <input type="text" name="discount" class="form-control" id="product-discount-input" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end tab-pane -->

                            <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-title-input">Meta title</label>
                                            <input type="text" name="meta_title" class="form-control" placeholder="Enter meta title" id="meta-title-input">
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="meta-keywords-input">Meta Keywords</label>
                                            <input type="text" name="meta_keywords" class="form-control" placeholder="Enter meta keywords" id="meta-keywords-input">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div>
                                    <label class="form-label" for="meta-description-input">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" id="meta-description-input" placeholder="Enter meta description" rows="3"></textarea>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <!-- Variants Section -->
                            <div class="tab-pane" id="addproduct-variants" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table" id="variants-table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="variant-row-0">
                                                <td><input type="file" name="variants[0][img_path]" class="form-control"></td>
                                                <td><input type="text" name="variants[0][color]" class="form-control"></td>
                                                <td><input type="text" name="variants[0][size]" class="form-control"></td>
                                                <td><input type="text" name="variants[0][price]" class="form-control"></td>
                                                <td><input type="text" name="variants[0][quantity]" class="form-control"></td>
                                                <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" id="add-variant" class="btn btn-success">Add Variant</button>
                                </div>
                            </div>
                            

                            <!-- Specifications Section -->
                            <div class="tab-pane" id="addproduct-specifications" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table" id="specifications-table">
                                        <thead>
                                            <tr>
                                                <th>Specification Name</th>
                                                <th>Specification Value</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="specification-row-0">
                                                <td><input type="text" name="specifications[0][specification_name]" class="form-control"></td>
                                                <td><textarea name="specifications[0][specification_value]" rows="1" class="form-control"></textarea></td>
                                                <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" id="add-specification" class="btn btn-success">Add Specification</button>
                                </div>
                            </div>
                            

                            <!-- Details Section -->
                            <div class="tab-pane" id="addproduct-details" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table" id="details-table">
                                        <thead>
                                            <tr>
                                                <th>Detail Name</th>
                                                <th>Detail Value</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="detail-row-0">
                                                <td><input type="text" name="details[0][detail_name]" class="form-control"></td>
                                                <td><textarea name="details[0][detail_value]" rows="1" class="form-control"></textarea></td>
                                                <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" id="add-detail" class="btn btn-success">Add Detail</button>
                                </div>
                            </div>
                            

                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="text-end mb-3">
                    <button type="submit" id="product-submit" class="btn btn-success w-sm">Submit</button>
                </div>
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

    </form>

    @push('scripts')
        <!-- Quill JS -->
        <script src="{{ asset('public/backend/libs/quill/quill.min.js') }}"></script>

        <script>
            // Initialize Quill editor
            var quill = new Quill('#product_description', {
                theme: 'snow'
            });

            // Update hidden field before form submission
            document.getElementById('product-submit').addEventListener('click', function (e) {
                e.preventDefault(); // Prevent the form from submitting immediately
                var description = document.querySelector('#product_description .ql-editor').innerHTML;
                document.getElementById('description').value = description;

                if (myDropzone.getQueuedFiles().length > 0) {
                    myDropzone.processQueue(); // Manually trigger Dropzone upload
                } else {
                    // If no files are selected, submit the form immediately
                    document.getElementById('my-dropzone').submit();
                }
            });
        </script>
        
        <!-- Dropzone JS -->
        <script src="{{ asset('public/backend/libs/dropzone/5.9.3/dropzone.min.js') }}"></script>
        <script>
            // Dropzone initialization
            Dropzone.options.myDropzone = {
                // url: "{{ route('products.store') }}",
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 10,
                maxFilesize: 2, // MB
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                previewsContainer: "#product-gallery-dropzone", // Preview images inside the dropzone
                init: function() {
                    var submitButton = document.getElementById('product-submit');
                    var myDropzone = this;

                    submitButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        if (myDropzone.getQueuedFiles().length > 0) {
                            myDropzone.processQueue();
                        } else {
                            alert("Please select at least one image to upload.");
                        }
                    });

                    // this.on("successmultiple", function(files, response) {
                    //     console.log("Files uploaded successfully:", response);
                    //     window.location.href = "{{ url()->previous() }}";
                    // });

                    this.on("errormultiple", function(files, response) {
                        console.error("Error during upload:", response);
                    });
                },
                previewTemplate: `
                    <div class="dz-preview dz-file-preview">
                        <div class="dz-image">
                            <img data-dz-thumbnail />
                        </div>
                        <div class="dz-details">
                            <div class="dz-size"><span data-dz-size></span></div>
                            <div class="dz-filename"><span data-dz-name></span></div>
                        </div>
                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                        <div class="dz-success-mark"><span>✔</span></div>
                        <div class="dz-error-mark"><span>✘</span></div>
                        <div class="dz-error-message"><span data-dz-errormessage></span></div>
                    </div>
                `
            };
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                let variantCount = 1;
                let specificationCount = 1;
                let detailCount = 1;

                // Add Variant
                $('#add-variant').click(function () {
                    $('#variants-table tbody').append(`
                        <tr id="variant-row-${variantCount}">
                            <td><input type="file" name="variants[${variantCount}][img_path]" class="form-control"></td>
                            <td><input type="text" name="variants[${variantCount}][color]" class="form-control"></td>
                            <td><input type="text" name="variants[${variantCount}][size]" class="form-control"></td>
                            <td><input type="text" name="variants[${variantCount}][price]" class="form-control"></td>
                            <td><input type="text" name="variants[${variantCount}][quantity]" class="form-control"></td>
                            <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                        </tr>
                    `);
                    variantCount++;
                });

                // Add Specification
                $('#add-specification').click(function () {
                    $('#specifications-table tbody').append(`
                        <tr id="specification-row-${specificationCount}">
                            <td><input type="text" name="specifications[${specificationCount}][specification_name]" class="form-control"></td>
                            <td><textarea name="specifications[${specificationCount}][specification_value]" rows="1" class="form-control"></textarea></td>
                            <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                        </tr>
                    `);
                    specificationCount++;
                });

                // Add Detail
                $('#add-detail').click(function () {
                    $('#details-table tbody').append(`
                        <tr id="detail-row-${detailCount}">
                            <td><input type="text" name="details[${detailCount}][detail_name]" class="form-control"></td>
                            <td><textarea name="details[${detailCount}][detail_value]" rows="1" class="form-control"></textarea></td>
                            <td><button type="button" class="btn btn-danger btn-sm remove-row">Remove</button></td>
                        </tr>
                    `);
                    detailCount++;
                });

                // Remove Row
                $(document).on('click', '.remove-row', function () {
                    $(this).closest('tr').remove();
                });
            });

        </script>

    @endpush

</x-app-layout>
