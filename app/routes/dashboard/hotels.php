<?php

use App\Actions\Hotel\CreateHotel;
use App\Actions\Hotel\DeleteHotel;
use App\Actions\Hotel\EditHotel;
use App\Actions\Hotel\GetHotels;
use App\Actions\Hotel\Rooms\AddRoomsToHotel;
use App\Actions\Hotel\StoreHotel;
use App\Actions\Hotel\UpdateHotel;

Route::prefix('dashboard/')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/hotel', GetHotels::class)->name('hotel.all');
    Route::get('/hotel/create', CreateHotel::class)->name('hotel.create');
    Route::get('/hotel/edit/{hotel}', EditHotel::class)->name('hotel.edit');
    Route::get('hotel/rooms/{hotel}/list', AddRoomsToHotel::class)->name('hotel.rooms.list');
    Route::post('hotel/rooms/{hotel}/create/new-room', \App\Actions\Hotel\Rooms\AttachRoomToHotel::class)->name('hotel.rooms.create.new-room');
    Route::match(['put', 'patch', 'post'], 'hotel/rooms/{room}/update/room', \App\Actions\Hotel\Rooms\UpdateRoomOfHotel::class)->name('hotel.rooms.update.new-room');
    Route::delete('hotel/room/{room}/destroy', \App\Actions\Hotel\Rooms\HotelRoomDelete::class)->name('hotel.room.destroy');
    Route::match(['put', 'patch','post'], '/hotel/{hotel}/update', UpdateHotel::class)->name('hotel.update');
    Route::post('/hotel/store', StoreHotel::class)->name('hotel.store');
    Route::delete('/hotel/delete/{hotel}', DeleteHotel::class)->name('hotel.delete');
});
