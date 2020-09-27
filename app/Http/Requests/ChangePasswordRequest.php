<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => 'bail|required|min:8',
            'new_password' => 'bail|required|min:8',
            'repeat_password' => 'bail|required|same:new_password'
        ];
    }

    public function mesages()
    {
        return [
            //
        ];
    }
}
