<?php

namespace App\Http\Requests\EtimXchange;

use Illuminate\Foundation\Http\FormRequest;

class TradeItemStoreRequest extends FormRequest
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
            'tradeItem' => ['required'],
        ];
    }
}
