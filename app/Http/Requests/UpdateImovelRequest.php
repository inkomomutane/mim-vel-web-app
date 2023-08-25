<?php

namespace App\Http\Requests;

use App\Models\Imovel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateImovelRequest extends FormRequest
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
            'titulo' => ['required', 'string', Rule::unique(Imovel::class, 'titulo')->ignore($this->imovel->id, 'id')],
            'descricao' => 'string|nullable',
            'details' => 'string|nullable',
            'slug' => 'string|nullable',
            'banheiros' => 'numeric|nullable',
            'preco' => 'string|nullable',
            'ano' => 'numeric|nullable',
            'andares' => 'numeric|nullable',
            'area' => 'numeric|nullable',
            'quartos' => 'numeric|nullable',
            'suites' => 'numeric|nullable',
            'garagens' => 'numeric|nullable',
            'piscinas' => 'numeric|nullable',
            'endereco' => 'string|nullable',
            'mapa' => 'string|nullable',
            'published_at' => 'nullable',
            'views' => 'nullable|numeric',
            'bairro_id' => 'required|numeric',
            'condicao_id' => 'required|numeric',
            'tipo_de_imovel_id' => 'required|numeric',
            'status_id' => 'numeric|required',
            'corretor_id' => 'numeric|nullable',
            'imovel_for_id' => 'required|numeric',
            'regra_de_negocio_id' => 'required|numeric',
            'intermediation_rule_id' => 'required|numeric',

        ];
    }
}
