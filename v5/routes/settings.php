<?php


use App\Http\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;

Route::prefix('management')
    ->name('management.')
    ->group(function () {
        Route::prefix('province')
            ->name('province.')
            ->controller(ProvinceController::class)
            ->group(function () {
                Route::get('/', 'index')
                    ->name('list');

                Route::post('/', 'store')
                    ->name('store');

                Route::patch('/{province}', 'update')
                    ->name('update');

                Route::delete('/{province}', 'delete')
                    ->name('delete');

                Route::get('/json/list', 'listJson')
                    ->name('list.json');

                Route::get('/{province}/json', 'showJson')
                    ->name('json');
            });
    });
