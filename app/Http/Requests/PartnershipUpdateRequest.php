<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PartnershipUpdateRequest extends FormRequest
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
        $id = $this->route('partnership');

        return [
            'name' => ['required', 'max:100',  Rule::unique('partnerships', 'name')->ignore($id)],
            "description" => "nullable",
            "logo" => "nullable|image|mimes:jpeg,png,jpg",
            "is_active" => "boolean",
            "external_link" => "nullable"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Partner name is required",
            "logo.mimes" => "Partner logo file must jpeg, png, or jpg",
        ];
    }
}
