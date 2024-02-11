<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class LcaEnvironmentalStoreRequest extends FormRequest
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
            'declared_unit_unit' => ['required', 'in:KGM,LTR,MTK,MTQ,MTR,PCE,TNE,FOT,FTK,FTQ,LBR,LTN,YDK,YRD'],
            'declared_unit_quantity' => ['required', 'numeric', 'gt:0', 'between:0,9999999.9999'],
            'functional_unit_description' => ['nullable', 'json'],
            'lca_reference_lifetime' => ['required', 'integer'],
            'third_party_verification' => ['required', 'in:none,internally,externally'],
            'manufacturer_product_gtin' => ['required', 'string', 'max:14'],
        ];
    }
}
