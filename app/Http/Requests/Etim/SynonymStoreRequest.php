<?php

namespace App\Http\Requests\Etim;

use Illuminate\Foundation\Http\FormRequest;

class SynonymStoreRequest extends FormRequest
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
            'language_id' => ['required', 'string', 'max:5'],
            'description' => ['required', 'string', 'max:8'],
            'product_class_id' => ['required', 'integer', 'exists:product_classes,id'],
            'modelling_class_id' => ['required', 'integer', 'exists:modelling_classes,id'],
        ];
    }
}
