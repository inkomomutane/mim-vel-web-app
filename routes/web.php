    <?php

    use App\Http\Controllers\BairroController;
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

    Route::get('/', 'Frontend\WelcomController@index')->name('welcome');
    Route::get('/imoveis/{imovel}', 'Frontend\ImovelController@show')->name('imo.show');
    Route::get('/imoveis', 'Frontend\ImovelController@index')->name('imo.index');
    Route::get('/messages/{activeUser}/{contact}', 'MessageController@messagesOf')->name('messageOf');
    Route::get('/contact', function () {
        return view('frontend.contact');
    })->name('contact');
    Route::get('/about', 'Frontend\AboutController@index')->name('about');
    Route::get('/termos_e_condicoes', 'Frontend\TermosController@index')->name('termos.frontend');
    Route::get('/complaint/{imovel}', 'Frontend\ComplaintController@index')->name('complaint');
    Route::post('/complaint', 'DenunciaController@store')->name('complaint.store');
    Route::get('/denuncia', 'DenunciaController@index')->name('denuncia.index');

    Route::get('/imo', function () {
        return  [];
    })->name('imo');
    Route::get('/imo', function () {
        return view('frontend.search');
    })->name('imo');

    Route::get('/search', function () {
        return view('frontend.search');
    })->name('search');

    Route::get('/corretor', function () {
        return [];
    })->name('corretor');

    Auth::routes(['verify' => true, 'register' => true]);

    Route::get('/home', 'HomeController@index')->name('home')
        ->middleware(['verified', 'auth']);

    Route::get('/permission', 'RoleController@index')->name('permissions')
        ->middleware(['verified', 'auth', 'role:ceo']);


    Route::resource('bairro', 'BairroController')
        ->middleware(['verified', 'auth', 'role:ceo']);

    Route::resource('cidade', 'CidadeController')
        ->middleware(['verified', 'auth', 'role:ceo']);

    Route::resource('status', 'StatusController')
        ->middleware(['verified', 'auth', 'role:ceo']);

    Route::resource('tipodeimovel', 'TipoDeImovelController')
        ->middleware(['verified', 'auth', 'role:ceo']);

    Route::resource('imovel', 'ImovelController')
        ->middleware(['verified', 'auth', 'role:ceo|admin|corretor']);

    Route::resource('weblink', 'WebLinkController')
        ->middleware(['verified', 'auth', 'role:ceo|admin']);

    Route::post('weblink/{weblink}/store_image', 'WebLinkController@store_image')
        ->name('weblink.store_image')
        ->middleware(['verified', 'auth', 'role:ceo']);

    Route::post('weblink/{weblink}/delete_image', 'WebLinkController@delete_image')
        ->name('weblink.delete_image')
        ->middleware(['verified', 'auth', 'role:ceo']);

    Route::post('imovel/{imovel}/store_image', 'ImovelController@store_image')
        ->name('imovel.store_image')
        ->middleware(['verified', 'auth', 'role:ceo']);

    Route::post('imovel/{imovel}/delete_image', 'ImovelController@delete_image')
        ->name('imovel.delete_image')
        ->middleware(['verified', 'auth', 'role:ceo']);

    Route::get('pesquisar/imoveis','Frontend\ImovelController@search')
        ->name('imovel.search');

    Route::resource('user', 'UserController')->middleware(
        ['verified', 'auth', 'role:ceo']
    );
    Route::resource('message', 'MessageController')->middleware(
        ['verified', 'auth', 'role:ceo|admin|corretor|client']
    );

    Route::get('sobre', 'SobreNosController@index')->middleware(
        ['verified', 'auth', 'role:ceo|admin|corretor|client']
    )->name('sobre.index');
    Route::post('sobre', 'SobreNosController@update')->middleware(
        ['verified', 'auth', 'role:ceo|admin|corretor|client']
    )->name('sobre.update');

    Route::get('termos', 'TermosECondicaoController@index')->middleware(
        ['verified', 'auth', 'role:ceo|admin|corretor|client']
    )->name('termos.index');
    Route::post('termos', 'TermosECondicaoController@update')->middleware(
        ['verified', 'auth', 'role:ceo|admin|corretor|client']
    )->name('termos.update');


    Route::post('/message_send', 'MessageController@store')->name('message_send');
    Route::post('/message_read/{message}', 'MessageController@read')->name('message_read');
