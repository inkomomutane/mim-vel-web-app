<?php

use App\Http\Controllers\Backend\BairroController;
use App\Http\Controllers\Backend\CidadeController;
use App\Http\Controllers\Backend\CondicaoController;
use App\Http\Controllers\Backend\ImovelController;
use App\Http\Controllers\Backend\StatusController;
use App\Http\Controllers\Backend\TipoDeImovelController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\BackupController;
use App\Models\Imovel;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('website.welcome', [
        'destacados' => Imovel::count() > 8 ?
            Imovel::with('ratings')
            ->with('comentarios')
            ->with('corretor')
            ->get()->take(8) :
            Imovel::with('ratings')
            ->with('comentarios')
            ->with('corretor')
            ->get(),
        'recents' => Imovel::count() > 3 ?
            Imovel::orderBy('created_at', 'desc')
            ->with('ratings')
    ->with('comentarios')
    ->with('corretor')
    ->take(3)->get() :
            Imovel::with('ratings')
            ->with('comentarios')
            ->with('corretor')
            ->get()
    ]);
})->name('welcome');

Route::get('/posts', function () {
    return view('website.posts')->with('posts', Imovel::with('ratings')
    ->with('comentarios')
    ->with('corretor')
    ->paginate(9));
})->name('posts');

Route::controller(ImovelController::class)->group(function () {
    Route::get('/posts/{imovel}', 'show')->name('posts.show');
});
Route::get('/contacto',function(){
    return view('website.contacto');
})->name('contacto');

Route::get('/sobre-nos',function(){
    return view('website.sobre');
})->name('sobre');
Route::get('/termos-e-condicoes',function(){
    return view('website.termos');
})->name('termos');


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('cidade', CidadeController::class);
    Route::resource('bairro', BairroController::class);
    Route::resource('condicao', CondicaoController::class);
    Route::resource('status', StatusController::class);
    Route::resource('tipo_de_imovel', TipoDeImovelController::class);
    Route::resource('imovel', ImovelController::class);
});

