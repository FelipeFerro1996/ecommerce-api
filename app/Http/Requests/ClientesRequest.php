<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientesRequest extends FormRequest
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
        $clienteId = $this->route('cliente'); 
        return [
            'nome' => 'required|min:2',
            'email' => [
                'required',
                'email',
                Rule::unique('clientes')->ignore($clienteId),
            ],
            'data_nascimento'=>'required|date',
            'celular' => 'required|min:1|max:11'
        ];
    }
}
