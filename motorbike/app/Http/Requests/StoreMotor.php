<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMotor extends FormRequest
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
            'model' => 'required|max:100',
            'cc' => 'required|integer|min:1',
            'weight' => 'required|digits:3',
            'price' => 'required|numeric',
            'color' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
