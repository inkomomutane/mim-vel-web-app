<?php

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/attributes', \App\Actions\Attribute\GetAttributes::class)->name('attributes.all');
    Route::post('/dashboard/attribute', \App\Actions\Attribute\CreateAttribute::class)->name('attribute.store');
    Route::post('/dashboard/attribute/{attribute}/upload', \App\Actions\Attribute\UploadAttributeImage::class)->name('attribute.image.upload');
    Route::match(['put', 'patch'], '/dashboard/attribute/{attribute}', \App\Actions\Attribute\UpdateAttribute::class)->name('attribute.update');
    Route::delete('/dashboard/attribute/{attribute}', \App\Actions\Attribute\DeleteAttribute::class)->name('attribute.delete');
});
