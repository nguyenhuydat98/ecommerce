<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Product;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('products', 'name')->ignore($this->product),
            ],
            'brand' => 'required',
            'category_id' => 'bail|required|numeric',
            'description' => 'required',
            'original_price' => 'bail|required|numeric',
            'current_price' => 'bail|required|numeric|lt:original_price',
        ];
    }
}
