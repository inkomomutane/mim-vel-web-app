<?php
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/attributes', GetAttributes::class)->name('attribute.all');
    Route::post('/dashboard/attribute', CreateAttribute::class)->name('attribute.store');
    Route::match(['put', 'patch'], '/dashboard/attribute/{attribute}', UpdateAttribute::class)->name('attribute.update');
    Route::delete('/dashboard/attribute/{attribute}', DeleteAttribute::class)->name('attribute.delete');
});
