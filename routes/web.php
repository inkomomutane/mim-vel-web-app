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
    Route::get('/filtered_data','ImovelController@results');

    /**
     * Routes for specific filter imovel's
     */
    Route::get('imovel/suites','Frontend\ImovelController@suites');
    Route::get('imovel/disponiveis','Frontend\ImovelController@disponiveis');
    

    Route::post('comentar','Frontend\CommentController@store')->name('comentar');

    Auth::routes([
    'verify' => false,
    'register' => false,
    'reset'=> false,
    'request' =>false
    ]);
    Route::post('/agendar','Frontend\AgendaController@store')->name('agendar_visita');

    Route::get('/denuncia_imovel', 'DenunciaController@index')->name('denuncia_imovel.index')
    ->middleware([  'auth', 'role:ceo|role:admin']);
    Route::get('/home', 'HomeController@index')->name('home')
        ->middleware([  'auth']);

    Route::get('/permission', 'RoleController@index')->name('permissions')
        ->middleware([  'auth', 'role:ceo']);


    Route::resource('bairro', 'BairroController')
        ->middleware([  'auth', 'role:ceo']);

    Route::resource('cidade', 'CidadeController')
        ->middleware([  'auth', 'role:ceo']);

    Route::resource('status', 'StatusController')
        ->middleware([  'auth', 'role:ceo']);
    Route::resource('condicao', 'CondicaoController')
        ->middleware([  'auth', 'role:ceo']);

    Route::resource('tipodeimovel', 'TipoDeImovelController')
        ->middleware([  'auth', 'role:ceo']);
    Route::resource('opcao_denuncie', 'OpcaoDenunciaController')
        ->middleware([  'auth', 'role:ceo']);

    Route::resource('imovel', 'ImovelController')
        ->middleware([  'auth', 'role:ceo|admin|corretor']);
    Route::resource('parceiro', 'PartnerController')
        ->middleware([  'auth', 'role:ceo|admin|corretor']);
    Route::post('parceiro/{parceiro}/store_image', 'PartnerController@store_image')
        ->name('parceiro.store_image')
        ->middleware([  'auth', 'role:ceo']);

    Route::post('parceiro/{parceiro}/delete_image', 'PartnerController@delete_image')
        ->name('parceiro.delete_image')
        ->middleware([  'auth', 'role:ceo']);


    Route::resource('weblink', 'WebLinkController')
        ->middleware([  'auth', 'role:ceo|admin']);

    Route::post('weblink/{weblink}/store_image', 'WebLinkController@store_image')
        ->name('weblink.store_image')
        ->middleware([  'auth', 'role:ceo']);

    Route::post('weblink/{weblink}/delete_image', 'WebLinkController@delete_image')
        ->name('weblink.delete_image')
        ->middleware([  'auth', 'role:ceo']);

    Route::post('imovel/{imovel}/store_image', 'ImovelController@store_image')
        ->name('imovel.store_image')
        ->middleware([  'auth', 'role:ceo']);

    Route::post('imovel/{imovel}/delete_image', 'ImovelController@delete_image')
        ->name('imovel.delete_image')
        ->middleware([  'auth', 'role:ceo']);

    Route::post('pesquisar/imoveis','Frontend\ImovelController@search')
        ->name('imovel.search');

    Route::resource('user', 'UserController')->middleware(
        [  'auth', 'role:ceo']
    );
    Route::resource('message', 'MessageController')->middleware(
        [  'auth', 'role:ceo|admin|corretor|client']
    );
    Route::resource('agenda', 'AgendaController')->middleware(
        [  'auth', 'role:ceo|admin|corretor|client']
    );
    Route::get('sobre', 'SobreNosController@index')->middleware(
        [  'auth', 'role:ceo|admin|corretor|client']
    )->name('sobre.index');
    Route::post('sobre', 'SobreNosController@update')->middleware(
        [  'auth', 'role:ceo|admin|corretor|client']
    )->name('sobre.update');

    Route::get('termos', 'TermosECondicaoController@index')->middleware(
        [  'auth', 'role:ceo|admin|corretor|client']
    )->name('termos.index');
    Route::post('termos', 'TermosECondicaoController@update')->middleware(
        [  'auth', 'role:ceo|admin|corretor|client']
    )->name('termos.update');


    Route::post('/message_send', 'MessageController@store')->name('message_send');
    Route::post('/message_read/{message}', 'MessageController@read')->name('message_read');
