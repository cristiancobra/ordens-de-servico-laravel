<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'product_id' => 'required|integer',
            'start_date' => 'required|date',
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
            'product_id.required' => 'Selecione um produto',
            'start_date.required' => 'Selecione uma data',
            'cpf.required' => 'CPF é um campo obrigatório',
            'cpf.digits' => 'CPF precisa ter 11 números',
        ];
    }
}
