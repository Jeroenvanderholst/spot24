<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AllowanceSurchargeStoreRequest extends FormRequest
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
            'pricing_id' => ['required', 'integer'],
            'allowance_surcharge_indicator' => ['required', 'in:ALLOWANCE,SURCHARGE'],
            'allowance_surcharge_validity_date' => ['nullable', 'date'],
            'allowance_surcharge_type' => ['required', 'in:AAT,ABL,ADO,ADR,ADZ,AEM,AEO,AEP,AEQ,CAI,DAE,DBD,FC,HD,INS,MAC,MAT,PAD,PI,QD,RAD,SH,TD,WHE,X21'],
            'allowance_surcharge_amount' => ['nullable', 'numeric', 'gt:0', 'between:0,99999999999.9999'],
            'allowance_surcharge_sequence_number' => ['nullable', 'integer'],
            'allowance_surcharge_percentage' => ['nullable', 'numeric', 'gt:0', 'between:0,999.999'],
            'allowance_surcharge_description' => ['nullable', 'json'],
            'allowance_surcharge_minimum_quantity' => ['nullable', 'numeric', 'gt:0', 'between:0,999999999999.9999'],
            'price_id' => ['required', 'integer', 'exists:prices,id'],
        ];
    }
}
