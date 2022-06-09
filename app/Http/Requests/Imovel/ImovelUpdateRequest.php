<?php

namespace App\Http\Requests\Imovel;

use Illuminate\Foundation\Http\FormRequest;

class ImovelUpdateRequest extends FormRequest
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
            'titulo' => 'required|string|unique:imovels,titulo,'. $this->imovel->id,
            'descricao' => 'string|nullable',
            'slug' => 'string|nullable',
            'banheiros' => 'numeric|nullable',
            'preco'=> 'numeric|nullable',
            'ano' => 'numeric|nullable',
            'andares' => 'numeric|nullable',
            'area' => 'numeric|nullable',
            'quartos' => 'numeric|nullable',
            'suites' => 'numeric|nullable',
            'garagens' => 'numeric|nullable',
            'piscinas' => 'numeric|nullable',
            'endereco' => 'string|nullable',
            'mapa' => 'string|nullable',
            'published_at' =>'nullable',
            'views' => 'nullable|nullable',
            'bairro_id' => 'numeric|nullable',
            'condicao_id' => 'numeric|nullable',
            'tipo_de_imovel_id' => 'numeric|nullable',
            'status_id'=> 'numeric|nullable',
            'corretor_id' => 'numeric|nullable'
        ];
    }
}
