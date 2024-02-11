<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class LcaDeclarationStoreRequest extends FormRequest
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
            'lca_environmental_id' => ['required', 'string', 'max:35'],
            'life_cycle_stage' => ['required', 'in:A1,A2,A3,A1-A3,A4,A5,B1,B2,B3,B4,B5,B6,B7,C1,C2,C3,C4,D'],
            'lca_declaration_indicator' => ['required', 'in:MDE,MND,MNR,AGG'],
            'declared_unit_gwp_total' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'declared_unit_ap' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'declared_unit_ep_freshwater' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'declared_unit_ep_marine' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'declared_unit_ep_terrestrial' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'declared_unit_pocp' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'declared_unit_odp' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'declared_unit_adpe' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'declared_unit_adpf' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'declared_unit_wdp' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'declared_unit_pert' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'declared_unit_penrt' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'column_17' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
        ];
    }
}
