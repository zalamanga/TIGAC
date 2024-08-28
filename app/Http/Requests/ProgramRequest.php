<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use RealRashid\SweetAlert\Facades\Alert;

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
            'store_name' => 'required|max:100|unique:programs,store_name',
            'phone_number' => 'required|max_digits:20|numeric',
            'email' => 'required|max:100|email',
            'address' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Alert::error('Error', 'Failed Register to Program, Please Check Register Form Below');

        throw new HttpResponseException(
            redirect()
                ->route('pages.frontend.program')
                ->withErrors($validator)
                ->withInput()
        );
    }
}
