<?php

namespace App\Http\Requests\RegraDeNegocio;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegraDeNegocioRequest extends FormRequest
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
            'name' => 'required|unique:regra_de_negocios,name',
        ];
    }
}
