<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroBannerRequest extends FormRequest
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
            'name' => 'unique:hero_banners,name|required|max:100',
            'tagline' => 'unique:hero_banners,tagline|required|max:255',
            'tagline_description' => 'unique:hero_banners,tagline_description|required',
            'is_active' => 'required|boolean',
            'is_priority' => 'required|boolean',
            'is_for_product_page' => 'required|boolean',
            'media' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Hero banner name is already exists',
            'name.required' => 'Hero banner name is required',
            'name.max' => 'Hero banner name maximum is 100 character',
            'tagline.unique' => 'Hero banner tagline is already exists',
            'tagline.required' => 'Hero banner tagline is required',
            'tagline.max' => 'Hero banner maximum is 255 character',
            'tagline_description.unique' => 'Hero banner tagline description is already exists',
            'tagline_description.required' => 'Hero banner tagline description is required',
            'media_type.required' => 'Media type is required',
            'media_path.required' => 'Media path is required',
            'media.required' => 'Hero banner media is required'
        ];
    }
}
