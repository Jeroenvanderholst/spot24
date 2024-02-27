<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class PackagingIdentificationStoreRequest extends FormRequest
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
            'supplier_packaging_number' => ['nullable', 'string', 'max:35'],
            'manufacturer_packaging_number' => ['nullable', 'string', 'max:35'],
            'packaging_gtin' => ['nullable', 'json'],
            'packaging_type_code' => ['required', 'in:BE,BG,BJ,BO,BR,BX,C62,CA,CL,CQ,CR,CS,CT,CY,D99,DR,EV,KG,NE,PA,PF,PK,PL,PR,PU,RG,RL,RO,SA,SET,TN,TU,WR,Z2,Z3'],
            'packaging_quantity' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'trade_item_primary_packaging' => ['nullable'],
            'packaging_gs1_code128' => ['nullable', 'string', 'max:48'],
            'packaging_recyclable' => ['nullable'],
            'packaging_reusable' => ['nullable'],
            'packaging_break' => ['nullable'],
            'number_of_packaging_parts' => ['nullable', 'integer'],
        ];
    }
}
