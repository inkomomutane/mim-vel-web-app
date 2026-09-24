<?php


use App\Http\Controllers\PropertyConditionController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\StatusController;
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


Route::prefix('management')
    ->name('management.')
    ->group(function () {
        Route::prefix('property-condition')
            ->name('property-condition.')
            ->controller(PropertyConditionController::class)
            ->group(function () {
                Route::get('/', 'index')
                    ->name('list');

                Route::post('/', 'store')
                    ->name('store');

                Route::patch('/{propertyCondition}', 'update')
                    ->name('update');

                Route::delete('/{propertyCondition}', 'delete')
                    ->name('delete');

                Route::get('/json/list', 'listJson')
                    ->name('list.json');

                Route::get('/{propertyCondition}/json', 'showJson')
                    ->name('json');
            });
    });

Route::prefix('management')
    ->name('management.')
    ->group(function () {
        Route::prefix('status')
            ->name('status.')
            ->controller(StatusController::class)
            ->group(function () {
                Route::get('/', 'index')
                    ->name('list');

                Route::post('/', 'store')
                    ->name('store');

                Route::patch('/{status}', 'update')
                    ->name('update');

                Route::delete('/{status}', 'delete')
                    ->name('delete');
                Route::get('/json/list', 'listJson')
                    ->name('list.json');
                Route::get('/{status}/json', 'showJson')
                    ->name('json');
            });
    });



Route::prefix('core')
    ->name('core.')
    ->group(function (){
        Route::prefix('icons')
            ->name('icons.')
            ->controller(\App\Http\Controllers\IconController::class)
            ->group(function () {
                Route::get('/{icon}/json', 'show')
                    ->name('json');
                Route::get('/json/list', 'index')
                    ->name('list.json');
            });

    });
