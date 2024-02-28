<?php

namespace App\Actions\Hotel\Rooms;

use App\Models\HotelMetaData;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\LaravelData\Exceptions\InvalidDataClass;

class AddRoomsToHotel
{

    use AsAction;

    /**
     * @throws InvalidDataClass
     */
    public  function asController(HotelMetaData $hotel, ActionRequest $actionRequest): \Inertia\Response
    {
        return  Inertia::render('Hotel/Room/AddRoomsToHotel',[
            'hotel' => $hotel->load(['hotels','media'])->getData()
        ]);
    }
}
