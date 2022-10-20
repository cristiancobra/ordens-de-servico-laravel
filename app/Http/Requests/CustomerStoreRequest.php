<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'address' => 'required|string|max:255',
            'address_number' => 'required|numeric|min:1|max:9999',
            'cpf' => 'required|numeric|digits:11|',
        ];
    }

        /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nome é um campo obrigatório',
            'address.required' => 'Endereço é um campo obrigatório',
            'address_number.required' => 'Número é um campo obrigatório',
            'cpf.required' => 'CPF é um campo obrigatório',
            'cpf.digits' => 'CPF precisa ter 11 números',
        ];
    }
}
