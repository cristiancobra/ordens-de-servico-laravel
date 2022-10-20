<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Validation\Rule;
// use Illuminate\Support\Facades\Route;

class ProductUpdateRequest extends FormRequest
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
        $productId = $this->route( 'product' )->getKey();
        return [
            'sku' => 'required|unique:products,sku,' . $productId,
            'description' => 'required|string|max:255',
            'active' => 'boolean|nullable',
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
            'sku.required' => 'Código é um campo obrigatório',
            'description.required' => 'Descrição é um campo obrigatório',
        ];
    }
}
