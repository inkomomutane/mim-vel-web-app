<?php

namespace App\Http\Requests\Cidade;

use Illuminate\Foundation\Http\FormRequest;

class CidadeUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|unique:cidades,nome,'. $this->cidade->id,
        ];
    }
}
