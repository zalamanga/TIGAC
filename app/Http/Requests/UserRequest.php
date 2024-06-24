<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'unique:users,email|required|max:255',
            'password' =>'required|min:8|same:cpassword',
            'cpassword' =>'required|min:8'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "User name is required",
            'email.required' => "Email is required",
            'email.unique' => "Email is already exists",
            'password.required' => "Password is required"
        ];
    }
}
