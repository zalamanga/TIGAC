<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'answer' => "required|unique:faqs,answer",
            'question' => "required|unique:faqs,question",
        ];
    }

    public function messages()
    {
        return [
            'answer.unique' => 'This answer already exists',
            'answer.required' => 'Answer field is required',
            'question.unique' => 'This question already exists',
            'question.required' => 'Question field is required',
        ];
    }
}
