<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'supplier_id' => ['required', 'integer'],
            'manufacturer_name' => ['required', 'string', 'max:80'],
            'manufacturer_shortname' => ['nullable', 'string', 'max:15'],
            'manufacturer_product_number' => ['required', 'string', 'max:35'],
            'manufacturer_product_gtin' => ['required', 'string', 'max:14', 'unique:products,manufacturer_product_gtin'],
            'unbranded_product' => ['nullable'],
            'brand_name' => ['nullable', 'string', 'max:50'],
            'brand_series' => ['nullable', 'json'],
            'brand_series_variation' => ['nullable', 'string', 'max:50'],
            'product_validity_date' => ['nullable', 'date'],
            'product_obsolescence_date' => ['nullable', 'date'],
            'discount_group_id' => ['nullable', 'string', 'max:20'],
            'discount_group_description' => ['nullable', 'string', 'max:100'],
            'bonus_group_id' => ['nullable', 'string', 'max:20'],
            'bonus_group_description' => ['nullable', 'json'],
            'customs_commodity_code' => ['nullable', 'string', 'max:10'],
            'factor_customs_commodity_codedecimal(15,4)' => ['nullable', 'numeric', 'gt:0', 'between:0,99999999999.9999'],
            'country_of_origin' => ['nullable', 'string', 'max:2'],
        ];
    }
}
