<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class EtimValueMatrixUpdateRequest extends FormRequest
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
            'etim_modelling_feature_id' => ['required', 'integer'],
            'etim_modelling_class_id' => ['required', 'string', 'max:8'],
            'etim_feature_id' => ['required', 'string', 'max:8'],
            'etim_value_matrix_source' => ['required', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'etim_value_matrix_result' => ['required', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
        ];
    }
}
