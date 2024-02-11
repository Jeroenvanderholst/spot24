<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class CatalogueUpdateRequest extends FormRequest
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
            'catalogue_id' => ['required', 'string', 'max:20', 'unique:catalogues,catalogue_id'],
            'catalogue_name' => ['nullable', 'json'],
            'version' => ['nullable', 'string', 'max:50'],
            'contract_reference_number' => ['nullable', 'string', 'max:20'],
            'catalogue_type' => ['required', 'in:FULL,CHANGE'],
            'change_reference_catalogue_version' => ['nullable', 'string', 'max:50'],
            'generation_date' => ['nullable', 'date'],
            'name_data_creator' => ['nullable', 'string', 'max:50'],
            'email_data_creator' => ['nullable', 'email', 'max:255'],
            'buyer_name' => ['nullable', 'string', 'max:50'],
            'buyer_id_gln' => ['nullable', 'string', 'max:13'],
            'buyer_id_duns' => ['nullable', 'string', 'max:9'],
            'datapool_name' => ['nullable', 'string', 'max:50'],
            'datapool_gln' => ['nullable', 'string', 'max:13'],
            'catalogue_validity_start' => ['required', 'date'],
            'catalogue_validity_end' => ['nullable', 'date'],
            'country' => ['nullable', 'string', 'max:2'],
            'language' => ['required', 'string', 'max:5'],
            'currency_code' => ['nullable', 'string', 'max:3'],
        ];
    }
}
