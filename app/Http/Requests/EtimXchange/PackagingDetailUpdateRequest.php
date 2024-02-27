<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class PackagingDetailUpdateRequest extends FormRequest
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
            'supplier_packaging_part_number' => ['nullable', 'string', 'max:35'],
            'manufacturer_packaging_part_number' => ['nullable', 'string', 'max:35'],
            'manufacturer_packaging_part_gtin' => ['nullable', 'json'],
            'packaging_type_length' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'packaging_type_width' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'packaging_type_height' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'packaging_type_diameter' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'packaging_type_dimension_unit' => ['nullable', 'in:CMT,DTM,KTM,MMT,MTR,FOT,INH,SMI,YRD'],
            'packaging_type_weight' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'packaging_type_weight_unit' => ['nullable', 'in:GRM,KGM,MGM,TNE,LTN,LBR,ONZ'],
            'packaging_stackable' => ['nullable', 'integer'],
            'packaging_identification_id' => ['required', 'integer', 'exists:packaging_identifications,id'],
        ];
    }
}
