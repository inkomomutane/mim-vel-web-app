<?php

namespace App\Actions\Hotel;

use App\Models\Hotel;
use App\Models\HotelMetaData;
use DB;
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
            'status_id' => 'numeric|required',
        ];
    }

    public function asController(ActionRequest $actionRequest): \Illuminate\Http\RedirectResponse
    {

        try {

            DB::beginTransaction();

            $hotelData = HotelMetaData::create($actionRequest->validated());
            foreach ($actionRequest->rooms as $room) {

                $roomUpdated = Hotel::create(
                    [
                        'price' => $room['price'],
                        'title' => $room['title'],
                        'description' => $room['description'],
                        'email' => $room['email'],
                        'contact' => $room['contact'],
                        'hotel_meta_data_id' => $hotelData->id,
                    ]
                );

                if ($room['images'] && is_array($room['images'])) {
                    foreach ($room['images'] as $image) {
                        $roomUpdated->addMedia($image)->toMediaCollection('hotels', 'hotels');
                    }
                }
            }

            DB::commit();

            flash()->addSuccess('Quarto criado com sucesso.');

            return to_route('hotel.all');
        } catch (\Throwable $e) {
            throw $e;
            flash()->addError('Erro na criação do quarto.');
            return back();
        }
    }
}
