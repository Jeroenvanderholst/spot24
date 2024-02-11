<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class PriceStoreRequest extends FormRequest
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
            'supplier_item_number' => ['required', 'string', 'max:35'],
            'price_unit' => ['required', 'in:ANN,BE,BG,BO,BX,C62,CA,CI,CL,CMK,CMQ,CMT,CQ,CR,CS,CT,D99,DAY,DR,DZN,FOT,FTQ,GRM,HLT,HUR,INH,INQ,KG,KGM,KTM,LBR,LTN,LTR,MGM,MIN,MLT,MMK,MMQ,MMT,MTK,MTQ,MTR,NMP,NPL,NRL,ONZ,PA,PF,PK,PL,PR,PU,RG,RL,RO,SA,SEC,SET,SMI,ST,TN,TNE,TU,WEE,YRD,Z2,Z3'],
            'price_unit_factor' => ['nullable', 'numeric', 'gt:0', 'between:0,99999999999.9999'],
            'price_quantity' => ['required', 'numeric', 'gt:0', 'between:0,99999.9999'],
            'price_on_request' => ['nullable'],
            'gross_list_pricec' => ['nullable', 'numeric', 'gt:0', 'between:0,99999999999.9999'],
            'net_price' => ['nullable', 'numeric', 'gt:0', 'between:0,99999999999.9999'],
            'recommended_retail_price' => ['nullable', 'numeric', 'gt:0', 'between:0,99999999999.9999'],
            'vat' => ['nullable', 'numeric', 'gt:0', 'between:0,99.99'],
            'price_validity_date' => ['nullable', 'date'],
            'price_expiry_date' => ['nullable', 'date'],
        ];
    }
}
