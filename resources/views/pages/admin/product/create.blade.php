@extends('layouts.admin.main')
@section('content')
    {{-- @if ($errors->any())
        {{ dd($errors->all()) }}
    @endif --}}

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="row">
                        <p class="h2">Product Identity Detail</p>
                        <div class="col-4">
                            <x-input name="name" type="text" placeholder="Product Name" title="Name"
                                class="form-control" isRequired="true" value="{{ old('name') }}">
                            </x-input>
                        </div>
                        <div class="col-4">
                            <x-input name="sku" type="text" placeholder="Product SKU" title="SKU"
                                class="form-control" isRequired="false" value="{{ old('sku') }}">
                            </x-input>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="product_category">Product Category <span class="text-danger">*</span></label>
                                <select class="form-select" id="product_category" name="product_category_id"
                                    data-placeholder="Choose Category" required>
                                    @foreach ($productCategories as $productCategory)
                                        <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_category')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="product_category">Product Variant</label>
                                <select class="choices form-select multiple-remove" name="product_variants[]"
                                    multiple="multiple" data-placeholder="Choose Variants">
                                    @foreach ($productVariants as $productVariant)
                                        <option value="{{ $productVariant->id }}" {{ (old('product_variants[]') == $productVariant->name ? "selected":"") }}>{{ $productVariant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="price">Base Price <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control" name="price" required
                                        value="{{ old('price') }}">
                                    <span class="input-group-text">,00</span>
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="discount_percent">Discount in Percent</label>
                                <div class="input-group">
                                    <input type="number" max="100" class="form-control" name="discount_percent"
                                        value="{{ old('discount_percent') }}">
                                    <span class="input-group-text">%</span>
                                    @error('discount_percent')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <x-input name="stock" type="number" placeholder="Product Total Stock" title="Stock"
                                class="form-control" isRequired="true" value="{{ old('stock') }}">
                            </x-input>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="is_active">Active Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="inputGroupSelect02" name="is_active">
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="is_hot_item">Hot Item Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="inputGroupSelect02" name="is_hot_item">
                                    <option value="1">Hot Item</option>
                                    <option value="0">Not Hot Item</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email-id-vertical">Description <span class="text-danger">*</span></label>
                                <textarea type="text" id="email-id-vertical" class="form-control" name="description"
                                    placeholder="Product Description" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p class="h2">Product Media (Images)</p>
                        <div class="form-group">
                            <label for="total_image">How Much Image This Product Have?</label>
                            <input type="number" class="form-control total-image-input" id="totalImageNumberInput">
                            <a class="btn btn-primary mt-2" onclick="generateImageInput()">Add Images</a>
                        </div>
                        <div class="product-image-input" id="imageInputWrapper">
                            @if (old('image_name'))
                                @foreach (old('image_name') as $index => $imageName)
                                    <div class='form-group'>
                                        <label for="image_{{ $index }}">Image name {{ $index + 1 }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="image_name[]" class="form-control"
                                            value="{{ $imageName }}">
                                    </div>
                                    <div class='form-group'>
                                        <label for="description_{{ $index }}">Image Description
                                            {{ $index + 1 }}</label>
                                        <textarea type="text" name="image_description[]" class="form-control">{{ old('image_description.' . $index) }}</textarea>
                                    </div>
                                    <div class='form-group'>
                                        <label for="images_{{ $index }}">Image File {{ $index + 1 }}</label>
                                        <input type="file" name="images[]" class="form-control"
                                            value="{{ old('images' . $index) }}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-2">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light me-1 mb-1">Reset</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-light-secondary me-1 mb-1">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function getTotalImageNumber() {
                let totalImageNumberInput = document.getElementById('totalImageNumberInput');

                let totalNumber = totalImageNumberInput.value;

                return totalNumber;
            }

            function generateImageInput() {
                let totalImageNumber = getTotalImageNumber();

                let imageInputWrapper = document.getElementById('imageInputWrapper');
                imageInputWrapper.innerHTML = ''; // Clear existing content if any

                for (let i = 0; i < totalImageNumber; i++) {
                    let imageInputFormGroup = document.createElement('div');
                    imageInputFormGroup.className = 'form-group'; // Optional: Add a class for styling
                    imageInputFormGroup.innerHTML = `
                <div class='form-group'>
                    <label for="image_${i}">Image name ${i + 1} <span class="text-danger">*</span></label>
                    <input type"text" name="image_name[]" class="form-control" value={{ old('image_name[]') }} required>
                </div>
                <div class='form-group'>
                    <label for="description_${i}">Image Description ${i + 1}</label>
                    <textarea type"text" name="image_description[]" class="form-control" value={{ old('image_description[]') }}></textarea>
                </div>
                <div class='form-group'>
                    <label for="images_${i}">Image File ${i + 1}</label>
                    <input type="file" name="images[]" class="form-control" required>
                </div>
            `;
                    imageInputWrapper.appendChild(imageInputFormGroup);
                }

                console.log(totalImageNumber);
            }
        </script>
    @endpush
@endsection
