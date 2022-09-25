<?php

use App\Http\Controllers\Backend\AgendaController;
use App\Http\Controllers\Backend\BairroController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CidadeController;
use App\Http\Controllers\Backend\CondicaoController;
use App\Http\Controllers\Backend\ImovelController;
use App\Http\Controllers\Backend\ImovelForController;
use App\Http\Controllers\Backend\MediaController;
use App\Http\Controllers\Backend\Pages\PoliticaController;
use App\Http\Controllers\Backend\Pages\TermosController;
use App\Http\Controllers\Backend\ProvinceController;
use App\Http\Controllers\Backend\RegraDeNegocioController;
use App\Http\Controllers\Backend\StatusController;
use App\Http\Controllers\Backend\TipoDeImovelController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\PostSearchController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\WelcomeController;
use App\Models\Politica;
use App\Models\Termo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::controller(WelcomeController::class)->group(function () {
    Route::get('/','index')->name('welcome');
});

Route::controller(ImovelController::class)->group(function () {
    Route::get('/posts/{imovel}', 'show')->name('posts.show');
});
Route::get('/contacto', function () {
    return view('website.contacto');
})->name('contacto');

Route::controller(SendMessageController::class)->group(function () {
    Route::post('/contacto/send_message', 'index')->name('contacto.sendMessage');
});



Route::get('/sobre-nos', function () {
    return view('website.sobre');
})->name('sobre');
Route::get('/termos-e-condicoes', function () {
    return view('website.termos')->with('termo', Termo::first());
})->name('termos');

Route::get('/politicas-de-privacidade', function () {
    return view('website.politicas')->with('politica', Politica::first());
})->name('politicas');


Route::controller(PostSearchController::class)->group(function () {
    Route::get('/pesquisar/posts', 'search')->name('posts.search');
    Route::get('/posts', 'index')->name('posts');
    Route::post('/pesquisar/posts/remover/filtros','clearFilters')->name('clear_filters');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);


Route::prefix('/administration')->middleware([
    'auth',
    // 'role:Super-Admin|Admin|Admin_L2'
])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('cidade', CidadeController::class);
    Route::resource('province',ProvinceController::class);
    Route::resource('regra_de_negocio', RegraDeNegocioController::class);
    Route::resource('imovel_for',ImovelForController::class);
    Route::resource('bairro', BairroController::class);
    Route::resource('condicao', CondicaoController::class);
    Route::resource('status', StatusController::class);
    Route::resource('tipo_de_imovel', TipoDeImovelController::class);
    Route::controller(TermosController::class)->group(function () {
        Route::get('/termos', 'index')->name('termos.index');
        Route::patch('/termos', 'update')->name('termos.update');
    });
    Route::controller(PoliticaController::class)->group(function () {
        Route::get('/politicas', 'index')->name('politicas.index');
        Route::patch('/politicas', 'update')->name('politicas.update');
    });
});

Route::prefix('/administration')->middleware([
    'auth',
    //  'role:Super-Admin|Admin|Admin_L2|Corretor|Corretor_L2'
])->group(function () {
    Route::resource('imovel', ImovelController::class);
    Route::controller(MediaController::class)->group(function () {
        Route::get('media', 'index')->name('media.index');
        Route::get('media/imovel/{imovel}', 'show')->name('media.show');
        Route::post('media/store/{imovel}', 'store')->name('media.store');
        Route::delete('media/{media}', 'destroy')->name('media.destroy');
    });

    Route::controller(BannerController::class)->group(function () {
        Route::get('banner', 'index')->name('banner.index');
        Route::post('banner/store', 'store')->name('banner.store');
        Route::delete('banner/{media}', 'destroy')->name('banner.destroy');
    });

    Route::resource('agenda', AgendaController::class);
});

Route::prefix('/administration')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');
});
