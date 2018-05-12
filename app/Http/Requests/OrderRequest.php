<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_name' => 'required',
            'shipping_name' => 'required',
            'shipping_address' => 'required',
            'billing_name' => 'required',
            'billing_address' => 'required',
            'customer_email' => 'required',
            'phone' => 'required',
            'price' => 'required',
        ];
    }
}
