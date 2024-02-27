<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class ItemRelationStoreRequest extends FormRequest
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
            'trade_item_id' => ['required', 'integer'],
            'related_supplier_item_number' => ['required', 'string', 'max:35'],
            'related_manufacturer_item_number' => ['nullable', 'string', 'max:35'],
            'item_gtin' => ['nullable', 'json'],
            'relation_type' => ['required', 'in:ACCESSORY,MAIN_PRODUCT,CONSISTS_OF,CROSS-SELLING,MANDATORY,SELECT,SIMILAR,SPAREPART,UPSELLING,SUCCESSOR,PREDECESSOR,OTHER'],
            'related_item_quantity' => ['required', 'integer'],
        ];
    }
}
