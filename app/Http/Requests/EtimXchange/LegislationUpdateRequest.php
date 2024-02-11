<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class LegislationUpdateRequest extends FormRequest
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
            'electric_component_contained' => ['nullable'],
            'battery_contained' => ['nullable'],
            'weee_category' => ['nullable', 'in:1,2,3,4,5,6,7'],
            'rohs_indicator' => ['nullable', 'in:true,false,exempt'],
            'ce_marking' => ['nullable'],
            'sds_indicatobigintr' => ['nullable'],
            'reach_indicator' => ['nullable', 'in:true,false,no data'],
            'reach_date' => ['nullable', 'date'],
            'scip_number' => ['nullable', 'string', 'max:36'],
            'ufi_code' => ['nullable', 'string', 'max:19'],
            'un_number' => ['nullable', 'string', 'max:4'],
            'hazard_class' => ['required', 'json'],
            'adr_category' => ['nullable', 'in:0,1,2,3,4'],
            'net_weight_hazardous_substances' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'volume_hazardous_substances' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'un_shipping_name' => ['nullable', 'json'],
            'packing_group' => ['nullable', 'in:I,II,III'],
            'limited_quantities' => ['nullable'],
            'excepted_quantities' => ['nullable'],
            'aggregation_state' => ['nullable', 'in:L,S,G'],
            'special_provision_id' => ['nullable', 'json'],
            'classification_code' => ['nullable', 'string', 'max:5'],
            'hazard_label' => ['nullable', 'json'],
            'environmental_hazards' => ['nullable'],
            'tunnel_code' => ['nullable', 'in:A,B,C,D,E'],
            'label_code' => ['nullable', 'json'],
            'signal_word' => ['nullable', 'in:D,W'],
            'hazard_statement' => ['nullable', 'json'],
            'precautionary_statement' => ['nullable', 'json'],
            'li_ion_tested' => ['nullable'],
            'lithium_amount' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'battery_energy' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'nos274' => ['nullable'],
            'hazard_trigger' => ['nullable', 'json'],
        ];
    }
}
