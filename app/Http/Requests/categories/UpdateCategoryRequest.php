<?php

namespace App\Http\Requests\categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|string|between:2,100',
            'category_id' => 'nullable|integer|exists:categories,id',
        ];
    }

    public function attributes(): array
    {
        return [
          'category_id' => 'Category',
        ];
    }

    public function messages(): array
    {
        return [
          'category_id.integer' => 'category must be a number',
        ];
    }

}
