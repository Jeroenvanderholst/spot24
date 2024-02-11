<?php

namespace App\Http\Requests\Etim;

use Illuminate\Foundation\Http\FormRequest;

class ModellingClassFeatureStoreRequest extends FormRequest
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
            'modellingclass_id' => ['required', 'string', 'max:8'],
            'sort_nr' => ['required', 'integer'],
            'feature_id' => ['required', 'string', 'max:8'],
            'port_code' => ['required', 'integer'],
            'drawing_code' => ['required', 'string', 'max:8'],
            'unit_id' => ['nullable', 'integer', 'exists:,id'],
            'imp_unit_id' => ['nullable', 'string', 'max:8'],
            'modelling_class_id' => ['required', 'integer', 'exists:modelling_classes,id'],
        ];
    }
}
