<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfissionalFormRequestUpdate extends FormRequest
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
            'nome' => 'required|max:120|min:5',
            'celular' => 'required|max:11|min:10|unique:clientes,celular',
            'email' => 'required|email|unique:clientes,email',
            'cpf' => 'required|max:11|min:11|unique:clientes,cpf',
            'dataNascimento' => 'required|date', 
            'cidade' => 'required|max:120|min:2',
            'estado' => 'required|max:2|min:2',
            'pais' => 'required|max:80|min:3',
            'rua' => 'required|max:120|min:10',
            'numero' => 'required|max:10|min:2',
            'bairro' => 'required|max:100|min:10',
            'cep' => 'required|max:8|min:8',
            'complemento' => 'required|max:150|min:10',
            'password' => 'required',
            'salario'=>'required|decimal:2',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages(){

        return[
            'nome.required' => 'o nome é obrigatorio',
            'nome.max' => 'o campo nome deve contar no maximo 120 caracteres',
            'nome.min' => 'o campo nome deve contar no minimo 5 caracteres',
            'celular.required' => 'o telefone é obrigatorio',
            'celular.max' => 'o campo celular deve contar no maximo 11 caracteres',
            'celular.min' => 'o campo celular deve contar no minimo 10 caracteres',
            'celular.unique' => 'celular já cadastrado no sistema',
            'email.required' => 'o email é obrigatorio',
            'email.email' => 'formato de email invalido',
            'email.unique' => 'email ja cadastrado no sistema',
            'cpf.required' => 'o cpf é obrigatorio',
            'cpf.max' => 'o campo cpf deve contar no maximo 11 caracteres',
            'cpf.min' => 'o campo cpf deve contar no minimo 11 caracteres',
            'cpf.unique' => 'cpf ja cadastrado no sistema',
            'dataNascimento.required' => 'O campo data de nascimento é obrigatorio',
            'dataNascimento.date' => 'O campo data de nascimento deve ter apenas numeros',
            'cidade.required' => 'o campo cidade é obrigatorio',
            'cidade.max' => 'o campo cidade deve contar no maximo 120 caracteres',
            'cidade.min' => 'o campo cidade deve contar no minimo 2 caracteres',
            'estado.required' => 'o campo estado é obrigatorio',
            'estado.max' => 'o campo estado deve contar no maximo 2 caracteres',
            'estado.min' => 'o campo estado deve contar no minimo 2 caracteres',
            'pais.required' => 'o campo pais é obrigatorio',
            'pais.max' => 'o campo pais deve contar no maximo 80 caracteres',
            'pais.min' => 'o campo pais deve contar no mínimo 3 caracteres',
            'rua.required' => 'o campo rua é obrigatorio',
            'rua.max' => 'o campo rua deve contar no maximo 120 caracteres',
            'rua.min' => 'o campo rua deve contar no mínimo 10 caracteres',
            'numero.required' => 'o campo numero é obrigatorio',
            'numero.max' => 'o campo numero deve contar no maximo 10 caracteres',
            'numero.min' => 'o campo numero deve contar no mínimop 3 caracteres',
            'bairro.required' => 'o campo bairro é obrigatorio',
            'bairro.max' => 'o campo bairro deve contar no maximo 100 caracteres',
            'bairro.min' => 'o campo bairro deve contar no mínimo 10 caracteres',
            'cep.required' => 'o campo cep é obrigatorio',
            'cep.max' => 'o campo cep deve contar no maximo 8 caracteres',
            'cep.min' => 'o campo cep deve contar no minimo 8 caracteres',
            'complemento.required' => 'o campo complemento é obrigatorio',
            'complemento.max' => 'o campo complemento deve contar no maximo 150 caracteres',
            'complemento.min' => 'o campo complemento deve contar no minimo 10 caracteres',
            'password.required' => 'a senha obrigatorio',
            'salario.required'=>'o salário é obrigatório',
            'salario.decimal'=>'O campo salário só é permitido números decimais'
        ];
    }
}