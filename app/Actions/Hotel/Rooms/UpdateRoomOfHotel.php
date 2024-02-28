<?php

namespace App\Actions\Hotel\Rooms;

use App\Models\Hotel;
use Exception;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateRoomOfHotel
{

    use AsAction;

    public  function rules(): array
    {
        return  [
            'title' => ['required', 'string', 'max:125'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric']
        ];
    }

    public function asController(Hotel $room, ActionRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {

            $room->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price
            ]);

            $room->refresh();

            if ($request['images'] && is_array($request['images'])) {
                foreach ($request['images'] as $image) {
                    $room->addMedia($image)->toMediaCollection('hotels', 'hotels');
                }
            }

            flash()->addSuccess('Quarto actualizado com sucesso.');

            return redirect()->back();
        } catch (Exception) {
            flash()->addError('Erro ao actualizar o quarto.');
            return redirect()->back();
        }
    }
}
