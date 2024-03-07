<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemDetailStoreRequest extends FormRequest
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
            'supplier_item_number' => ['required', 'string', 'max:35', 'unique:item_details,supplier_item_number'],
            'item_status' => ['nullable', 'in:PRE-LAUNCH,ACTIVE,ON HOLD,PLANNED WITHDRAWAL,OBSOLETE'],
            'item_condition' => ['nullable', 'in:NEW,USED,REFURBISHED'],
            'stock_item' => ['nullable'],
            'shelf_life_period' => ['nullable', 'integer'],
        ];
    }
}
