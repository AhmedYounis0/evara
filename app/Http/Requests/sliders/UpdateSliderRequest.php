<?php

namespace App\Http\Requests\sliders;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'header' => 'required|string',
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'content' => 'required|string',
            'url' => 'nullable|url',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
