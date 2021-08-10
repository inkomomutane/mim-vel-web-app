<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function index()
    {
        return [];
    }

    public function show(Imovel $imovel)
    {
        return view('frontend.imovel')->with('imovel',$imovel);
    }
}
