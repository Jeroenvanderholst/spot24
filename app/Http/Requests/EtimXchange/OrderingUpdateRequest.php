<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class OrderingUpdateRequest extends FormRequest
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
            'order_unit' => ['required', 'in:ANN,BE,BG,BO,BX,C62,CA,CI,CL,CMK,CMQ,CMT,CQ,CR,CS,CT,D99,DAY,DR,DZN,FOT,FTQ,GRM,HLT,HUR,INH,INQ,KG,KGM,KTM,LBR,LTN,LTR,MGM,MIN,MLT,MMK,MMQ,MMT,MTK,MTQ,MTR,NMP,NPL,NRL,ONZ,PA,PF,PK,PL,PR,PU,RG,RL,RO,SA,SEC,SET,SMI,ST,TN,TNE,TU,WEE,YRD,Z2,Z3'],
            'minimum_order_quantity' => ['required', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'order_step_size' => ['required', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'standard_order_lead_time' => ['nullable', 'integer'],
            'use_unit' => ['nullable', 'in:ANN,BE,BG,BO,BX,C62,CA,CI,CL,CMK,CMQ,CMT,CQ,CR,CS,CT,D99,DAY,DR,DZN,FOT,FTQ,GRM,HLT,HUR,INH,INQ,KG,KGM,KTM,LBR,LTN,LTR,MGM,MIN,MLT,MMK,MMQ,MMT,MTK,MTQ,MTR,NMP,NPL,NRL,ONZ,PA,PF,PK,PL,PR,PU,RG,RL,RO,SA,SEC,SET,SMI,ST,TN,TNE,TU,WEE,YRD,Z2,Z3'],
            'use_unit_conversion_factor' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'single_use_unit_quantity' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'alternative_use_unit' => ['nullable', 'in:ANN,BE,BG,BO,BX,C62,CA,CI,CL,CMK,CMQ,CMT,CQ,CR,CS,CT,D99,DAY,DR,DZN,FOT,FTQ,GRM,HLT,HUR,INH,INQ,KG,KGM,KTM,LBR,LTN,LTR,MGM,MIN,MLT,MMK,MMQ,MMT,MTK,MTQ,MTR,NMP,NPL,NRL,ONZ,PA,PF,PK,PL,PR,PU,RG,RL,RO,SA,SEC,SET,SMI,ST,TN,TNE,TU,WEE,YRD,Z2,Z3'],
            'alternative_use_unit_conversion_factor' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
        ];
    }
}
