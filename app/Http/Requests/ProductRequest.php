<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $id = $this->segment(2);
        return [
            'name' => 'required|unique:products,name,' . $id,
            'product_type_id' => 'required|exists:product_types,id'
        ];
    }

    public function attributes()
    {
        return [
            'product_type_id' => 'Product Type'
        ];
    }
}
