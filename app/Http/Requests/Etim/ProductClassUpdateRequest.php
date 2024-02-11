<?php

namespace App\Http\Requests\Etim;

use Illuminate\Foundation\Http\FormRequest;

class ProductClassUpdateRequest extends FormRequest
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
            'class_id' => ['required', 'string', 'max:8'],
            'status' => ['required', 'in:2,3,5,9'],
            'version' => ['required', 'integer'],
            'mutation_date' => ['nullable', 'date'],
            'revision' => ['nullable', 'integer'],
            'revision_date' => ['nullable', 'date'],
            'group_id' => ['required', 'string', 'max:8'],
            'description' => ['required', 'string', 'max:80'],
            'releases' => ['required', 'json'],
            'changecode' => ['required', 'string', 'max:80'],
        ];
    }
}
