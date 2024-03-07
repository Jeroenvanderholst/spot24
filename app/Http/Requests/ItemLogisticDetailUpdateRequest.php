<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemLogisticDetailUpdateRequest extends FormRequest
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
            'base_item_net_length' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'base_item_net_width' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'base_item_net_height' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'base_item_net_diameter' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'net_dimension_unit' => ['nullable', 'in:CMT,DTM,KTM,MMT,MTR,FOT,INH,SMI,YRD'],
            'base_item_net_weight' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'net_weight_unit' => ['nullable', 'in:GRM,KGM,MGM,TNE,LTN,LBR,ONZ'],
            'base_item_net_volume' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'net_volume_unit' => ['nullable', 'in:LTR,MLT,MMQ,MTQ,FTQ,INQ'],
        ];
    }
}
