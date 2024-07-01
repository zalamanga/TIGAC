<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'unique:products,name|required|max:100',
            'sku' => 'nullable|max:25',
            'product_category' => 'required|exists:product_categories,id',
            'price' => 'required|numeric',
            'discount_percent' => 'nullable|numeric|max:100.0',
            'stock' => 'required|integer',
            'active_status' => 'nullable|boolean',
            'is_hot_item' => 'nullable|boolean',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'images_name' => 'nullable|array',
            'image_description' => 'required|array',
            'image_name.*' => 'required',
            'image_description.*' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Product name are required",
            'name.unique' => "Product name already exists",
            'sku.max' => "SKU maximum length are 25",
            'product_category.required' => "Product category are required",
            'product_category_exists' => "Product category not found",
            'price.required' => "Product price are required",
            'discount_percent.max' => "Discount in percent maximum are 100",
            "stock.required" => "Product stock are required",
            "images.*.mimes" => "Image file must jpeg,png,jpg, or gif",
        ];
    }
}
