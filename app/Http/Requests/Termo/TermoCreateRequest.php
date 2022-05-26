<?php

namespace App\Http\Requests\Termo;

use Illuminate\Foundation\Http\FormRequest;

class TermoCreateRequest extends FormRequest
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
            'termos' => 'string|nullable',
        ];
    }
}