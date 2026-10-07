<?php

use App\Http\Controllers\Website\ShowPropertyController;

Route::name('website.')->middleware('web')->group(function () {
  Route::get('/imoveis/{province:slug}/{city:slug}/{neighborhood:slug}/{property}', ShowPropertyController::class)->name('property.show');
});
