<x-app-layout>
    @push('style')
        <!-- Custom Styles -->
        <style>
            .upload-area {
                border: 2px dashed #d3d3d3;
                padding: 20px;
                text-align: center;
                background-color: #f9f9f9;
                cursor: pointer;
                border-radius: 5px;
                margin-bottom: 20px;
            }
            .upload-area:hover {
                background-color: #f0f0f0;
            }
            .upload-area i {
                font-size: 48px;
                color: #6c757d;
            }
            .upload-area p {
                margin-top: 10px;
                font-size: 16px;
                color: #6c757d;
            }
            .preview-area {
                margin-top: 10px;
            }
            .preview-item {
                display: flex;
                align-items: center;
                padding: 10px !important;
            }
            .preview-item img{
                margin-right: 25px;
            }
        </style>

        <!-- Quill CSS -->
        <link href="{{ asset('public/backend/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/backend/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/backend/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
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
                                {{ old('description') }}
                            </div>
                            <input type="hidden" name="description" id="description" value="{{ old('description') }}">
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
                                        <input type="file" name="main_image" class="form-control d-none @error('main_image') is-invalid @enderror" id="product-image-input" accept="image/png, image/gif, image/jpeg">
                                        @error('main_image')
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
                        
                        <script>
                            document.getElementById('product-image-input').addEventListener('change', function() {
                                const [file] = this.files;
                                if (file) {
                                    // Validate file type and size in JavaScript (optional)
                                    if (!file.type.match('image.*')) {
                                        alert("Please select a valid image file.");
                                        this.value = ''; // Clear file input
                                        return;
                                    }
                                    if (file.size > 2 * 1024 * 1024) { // 2MB limit
                                        alert("File size exceeds the 2MB limit.");
                                        this.value = ''; // Clear file input
                                        return;
                                    }
                                    // Preview the image
                                    document.getElementById('product-img').src = URL.createObjectURL(file);
                                }
                            });
                        </script>


                        <!-- Product Gallery Images -->
                        <div class="container mt-5">
                            <h4>Product Gallery Images</h4>
                            <p>Add multiple images for the product gallery.</p>
                            <div class="upload-area" onclick="document.getElementById('file-input').click()">
                                <i class="mdi mdi-cloud-upload"></i>
                                <p>Drop files here to upload<br>or click to select files</p>
                            </div>
                            <input type="file" id="file-input" name="product_images[]" multiple style="display: none;">
                            <div class="preview-area" id="preview-area">
                                <!-- Preview items will be inserted here -->
                            </div>
                            <button type="button" id="clear-all" class="btn btn-danger" style="display: none">Clear All</button>
                        </div>

                    </div>
                </div>
                <!-- end card -->

                <!-- Others Setting -->
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
                                                <input type="number" name="price" min="0" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required>
                                                <div class="invalid-feedback">Please Enter a product price.</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-discount-input">Discount</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="product-discount-addon">%</span>
                                                <input type="number" name="discount" min="0" max="100" class="form-control" id="product-discount-input" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
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
                                                <td><input type="number" min="0" name="variants[0][price]" class="form-control"></td>
                                                <td><input type="number" min="0" name="variants[0][quantity]" class="form-control"></td>
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

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Status</label>
                            <select name="status" class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                                <option value="Published" selected>Published</option>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Draft">Draft</option>
                            </select>
                        </div>

                        <div>
                            <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                            <select name="visibility" class="form-select" id="choices-publish-visibility-input" data-choices data-choices-search-false>
                                <option value="Public" selected>Public</option>
                                <option value="Hidden">Hidden</option>
                            </select>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish Schedule</h5>
                    </div>
                    <!-- end card body -->
                    <div class="card-body">
                        <div>
                            <label for="datepicker-publish-input" class="form-label">Publish Date & Time</label>
                            <input type="date" name="publish_schedule" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Categories</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2"> <a href="{{route('categories.create')}}" class="float-end text-decoration-underline">Add New</a>Select product category</p>
                        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Brand</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2"> <a href="{{route('brands.create')}}" class="float-end text-decoration-underline">Add New</a>Select product brand</p>
                        <select name="brand_id" id="brand_id" class="form-select @error('brand_id') is-invalid @enderror">
                            <option value="">No Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="hstack gap-3 align-items-start">
                            <div class="flex-grow-1">
                                <input type="text"  name="tags" class="form-control" data-choices data-choices-multiple-remove="true" placeholder="Enter tags" value="Cotton" />
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Short Description</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2">Add short description for product</p>
                        <textarea name="short_description" class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3"></textarea>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

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
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'font': [] }],                     // Font style
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }], // Header levels
                        ['bold', 'italic', 'underline'],      // Basic text styles
                        [{ 'color': [] }, { 'background': [] }],  // Text color and highlight
                        [{ 'script': 'sub'}, { 'script': 'super' }], // Subscript/Superscript
                        ['blockquote', 'code-block'],         // Blockquote and code block
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }], // Lists
                        [{ 'indent': '-1'}, { 'indent': '+1' }], // Indent
                        [{ 'direction': 'rtl' }],             // Text direction
                        [{ 'align': [] }],                    // Text alignment
                        ['link'],                             // Insert link, image, and video
                        ['clean']                             // Clear formatting
                    ]
                }
            });

            // Update hidden field before form submission
            document.getElementById('product-submit').addEventListener('click', function (e) {
                var description = document.querySelector('#product_description .ql-editor').innerHTML;
                document.getElementById('description').value = description;
            });
        </script>
        
        <script>
            let allFiles = [];
        
            $(document).ready(function(){
                $(".upload-area").on("dragover", function(event) {
                    event.preventDefault();  
                    event.stopPropagation();
                    $(this).css("background-color", "#e9ecef");
                });
        
                $(".upload-area").on("dragleave", function(event) {
                    event.preventDefault();  
                    event.stopPropagation();
                    $(this).css("background-color", "#f9f9f9");
                });
        
                $(".upload-area").on("drop", function(event) {
                    event.preventDefault();  
                    event.stopPropagation();
                    $(this).css("background-color", "#f9f9f9");
        
                    let files = event.originalEvent.dataTransfer.files;
                    addFiles(files);
                });
        
                $("#file-input").on("change", function() {
                    let files = this.files;
                    addFiles(files);
                });
                $("#clear-all").on("click", function() {
                    allFiles = [];
                    showPreview();
                    $("#clear-all").hide();
                });
        
                function addFiles(files) {
                    for (let i = 0; i < files.length; i++) {
                        allFiles.push(files[i]);
                    }
                    showPreview();
                }
        
                function showPreview() {
                    $("#preview-area").empty();
                    $("#clear-all").show();
                    allFiles.forEach((file, i) => {
                        let reader = new FileReader();
        
                        reader.onload = function(e) {
                            let filePreview = `
                                <div data-index="${i}" class="preview-item alert alert-success alert-dismissible fade show material-shadow" role="alert">
                                    <img src="${e.target.result}" height="50">
                                    <div>
                                        <p class="m-0"><strong>Name: </strong> ${file.name} </p>
                                        <p class="m-0"><strong>Size: </strong> ${(file.size / 1024).toFixed(2)} KB </p>
                                        <!--<button type="button" class="btn-close" style="top: 15px"></button>-->
                                    </div>
                                </div>
                            `;
                            $("#preview-area").append(filePreview);
                        };
        
                        reader.readAsDataURL(file);
                    });
        
                    // Update the hidden file input with all selected files
                    let dataTransfer = new DataTransfer();
                    allFiles.forEach(file => dataTransfer.items.add(file));
                    document.getElementById('file-input').files = dataTransfer.files;
        
                    // Re-bind click event to remove buttons
                    $(".btn-close").off("click").on("click", function() {
                        let index = $(this).closest('.preview-item').data('index');
                        removeFile(index);
                    });
                }
        
                function removeFile(index) {
                    allFiles.splice(index, 1);
                    showPreview();
                }
            });
        </script>

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
                            <td><input type="number" min="0" name="variants[${variantCount}][price]" class="form-control"></td>
                            <td><input type="number" min="0" name="variants[${variantCount}][quantity]" class="form-control"></td>
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
