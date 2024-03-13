<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectsRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'url'=>'required|max:1024|url',
            'title'=>'required|max:64',
            'description'=>'required|max:5000',
            'date'=>'required|max:64|date',
            'type_id' => 'nullable|exists:types,id',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'PER FAVORE INSERISCI IL CONTENUTO CORRETTO',
            'title.max' => 'NUMERI CARATTERI MAX RAGGIUNTO',
        ];
    }
}
