<?php

namespace App\Actions\Website;

use App\Models\HotelMetaData;
use Illuminate\Contracts\View\View;
use Lorisleiva\Actions\Concerns\AsController;

class GetHotel
{
    use AsController;

    public function asController(HotelMetaData $hotel): View
    {
        return view('website.hotel', [
            'hotel' => $hotel->load('hotels.media'),
        ]);
    }
}
