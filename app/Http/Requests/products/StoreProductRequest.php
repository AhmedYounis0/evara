<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|numeric',
            'offer' => 'nullable|numeric',
            'stock' => 'required|numeric',
            'sku' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
        ];
    }


    public function attributes(): array
    {
        return [
            'category_id' => 'category'
        ];
    }

}
