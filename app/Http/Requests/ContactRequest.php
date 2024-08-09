<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "name" => "required|unique:contacts,name",
            "link" => "required|unique:contacts,link",
            "logo" => "required|image|mimes:jpeg,png,jpg"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Contact name is required",
            "name.unique" => "Contact name is already exists",
            "link.required" => "Contact link is required",
            "link.unique" => "Contact link is already exists",
            "logo.required" => "Contact logo is required",
            "logo.mimes" => "Contact logo must jpeg, png, or jpg"
        ];
    }
}
