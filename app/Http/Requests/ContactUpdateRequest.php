<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactUpdateRequest extends FormRequest
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
        $id = $this->route('contact');


        return [
            "name" => ['required',  Rule::unique('contacts', 'name')->ignore($id)],
            "link" =>  ['required',  Rule::unique('contacts', 'link')->ignore($id)],
            "logo" => "nullable|image|mimes:jpeg,png,jpg"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Contact name is required",
            "name.unique" => "Contact name is already exists",
            "link.required" => "Contact link is required",
            "link.unique" => "Contact link is already exists",
            "logo.mimes" => "Contact logo must jpeg, png, or jpg"
        ];
    }
}
