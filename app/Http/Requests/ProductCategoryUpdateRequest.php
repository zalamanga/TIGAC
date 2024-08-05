<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCategoryUpdateRequest extends FormRequest
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
        $id = $this->route('productCategoryId');

        return [
            'name' => ['required', 'max:100',  Rule::unique('product_categories', 'name')->ignore($id)],
            'description' => 'nullable|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Product category name is required",
            'name.unique' => "Product category already exists"
        ];
    }
}
