<?php

use App\Actions\Status\CreateStatus;
use App\Actions\Status\DeleteStatus;
use App\Actions\Status\GetStatuses;
use App\Actions\Status\UpdateStatus;

Route::get('/dashboard/statuses', GetStatuses::class)->middleware(['auth', 'verified'])->name('status.all');
Route::post('/dashboard/status', CreateStatus::class)->middleware(['auth', 'verified'])->name('status.store');
Route::match(['put', 'patch'], '/dashboard/status/{status}', UpdateStatus::class)->middleware(['auth', 'verified'])->name('status.update');
Route::delete('/dashboard/status/{status}', DeleteStatus::class)->middleware(['auth', 'verified'])->name('status.delete');
