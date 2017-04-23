<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductionDataRequest extends FormRequest
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
            'date' => 'required|date',
            'product_id' => 'required',
            'product_type_id' => 'required',
            'quantity_produced' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'product_id' => 'Product',
            'product_type_id' => 'Product Type'
        ];
    }
}
