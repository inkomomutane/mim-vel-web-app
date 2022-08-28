<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Imovel;
use App\Models\TipoDeImovel;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('website.welcome', [
            'destacados' => Imovel::count() > 8 ?
                Imovel::with('ratings')
                ->with('comentarios')
                ->with('media')
                ->with('corretor')
                ->get()->take(8) :
                Imovel::with('ratings')
                ->with('comentarios')
                ->with('corretor')
                ->get(),
            'recents' => Imovel::count() > 3 ?
                Imovel::orderBy('created_at', 'desc')
                ->with('ratings')
                ->with('media')
                ->with('comentarios')
                ->with('corretor')
                ->take(3)->get() :
                Imovel::with('ratings')
                ->with('comentarios')
                ->with('corretor')
                ->get(),
            'banners' => !is_null(Banner::first()) ?
                Banner::first()->media()->where('collection_name', 'banners')->get() :
                null,
            'icons' => TipoDeImovel::has('media')->with('media')->get()
        ]);
    }
}
