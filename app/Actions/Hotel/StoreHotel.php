<?php

namespace App\Actions\Hotel;

use App\Models\HotelMetaData;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class StoreHotel
{
    use AsController;

    public function rules(): array
    {
        return [
            'title' => 'required|string|unique:hotel_meta_datas,title',
            'description' => 'string|nullable',
            'address' => 'string|nullable',
            'bairro_id' => 'required|numeric',
            'condicao_id' => 'required|numeric',
            'tipo_de_imovel_id' => 'required|numeric',
            'status_id' => 'numeric|required'
        ];
    }

    public function AsController(ActionRequest $actionRequest)
    {

        try {
            $imovel = HotelMetaData::create($actionRequest->validated());

            flash()->addSuccess('Quarto criado com sucesso.');

            return to_route('hotel.create');
        } catch (\Throwable $e) {
            throw $e;
            flash()->addError('Erro na criação do quarto.');
            return back();
        }
    }
}
