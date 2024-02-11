<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class EtimModellingPortUpdateRequest extends FormRequest
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
            'etim_modelling_portcode' => ['required', 'integer'],
            'etim_modelling_connection_type_code' => ['required', 'string', 'max:8'],
            'etim_modelling_connection_type_version' => ['required', 'integer'],
            'etim_classification_id' => ['required', 'integer', 'exists:etim_classifications,id'],
        ];
    }
}
