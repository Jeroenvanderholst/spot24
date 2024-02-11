<?php

namespace App\Http\Requests\Etim;

use Illuminate\Foundation\Http\FormRequest;

class ModellingClassPortUpdateRequest extends FormRequest
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
            'modelling_class_id' => ['required', 'string', 'max:8'],
            'port_code' => ['required', 'integer'],
            'connection_type_id' => ['required', 'string', 'max:8'],
        ];
    }
}
