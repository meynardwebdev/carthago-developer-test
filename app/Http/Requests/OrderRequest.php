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
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'date_ordered' => ['required', 'date'],
            'date_shipped' => ['required', 'date'],
            'status' => ['required', 'string'],
            'comments' => ['nullable', 'string'],
            'customer_id' => ['nullable', 'integer'],
        ];
    }
}
