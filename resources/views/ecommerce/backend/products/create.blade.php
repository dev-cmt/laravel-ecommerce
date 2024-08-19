<x-app-layout :title="'Create Product'">
    @push('style')
        <!-- Add any custom styles or frameworks here -->
        <style>
            .form-group {
                margin-bottom: 1rem;
            }
            .variant, .image, .detail, .specification {
                border: 1px solid #e5e5e5;
                padding: 1rem;
                margin-bottom: 1rem;
                border-radius: 4px;
            }
            .remove-variant, .remove-image, .remove-detail, .remove-specification {
                margin-top: 10px;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                function addNewElement(sectionId, template) {
                    let section = document.getElementById(sectionId);
                    let count = section.getElementsByClassName(sectionId.slice(0, -1)).length;
                    let newElement = template.replace(/\[0\]/g, `[${count}]`);
                    section.insertAdjacentHTML('beforeend', newElement);
                }

                document.getElementById('add-variant').addEventListener('click', function () {
                    let variantTemplate = `
                        <div class="variant">
                            <div class="form-group">
                                <label for="color">Color</label>
                                <input type="text" name="variants[0][color]" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="size">Size</label>
                                <input type="text" name="variants[0][size]" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="variants[0][price]" class="form-control" step="0.01" required>
                            </div>
                            <button type="button" class="btn btn-danger remove-variant">Remove</button>
                        </div>`;
                    addNewElement('variants', variantTemplate);
                });

                document.getElementById('add-image').addEventListener('click', function () {
                    let imageTemplate = `
                        <div class="image">
                            <div class="form-group">
                                <label for="image_path">Image Path</label>
                                <input type="file" name="images[0][image_path]" class="form-control" required>
                            </div>
                            <button type="button" class="btn btn-danger remove-image">Remove</button>
                        </div>`;
                    addNewElement('images', imageTemplate);
                });

                document.getElementById('add-detail').addEventListener('click', function () {
                    let detailTemplate = `
                        <div class="detail">
                            <div class="form-group">
                                <label for="detail_name">Detail Name</label>
                                <input type="text" name="details[0][detail_name]" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="detail_value">Detail Value</label>
                                <textarea name="details[0][detail_value]" class="form-control" required></textarea>
                            </div>
                            <button type="button" class="btn btn-danger remove-detail">Remove</button>
                        </div>`;
                    addNewElement('details', detailTemplate);
                });

                document.getElementById('add-specification').addEventListener('click', function () {
                    let specificationTemplate = `
                        <div class="specification">
                            <div class="form-group">
                                <label for="specification_name">Specification Name</label>
                                <input type="text" name="specifications[0][specification_name]" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="specification_value">Specification Value</label>
                                <textarea name="specifications[0][specification_value]" class="form-control" required></textarea>
                            </div>
                            <button type="button" class="btn btn-danger remove-specification">Remove</button>
                        </div>`;
                    addNewElement('specifications', specificationTemplate);
                });

                document.addEventListener('click', function (event) {
                    if (event.target.classList.contains('btn-danger')) {
                        event.target.parentElement.remove();
                    }
                });
            });
        </script>
    @endpush

    <div class="container">
        <h1>Create Product</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Product Information -->
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" required>
                @error('product_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sku_code">SKU Code</label>
                <input type="text" name="sku_code" id="sku_code" class="form-control @error('sku_code') is-invalid @enderror" value="{{ old('sku_code') }}">
                @error('sku_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="url_slug">URL Slug</label>
                <input type="text" name="url_slug" id="url_slug" class="form-control @error('url_slug') is-invalid @enderror" value="{{ old('url_slug') }}" required>
                @error('url_slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="img_path">Product Image</label>
                <input type="file" name="img_path" id="img_path" class="form-control @error('img_path') is-invalid @enderror">
                @error('img_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="brand_id">Brand</label>
                <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror" required>
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                    @endforeach
                </select>
                @error('brand_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" step="0.01" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            


            <!-- Variants Section -->
            <div id="variants-section">
                <h4>Product Variants</h4>
                <div id="variants">
                    <div class="variant">
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input type="text" name="variants[0][color]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="size">Size</label>
                            <input type="text" name="variants[0][size]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="variants[0][price]" class="form-control" step="0.01" required>
                        </div>
                    </div>
                </div>
                <button type="button" id="add-variant" class="btn btn-success">Add Variant</button>
            </div>

            <!-- Images Section -->
            <div id="images-section">
                <h4>Product Images</h4>
                <div id="images">
                    <div class="image">
                        <div class="form-group">
                            <label for="image_path">Image Path</label>
                            <input type="file" name="images[0][image_path]" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="button" id="add-image" class="btn btn-success">Add Image</button>
            </div>

            <!-- Details Section -->
            <div id="details-section">
                <h4>Product Details</h4>
                <div id="details">
                    <div class="detail">
                        <div class="form-group">
                            <label for="detail_name">Detail Name</label>
                            <input type="text" name="details[0][detail_name]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="detail_value">Detail Value</label>
                            <textarea name="details[0][detail_value]" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" id="add-detail" class="btn btn-success">Add Detail</button>
            </div>

            <!-- Specifications Section -->
            <div id="specifications-section">
                <h4>Product Specifications</h4>
                <div id="specifications">
                    <div class="specification">
                        <div class="form-group">
                            <label for="specification_name">Specification Name</label>
                            <input type="text" name="specifications[0][specification_name]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="specification_value">Specification Value</label>
                            <textarea name="specifications[0][specification_value]" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" id="add-specification" class="btn btn-success">Add Specification</button>
            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
</x-app-layout>
