<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModellingClassUpdateRequest extends FormRequest
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
            'version' => ['required', 'integer'],
            'status' => ['required', 'in:2,3,5,9'],
            'mutation_date' => ['nullable', 'date'],
            'revision' => ['nullable', 'integer'],
            'revision_date' => ['nullable', 'date'],
            'modelling' => ['required'],
            'description' => ['required', 'string', 'max:80'],
            'group_id' => ['required', 'string', 'max:8'],
            'drawing_uri' => ['nullable', 'string', 'max:255'],
            'changecode' => ['nullable', 'string', 'max:80'],
            'modelling_group_id' => ['required', 'integer', 'exists:modelling_groups,id'],
        ];
    }
}
