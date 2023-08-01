<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProducts extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'bail|min:1|max:50|required',
            'price' => 'required|min:1|max:10|',
            'description' => 'min:0|max:50',
            'category_id' => 'required|exists:categories,id',
            'variation_id' => 'required|exists:variations,id',
            'brand_id' => 'required|exists:brands,id',
            'on_pressed' => 'numeric|min:1|max:100',
            'thumbnail' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|dimensions:max_height=1385, max_width=1421, min_height=693, min_width=711',
            'quantity' => 'numeric|min:1|max:100',
        ];
    }
}
