<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class ItemDescriptionStoreRequest extends FormRequest
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
            'trade_item_id' => ['required', 'integer'],
            'supplier_item_number' => ['required', 'string', 'max:35'],
            'description_language' => ['nullable', 'string', 'max:5'],
            'minimal_item_description' => ['required', 'string', 'max:80'],
            'unique_main_item_description' => ['nullable', 'string', 'max:256'],
        ];
    }
}
