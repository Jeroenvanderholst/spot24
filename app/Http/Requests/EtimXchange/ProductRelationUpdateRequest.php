<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class ProductRelationUpdateRequest extends FormRequest
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
            'related_manufacturer_product_number' => ['required', 'string', 'max:35'],
            'related_manufacturer_product_gtin' => ['nullable', 'string', 'max:14'],
            'relation_type' => ['required', 'in:ACCESSORY,MAIN_PRODUCT,CONSISTS_OF,CROSS-SELLING,MANDATORY,SELECT,SIMILAR,SPAREPART,UPSELLING,SUCCESSOR,PREDECESSOR,OTHER'],
            'related_product_quantity' => ['required', 'integer'],
        ];
    }
}
