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
        return [
            'name' => ['required', 'string'],
            'sku' => ['required', 'string'],
            'description' => ['required', 'string'],
            'vendor' => ['required', 'string'],
            'quantity_in_stock' => ['nullable', 'integer'],
            'price' => ['required'],
            'msrp' => ['required'],
            'product_line_id' => ['required', 'integer'],
        ];
    }
}
