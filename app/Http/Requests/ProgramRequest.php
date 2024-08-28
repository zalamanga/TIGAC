<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
            'pic' => 'required|max:100',
            'store_name' => 'required|max:100',
            'phone_number' => 'required|max:100|numeric',
            'email' => 'required|max:100|email',
            'address' => 'required',
        ];
    }
}
