<?php

namespace App\Http\Requests\TipoDeImovel;

use Illuminate\Foundation\Http\FormRequest;

class TipoDeImovelUpdateRequest extends FormRequest
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
            'nome' => 'required|unique:tipo_de_imovels,nome,'. $this->tipo_de_imovel->id,
        ];
    }
}
