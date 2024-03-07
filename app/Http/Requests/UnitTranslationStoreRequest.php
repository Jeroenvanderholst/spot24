<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitTranslationStoreRequest extends FormRequest
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
            'description' => ['required', 'string', 'max:80'],
            'abbreviation' => ['required', 'string', 'max:25'],
            'unit_id' => ['required', 'integer', 'exists:units,id'],
        ];
    }
}
