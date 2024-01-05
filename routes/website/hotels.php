<?php

use App\Actions\Website\GetHotel;

Route::get('hotel-post/{hotel}', GetHotel::class)->name('post.hotel.show');
