<?php

namespace App\Actions\Hotel;

use App\Models\HotelMetaData;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteHotel
{
    use AsAction;

    public function handle(HotelMetaData $hotel): bool
    {
        try {
            $hotel->delete();

            return true;
        } catch (\Exception $exception) {
            //            throw  $exception;
            return false;
        }
    }

    public function asController(HotelMetaData $hotel): \Illuminate\Http\RedirectResponse
    {
        if ($this->handle($hotel)) {
            flash()->addSuccess('Hotel excluído com sucesso');

            return redirect()->back();
        }
        flash()->addError('Erro ao excluir hotel');

        return redirect()->back();
    }
}
