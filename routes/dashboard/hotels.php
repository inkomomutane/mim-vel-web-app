<?php

use App\Actions\Hotel\CreateHotel;
use App\Actions\Hotel\EditHotel;
use App\Actions\Hotel\GetHotels;
use App\Actions\Hotel\StoreHotel;

Route::prefix('dashboard/')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/hotel', GetHotels::class)->name('hotel.all');
    // Route::get('/imovel/not/approved', GetNotApprovedImovels::class)->name('imovel.not.approved.all');
    // Route::get('/imovel/trash', GetDeletedImovels::class)->name('imovel.all.trash');
    Route::get('/hotel/create', CreateHotel::class)->name('hotel.create');
    Route::get('/hotel/edit/{hotel}', EditHotel::class)->name('hotel.edit');
    Route::post('/hotel/store', StoreHotel::class)->name('hotel.store');
    // Route::post('/imovel/{imovel}/update', UpdateImovel::class)->name('imovel.update');
    // Route::delete('/imovel/{imovel}', DeleteImovel::class)->name('imovel.delete');
    // Route::delete('/imovel/trash/{imovel}', ApproveImovelDeletion::class)->name('imovel.delete.trash');
    // Route::post('/imovel/restore/trashed/{imovel}', RestoreDeletedImovel::class)->name('imovel.delete.restore');
    // Route::post('/imovel/approve-or-refuse/{imovel}', ImovelApprovement::class)->name('imovel.approvment');
});
