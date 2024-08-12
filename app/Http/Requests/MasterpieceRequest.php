<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterpieceRequest extends FormRequest
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
            "name" => "required|unique:masterpieces,name",
            "slug" => "required|unique:masterpieces,slug",
            "detail_link" => "required|unique:masterpieces,detail_link",
            "thumbnail" => "required|mimes:jpeg,jpg,png",
            "thumbnail_short_description" => "nullable",
            "is_active" => "boolean|required"
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Masterpiece name is required',
            'name.unique' => 'Masterpiece name is already exists',
            'slug.required' => 'Masterpiece slug is required',
            'slug.unique' => 'Masterpiece slug is already exists',
            'detail_link.required' => 'Masterpiece detail link is required',
            'detail_link.unique' => 'Masterpiece detail link is already exists',
            'thumbnail.required' => 'Masterpiece thumbnail is required',
            'thumbnail.mimes' => 'Masterpiece thumbnail must be an image (jpeg, jpg, or png)',
        ];
    }
}
