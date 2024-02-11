<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class ClassificationFeatureUpdateRequest extends FormRequest
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
            'classification_feature_name' => ['nullable', 'string', 'max:100'],
            'classification_feature_value1' => ['nullable', 'string', 'max:100'],
            'classification_feature_value2' => ['nullable', 'string', 'max:100'],
            'classification_feature_uni' => ['nullable', 'string', 'max:100'],
            'other_classification_id' => ['required', 'integer', 'exists:other_classifications,id'],
        ];
    }
}
