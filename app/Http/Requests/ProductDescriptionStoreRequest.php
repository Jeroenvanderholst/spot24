<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDescriptionStoreRequest extends FormRequest
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
            'description_language' => ['nullable', 'string', 'max:5'],
            'minimal_product_description' => ['required', 'string', 'max:80'],
            'unique_main_product_description' => ['nullable', 'string', 'max:256'],
            'full_product_description' => ['nullable', 'string'],
            'product_marketing_text' => ['nullable', 'string'],
            'product_specification_text' => ['nullable', 'string'],
            'product_application_instructions' => ['nullable', 'string'],
            'product_keyword' => ['nullable', 'string', 'max:50'],
            'product_page_uri' => ['nullable', 'string', 'max:255'],
        ];
    }
}
