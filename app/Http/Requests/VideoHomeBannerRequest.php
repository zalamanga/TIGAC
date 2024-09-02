<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoHomeBannerRequest extends FormRequest
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
            'name' => 'required|Max:50',
            'description' => 'nullable|Max:255',
            'video' => 'mimes:mp4'
        ];
    }

    public function messages()
    {
        return [
            'vide.mimes' => "Make sure it's a .mp4 video"
        ];
    }
}
