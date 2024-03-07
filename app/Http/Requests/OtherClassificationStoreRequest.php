<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtherClassificationStoreRequest extends FormRequest
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
            'classification_name' => ['required', 'string', 'max:35'],
            'classification_version' => ['nullable', 'string', 'max:10'],
            'classification_class_code' => ['required', 'string', 'max:100'],
        ];
    }
}
