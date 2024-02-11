<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetailStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'integer'],
            'manufacturer_product_number' => ['required', 'string', 'max:35'],
            'product_status' => ['required', 'in:PRE-LAUNCH,ACTIVE,ON_HOLD,PLANNED_WITHDRAWAL,OBSOLETE'],
            'product_type' => ['nullable', 'in:PHYSICAL,CONTRACT,LICENCE,SERVICE'],
            'customisable_product' => ['nullable'],
            'warranty_consumer' => ['nullable', 'integer'],
            'warranty_business' => ['nullable', 'integer'],
        ];
    }
}
