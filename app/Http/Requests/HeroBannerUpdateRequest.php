<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HeroBannerUpdateRequest extends FormRequest
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
        $id = $this->route('hero_banner');

        return [
            'name' => ['required', 'max:100',  Rule::unique('hero_banners', 'name')->ignore($id)],
            'tagline' => ['required', 'max:255', Rule::unique('hero_banners', 'tagline')->ignore($id)],
            'tagline_description' => ['required', Rule::unique('hero_banners', 'tagline_description')->ignore($id)],
            'is_active' => 'required|boolean',
            'is_priority' => 'required|boolean',
            'media' => 'nullable'
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
        ];
    }
}
