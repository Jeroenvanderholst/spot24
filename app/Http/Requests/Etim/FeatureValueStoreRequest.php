<?php

namespace App\Http\Requests\Etim;

use Illuminate\Foundation\Http\FormRequest;

class FeatureValueStoreRequest extends FormRequest
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
            'class_id' => ['required', 'string', 'max:8'],
            'sort_nr' => ['required', 'integer'],
            'feature_id' => ['required', 'string', 'max:8'],
            'value_id' => ['required', 'string', 'max:8'],
            'changecode' => ['nullable', 'string', 'max:80'],
            'releases' => ['nullable', 'json'],
            'class_feature_id' => ['required', 'integer', 'exists:class_features,id'],
            'modelling_class_feature_id' => ['required', 'integer', 'exists:modelling_class_features,id'],
        ];
    }
}
