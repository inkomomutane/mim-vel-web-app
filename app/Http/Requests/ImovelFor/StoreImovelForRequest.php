<?php

namespace App\Http\Requests\ImovelFor;

use Illuminate\Foundation\Http\FormRequest;

class StoreImovelForRequest extends FormRequest
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
            'name' => 'required|string|unique:imovel_fors,name',
            'slug_text' => 'string|unique:imovel_fors,slug_text',
        ];
    }
}
