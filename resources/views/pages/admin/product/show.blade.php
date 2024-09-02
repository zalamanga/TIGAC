@extends('layouts.admin.main')
@section('content')
    {{-- @if ($errors->any())
        {{ dd($errors->all()) }}
    @endif --}}

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form
                    action="{{ Route::is(route('admin.products.show', $product->id)) ? route('admin.products.show', $product->id) : route('admin.products.update', $product->id) }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @if (Route::is('admin.products.edit'))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <p class="h2">Product Identity Detail</p>
                        <div class="col-4 lg-col-12">
                            <x-input name="name" type="text" placeholder="Product Name" title="Name"
                                class="{{ $product && Route::is('admin.products.show') ? 'form-control-plaintext' : 'form-control' }}"
                                isRequired="true" value="{{ $product ? $product->name : old('name') }}">
                            </x-input>
                        </div>
                        <div class="col-4 lg-col-12">
                            <x-input name="sku" type="text" placeholder="Product SKU" title="SKU"
                                class="{{ $product && Route::is('admin.products.show') ? 'form-control-plaintext' : 'form-control' }}"
                                isRequired="false"
                                value="{{ $product ? ($product->sku ? $product->sku : '-') : old('sku') }}">
                            </x-input>
                        </div>
                        <div class="col-12 col-lg-4">
                            <x-input name="product_external_link" type="text" placeholder="Product External Link"
                                title="Product External Link"
                                class="{{ $product && Route::is('admin.products.show') ? 'form-control-plaintext' : 'form-control' }}"
                                isRequired="false"
                                value="{{ $product ? ($product->sku ? $product->sku : '-') : old('sku') }}">
                            </x-input>
                        </div>
                        <div class="col-4 lg-col-12">
                            <div class="form-group">
                                <label for="product_category">Product Category <span class="text-danger">*</span></label>
                                @if (Route::is('admin.products.show'))
                                    <input type="text" class="form-control-plaintext"
                                        value="{{ $product ? $product->productCategory->name : '-' }}">
                                @else
                                    <select class="form-select" id="product_category" name="product_category_id"
                                        data-placeholder="Choose Category" required>
                                        @foreach ($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}"
                                                {{ $product->productCategory->id == $productCategory->id ? 'selected' : '' }}>
                                                {{ $productCategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_category')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>
                        </div>
                        <div class="col-4 lg-col-12">
                            <div class="form-group">
                                <label for="product_category">Product Variant</label>
                                @if (Route::is('admin.products.show'))
                                    <input type="text" class="form-control-plaintext"
                                        value="{{ $product ? implode(', ', $productVariants) : '-' }}">
                                    @else{{ $product ? $product->name : old('name') }}
                                    <select class="choices form-select multiple-remove" name="product_variants[]"
                                        multiple="multiple" data-placeholder="Choose Variants">
                                        @foreach ($productVariantSelections as $productVariantSelection)
                                            <option value="{{ $productVariantSelection->id }}"
                                                {{ old('product_variants[]', $product->variants->contains($productVariantSelection->id)) == $productVariantSelection->name ? 'selected' : '' }}>
                                                {{ $productVariantSelection->name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-4 lg-col-12">
                            <div class="form-group">
                                <label for="price">Base Price <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    @if (Route::is('admin.products.show'))
                                        <input class="form-control-plaintext"
                                            value="{{ 'Rp.' . number_format($product->price, 2, ',', '.') }}"></input>
                                    @else
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" class="form-control" name="price" required
                                            value="{{ old('price', $product->price) }}">
                                        <span class="input-group-text">,00</span>
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-4 lg-col-12">
                            <div class="form-group">
                                <label for="discount_percent">Discount in Percent</label>
                                @if (Route::is('admin.products.show'))
                                    <input
                                        type="text"{{ $product && Route::is('admin.products.show') ? 'form-control-plaintext' : 'form-control' }}
                                        class="form-control-plaintext" value="{{ $product->discount_percent . '%' }}">
                                @else
                                    <div class="input-group">
                                        <input type="number" max="100" class="form-control" name="discount_percent"
                                            value="{{ old('discount_percent', $product->discount_percent) }}">
                                        <span class="input-group-text">%</span>
                                        @error('discount_percent')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-4 lg-col-12">
                            <x-input name="stock" type="number" placeholder="Product Total Stock" title="Stock"
                                class="{{ $product && Route::is('admin.products.show') ? 'form-control-plaintext' : 'form-control' }}"
                                isRequired="true" value="{{ $product ? $product->stock : old('stock') }}">
                            </x-input>
                        </div>
                        <div class="col-4 lg-col-12">
                            <div class="form-group">
                                <label for="is_active">Is Device <span class="text-danger">*</span></label>
                                @if (Route::is('admin.products.show'))
                                    <input type="text" class="form-control-plaintext"
                                        value="{{ $product->is_device == 1 ? 'Yes' : 'No' }}">
                                @else
                                    <select class="form-select" id="inputGroupSelect02" name="is_device">
                                        <option value="1" {{ $product->is_device == '1' ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="0" {{ $product->is_device == '0' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-4 lg-col-12">
                            <div class="form-group">
                                <label for="is_active">Is Collaboration Project <span class="text-danger">*</span></label>
                                @if (Route::is('admin.products.show'))
                                    <input type="text" class="form-control-plaintext"
                                        value="{{ $product->is_collaboration_project == 1 ? 'Yes' : 'No' }}">
                                @else
                                    <select class="form-select" id="inputGroupSelect02" name="is_collaboration_project">
                                        <option value="1"
                                            {{ $product->is_collaboration_project == '1' ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="0"
                                            {{ $product->is_collaboration_project == '0' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-4 lg-col-12">
                            <div class="form-group">
                                <label for="is_active">Active Status <span class="text-danger">*</span></label>
                                @if (Route::is('admin.products.show'))
                                    <input type="text" class="form-control-plaintext"
                                        value="{{ $product->is_active == 1 ? 'Active' : 'Not Active' }}">
                                @else
                                    <select class="form-select" id="inputGroupSelect02" name="is_active">
                                        <option value="1" {{ $product->is_active == '1' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $product->is_active == '0' ? 'selected' : '' }}>Not
                                            Active
                                        </option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-4 lg-col-12">
                            <div class="form-group">
                                <label for="is_hot_item">Hot Item Status <span class="text-danger">*</span></label>
                                @if (Route::is('admin.products.show'))
                                    <input type="text" class="form-control-plaintext"
                                        value="{{ $product->is_hot_item == 1 ? 'Hot Item' : 'Not Hot Item' }}">
                                @else
                                    <select class="form-select" id="inputGroupSelect02" name="is_hot_item">
                                        <option value="1" {{ $product->is_hot_item == '1' ? 'selected' : '' }}>Hot
                                            Item</option>
                                        <option value="0" {{ $product->is_hot_item == '0' ? 'selected' : '' }}>Not
                                            Hot Item</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                @if (Route::is('admin.products.show'))
                                    <label for="email-id-vertical">Description <span class="text-danger">*</span></label>
                                    <div>{!! $product->description !!}</div>
                                @else
                                    <label for="email-id-vertical">Description <span class="text-danger">*</span></label>
                                    <textarea type="text" id="email-id-vertical" class="form-control richtextarea" name="description"
                                        placeholder="Product Description" rows="30">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                @endif

                            </div>
                        </div>
                    </div>
                    <p class="h2">Product Images</p>
                    <div class="d-flex gap-3">
                        @foreach ($productImages as $productImage)
                            <div class="card rounded-0" style="width: 18rem;">
                                <img src="{{ asset('storage/' . $productImage->image_path) }}"
                                    class="card-img-top rounded-0" alt="{{ $productImage->description }}">
                                <div class="card-body">
                                    <p class="card-text text-center">{{ $productImage->name }}</p>
                                    <div class="text-center">
                                        @if (Route::is('admin.products.edit'))
                                            <a href="{{ route('admin.products.images.delete', [$product->id, $productImage->id]) }}"
                                                class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if (Route::is('admin.products.edit'))
                        <div class="row">
                            <p class="h2">Add Product Media</p>
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
                                            <label for="images_{{ $index }}">Image File
                                                {{ $index + 1 }}</label>
                                            <input type="file" name="images[]" class="form-control"
                                                value="{{ old('images' . $index) }}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    @endif
                    {{-- <div class="row">
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
                    </div> --}}
                    <div class="col-12 d-flex justify-content-end mt-2">
                        @if (Route::is('admin.products.show'))
                            <a href="{{ route('admin.products.edit', $product->id) }}" type="submit"
                                class="btn btn-primary me-1 mb-1">Edit</a>
                        @else
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        @endif
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
