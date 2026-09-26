<?php

use App\Data\CardPropertyData;
use App\Http\Controllers\Website\HomePageController;

use App\Http\Controllers\Website\PropertyFilterController;
use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Models\Property;
use Inertia\Inertia;
use RalphJSmit\Laravel\SEO\Support\SEOData;



Route::get('/', HomePageController::class)->name('home');

Route::prefix('property-filter')
    ->name('website.property-filter.')
    ->group(function () {
        Route::get(
            '/meta',
            [PropertyFilterController::class, 'meta'],
        )->name('meta');

        Route::get(
            '/options',
            [PropertyFilterController::class, 'options'],
        )->name('options');

        Route::get(
            '/preview',
            [PropertyFilterController::class, 'preview'],
        )->name('preview');
    });
Route::get('/dashboard',static  function () {
    return Inertia::render('Management/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('imavel/show/{imovel}',function (){
    return  response()->json(['imovel' => request()->all()]);
})->name('post.imovel.show');


Route::get('/me', function () { dd(auth()->user());})->name('me')->middleware('auth');
require_once  'settings.php';

