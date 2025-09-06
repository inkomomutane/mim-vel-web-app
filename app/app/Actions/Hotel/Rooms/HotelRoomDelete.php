<?php

namespace App\Actions\Hotel\Rooms;

use App\Models\Hotel;
use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class HotelRoomDelete
{
    use AsAction;

    public function  asController(Hotel $room): RedirectResponse
    {
        if ($this->handle($room)){
            flash()->addSuccess('Quarto excluído com sucesso.');
        }
        else{
            flash()->addError('Erro ao excluír o quarto.');
        }
        return redirect()->back();
    }

    public  function  handle(Hotel $room): bool
    {
        try {
            $room->delete();
            return true;
        }catch (\Exception $exception){
            return  false;
        }
    }
}

