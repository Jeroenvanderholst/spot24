<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class EnclosedTradeItemUpdateRequest extends FormRequest
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
            'packaging_id' => ['required', 'integer'],
            'supplier_item_number' => ['nullable', 'string', 'max:35'],
            'supplier_item_gtin' => ['nullable', 'string', 'max:14'],
            'manufacturer_item_number' => ['nullable', 'string', 'max:35'],
            'manufacturer_item_gtin' => ['nullable', 'string', 'max:14'],
            'enclosed_item_quantity' => ['required', 'integer'],
            'packaging_identification_id' => ['required', 'integer', 'exists:packaging_identifications,id'],
        ];
    }
}
