<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class EtimClassificationStoreRequest extends FormRequest
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
            'product_id' => ['required', 'integer', 'unique:etim_classifications,product_id'],
            'manufacturer_product_nr' => ['required', 'string', 'max:35'],
            'etim_release_version' => ['required', 'string', 'max:7'],
            'etim_dynamic_release_date' => ['nullable', 'date'],
            'etim_class_code' => ['required', 'string', 'max:8'],
            'etim_class_version' => ['required', 'integer'],
            'etim_modelling_class_code' => ['required', 'string', 'max:8'],
            'etim_modelling_class_version' => ['nullable', 'integer'],
            'product_class_id' => ['required', 'integer', 'exists:product_classes,id'],
            'modelling_class_id' => ['required', 'integer', 'exists:modelling_classes,id'],
        ];
    }
}
