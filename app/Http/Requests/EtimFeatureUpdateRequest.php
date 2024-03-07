<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtimFeatureUpdateRequest extends FormRequest
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
            'etim_class_id' => ['required', 'string', 'max:8'],
            'etim_class_version' => ['required', 'integer'],
            'etim_feature_id' => ['required', 'string', 'max:8'],
            'etim_value_id' => ['nullable', 'string', 'max:8'],
            'etim_value_numeric' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'etim_value_range_lower' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'etim_value_upper' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'etim_value_logical' => ['nullable'],
            'etim_value_details' => ['nullable', 'json'],
            'reason_no_value' => ['nullable', 'in:MV,NA,UN'],
            'etim_classification_id' => ['required', 'integer', 'exists:etim_classifications,id'],
        ];
    }
}
