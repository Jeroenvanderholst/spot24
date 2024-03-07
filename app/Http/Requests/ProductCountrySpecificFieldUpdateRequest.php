<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCountrySpecificFieldUpdateRequest extends FormRequest
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
            'product_number' => ['required', 'string', 'max:35'],
            'cs_product_characteristic_code' => ['required', 'string', 'max:6'],
            'cs_product_characteristic_name' => ['nullable', 'json'],
            'cs_product_characteristic_value_boolean' => ['nullable'],
            'cs_product_characteristic_value_numeric' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'cs_product_characteristic_value_range_lower' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'cs_product_characteristic_value_range_upper' => ['nullable', 'numeric', 'between:-999999999999.9999,999999999999.9999'],
            'cs_product_characteristic_value_string' => ['nullable', 'json'],
            'cs_product_characteristic_value_set' => ['nullable', 'json'],
            'cs_product_characteristic_value_select' => ['nullable', 'string', 'max:60'],
            'cs_product_characteristic_value_unit_code' => ['nullable', 'string', 'max:3'],
            'cs_product_characteristic_reference_gtin' => ['nullable', 'string', 'max:14'],
        ];
    }
}
