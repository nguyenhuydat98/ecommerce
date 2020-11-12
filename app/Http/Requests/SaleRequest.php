<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Sale;

class SaleRequest extends FormRequest
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
            'code' => [
                'required',
                Rule::unique('sales', 'code')->ignore($this->sale),
            ],
            'name' => 'required',
            'category_id' => 'bail|nullable|numeric',
            'description' => 'required',
            'type' => 'bail|required|numeric',
            'detail_sale' => 'bail|required|numeric',
            'start_date' => 'bail|required|date',
            'end_date' => 'bail|required|date|after:start_date',
        ];
    }
}
