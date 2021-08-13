<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\WebVisits;
use App\Models\Imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    use WebVisits;

    public function index()
    {
        $this->visit();
        return view('frontend.search')->with('imoveis',Imovel::paginate(8));
    }

    public function show(Imovel $imovel)
    {
        visits($imovel)->increment();
        $this->visit();
        return view('frontend.imovel')->with('imovel',$imovel);
    }
    public function imoveis()
    {
        $imoveis = Imovel::paginate(15)->map(function($imovel){


                $imovel['image'] = $imovel->fotos->first()?$imovel->fotos->first()->url:'';

                return $imovel;

        });
        return $imoveis;
    }
}
