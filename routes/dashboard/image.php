<?php


use App\Actions\Image\DeleteImageAction;

Route::prefix('dashboard/')->middleware(['auth', 'verified'])->group(function () {
    Route::delete('/image/{media}', DeleteImageAction::class)->name('image.delete');
});
