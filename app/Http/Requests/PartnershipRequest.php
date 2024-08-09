<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnershipRequest extends FormRequest
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
            "name" => "required|unique:partnerships,name",
            "description" => "nullable",
            "logo" => "required|image|mimes:jpeg,png,jpg",
            "is_active" => "boolean",
            "external_link" => "nullable"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Partner name is required",
            "name.unique" => "Partner name is already exists",
            "logo.mimes" => "Partner logo file must jpeg, png, or jpg",
            "logo.required" => "Partner logo is required",
        ];
    }
}
