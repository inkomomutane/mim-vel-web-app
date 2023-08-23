<?php

use App\Actions\Status\CreateStatus;
use App\Actions\Status\DeleteStatus;
use App\Actions\Status\GetStatuses;
use App\Actions\Status\UpdateStatus;

Route::middleware(['roles:Admin|Super-Admin', 'auth', 'verified'])->group(function () {
    Route::get('/dashboard/statuses', GetStatuses::class)->name('status.all');
    Route::post('/dashboard/status', CreateStatus::class)->name('status.store');
    Route::match(['put', 'patch'], '/dashboard/status/{status}', UpdateStatus::class)->middleware(['auth', 'verified'])->name('status.update');
    Route::delete('/dashboard/status/{status}', DeleteStatus::class)->name('status.delete');
});
