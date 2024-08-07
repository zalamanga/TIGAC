<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsletterUpdateRequest extends FormRequest
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
        $id = $this->route('newsletter');

        return [
            "title" => ['required',  Rule::unique('newsletters', 'title')->ignore($id)],
            "content" => ['required',  Rule::unique('newsletters', 'content')->ignore($id)],
            "thumbnail" => "nullable|mimes:jpeg,jpg,png",
            "thumbnail_short_description" => "nullable"
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Newsletter title is required',
            'title.unique' => 'Newsletter title is already exists',
            'content.required' => 'Newsletter content is already exists',
            'content.unique' => 'Newsletter content is already exists',
            'thumbnail.required' => 'Newsletter thumbnail is required',
            'thumbnail.mimes' => 'Newsletter thumbnail must be an image (jpeg, jpg, or png)',
        ];
    }
}
