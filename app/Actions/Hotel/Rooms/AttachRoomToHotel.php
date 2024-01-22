<?php

namespace App\Actions\Hotel\Rooms;

use App\Models\Hotel;
use App\Models\HotelMetaData;
use Google\Exception;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class AttachRoomToHotel
{
    use AsAction;
    public  function rules() :array {
        return  [
            'title' => ['required','string','max:125'],
            'description' => ['required','string'],
            'price' => ['required','numeric']
        ];
    }

    public function asController(HotelMetaData $hotel,ActionRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {

            $room = $hotel->hotels()->create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price
            ]);
            $room = Hotel::whereId($room->id)->first();

            if ($request['images'] && is_array($request['images'])) {
                foreach ($request['images'] as $image) {
                    $room->addMedia($image)->toMediaCollection('hotels', 'hotels');
                }
            }

            flash()->addSuccess('Quarto adicionado com sucesso.');
            return redirect()->back();
        }catch (Exception){
            flash()->addError('Erro ao adicionar quarto.');
            return redirect()->back();
        }
    }
}
