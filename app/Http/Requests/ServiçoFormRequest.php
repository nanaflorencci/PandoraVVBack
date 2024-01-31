<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServiçoFormRequest extends FormRequest
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
            
            'nome' => 'required|max:80|min:5|unique:servicos,nome',
            'descricao' => 'required|max:200|min:10',
            'duracao' => 'required|numeric',
            'preco' => 'required|decimal:2',
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
            'nome.max' => 'O campo nome deve ter no maximo 80 caracteres',
            'nome.min' => 'O campo nome deve ter no minimo 5 caracteres',
            'nome.unique'=>'O nome já foi cadastrado',
            'descricao.required'=>'O campo descrição é obrigatório',
            'descricao.max'=>'O campo descriçao deve ter no maximo 200 caracteres',
            'descricao.min'=>'O campo descrição deve ter no mínimo 10 caracteres',
            'duracao.required'=> 'O campo duração é obrigátorio',
            'duracao.numeric'=>'O campo duração deve ter apenas números',
            'preco.required'=>'O campo preço é obrigátorio',
            'preco.decimal'=>'O campo preço só é permitido números decimais'
        ];
    }
}