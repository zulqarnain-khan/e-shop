<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
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
            'pro_title' => 'required',
            'pro_price' => 'required',
            'pro_quantity' => 'required',
            'pro_size' => 'required',
            'image' => 'required',
            'pro_short_description' => 'required',
            'pro_long_description' => 'required',
        ];
    }
}
