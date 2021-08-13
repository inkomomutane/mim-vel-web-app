<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Denuncia;
use App\Models\Imovel;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.home')->with(
            [
                'imoveis' =>   Imovel::all(),
                'agendas' =>   Agenda::all(),
                'messagens' => Message::all(),
                'denuncias' => Denuncia::all(),
                'imo_views' => visits('App\Models\Imovel')->count(),
                'web_views' => visits('App\Models\WebLink')->count()

            ]
        );
    }
}
