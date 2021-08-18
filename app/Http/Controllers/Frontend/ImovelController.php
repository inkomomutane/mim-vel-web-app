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

    public function search(Request $request)
    {
        $validade  = $request->validate([
            'query' => 'required'
        ]);
        if ($validade) {
           $query = $validade['query'];
            return view('frontend.search')->with('imoveis',Imovel::search($query)
            ->with('bairro')
            ->with('condicao')
            ->with('status')
            ->with('tipo_de_imovels')
            ->paginate(15));
        }else{
            return view('frontend.search')->with('imoveis',[]);
        }
    }
}
