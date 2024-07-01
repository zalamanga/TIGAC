<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductVariantUpdateRequest extends FormRequest
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
            'name' => 'required|max:50',
            'description' => 'nullable|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Product category name is required",
            'name.max' => "Product category name maximum 50 character",
            'description.max' => "Product category description maximum 50 character",
        ];
    }
}
