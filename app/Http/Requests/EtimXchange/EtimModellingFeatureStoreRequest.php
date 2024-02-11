<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class EtimModellingFeatureStoreRequest extends FormRequest
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
            'etim_modelling_port_id' => ['required', 'integer'],
            'product_id' => ['required', 'integer'],
            'etim_modelling_class_code' => ['required', 'string'],
            'etim_modelling_portcode' => ['required', 'integer'],
            'etim_feature_code' => ['required', 'string', 'max:8'],
            'etim_value_code' => ['nullable', 'string', 'max:8'],
            'etim_value_numeric' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'etim_value_range_lower' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'etim_value_range_upper' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'etim_value_logical' => ['nullable'],
            'etim_value_coordinate_x' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'etim_value_coordinate_y' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'etim_value_coordinate_z' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
        ];
    }
}
