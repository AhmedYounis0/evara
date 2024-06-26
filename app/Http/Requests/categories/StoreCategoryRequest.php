<?php

namespace App\Http\Requests\categories;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name'          => 'required|string|unique:categories,name',
            'image'         => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'category_views'=> 'nullable|integer',
            'category_id'   => 'nullable|integer|exists:categories,id',
        ];
    }

    public function attributes(): array
    {
        return [
          'name' => 'Category',
        ];
    }

}
