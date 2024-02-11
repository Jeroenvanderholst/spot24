<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class ProductAttachmentStoreRequest extends FormRequest
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
            'attachment_type' => ['required', 'in:ATX001,ATX002,ATX003,ATX004,ATX005,ATX006,ATX007,ATX008,ATX009,ATX010,ATX011,ATX012,ATX013,ATX014,ATX015,ATX016,ATX017,ATX018,ATX019,ATX020,ATX021,ATX099'],
            'product_image_similar' => ['nullable'],
            'attachment_order' => ['nullable', 'integer'],
            'attachment_language' => ['nullable', 'json'],
            'attachment_type_specification' => ['nullable', 'json'],
            'attachment_filename' => ['required', 'string', 'max:100'],
            'attachment_uri' => ['required', 'string', 'max:255'],
            'attachment_description' => ['nullable', 'json'],
            'attachment_issue_date' => ['nullable', 'date'],
            'attachment_expiry_date' => ['nullable', 'date'],
        ];
    }
}
