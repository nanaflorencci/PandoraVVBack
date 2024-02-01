<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PagamentoFormRequestUpdate extends FormRequest
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
            'nome' => 'required|max:120|min:2',
            'taxa'=>'required|max:120|min:3',
            'status' => 'required|max:120|min:3',
        ];
    }
    
    public function failedValidation(Validator $validator)
    {
    throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O campo nome deve conter, no máximo, 120 caracteres',
            'nome.min' => 'O campo nome deve conter, no mínimo, 2 caracteres',
            'nome.unique' => 'este nome já foi cadastrado. Por favor, informe outro nome',

            'taxa.required' => 'O campo taxa é obrigatório',
            'taxa.max' => 'O campo taxa deve conter 120 caracteres',
            
            'status.required' => 'O campo status é obrigatorio.',
            'status.max' => 'O campo status deve conter, no máximo, 120 caracteres',
            'status.max' => 'O campo status deve conter, no mínimo, 3 caracteres',
        ];
    }
}