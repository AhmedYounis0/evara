<?php

namespace App\Http\Requests\blogs;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'title' => 'Required|string|min:6',
            'description' => 'Required|string',
            'image' => 'Required|mimes:jpg,jpeg,png|max:2048',
            'blog_category_id' => 'Required|exists:blog_categories,id'
        ];
    }

    public function attributes(): array
    {
        return [
            'blog_category_id' => 'Blog Category',
        ];
    }
}
