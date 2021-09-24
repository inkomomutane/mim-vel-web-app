<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\WebVisits;
use App\Http\Traits\BannerImages;
use App\Models\Bairro;
use App\Models\Condicao;
use App\Models\Imovel;
use App\Models\Partner;
use App\Models\Status;
use App\Models\TipoDeImovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    use WebVisits,BannerImages;

    public function index()
    {
        $this->visit();
        return  $this->responseView(Imovel::paginate(25));
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
        $pesquisa = "";
        foreach ($request->all() as $key =>  $value) {
            if ($key !== "_token" && $key !== "_method") {
                $pesquisa .= " " . $value;
            }
        }
        try {
            return $this->responseView(Imovel::
            search($pesquisa)
            ->with('bairro')
            ->with('condicao')
            ->with('status')
            ->with('tipo_de_imovels')->paginate(25));
        } catch (\Throwable $th) {
            return $this->responseView([]);
        }
    }

    private function responseView($imoveis){
        return view('frontend.search')
        ->with( [
            'images'=> $this->images('welcome'),
            'imoveis'=> $imoveis,
            'parceiros' => Partner::with('fotos')->get(),
            'bairros' => Bairro::all(),
            'tipo_de_imovels' => TipoDeImovel::all(),
            'conditions' => Condicao::all(),
            'statuses' => Status::all()
        ]);
    }

    public function suites()
    {
        return view('frontend.search')
        ->with( [
            'images'=> $this->images('welcome'),
            'imoveis'=> Imovel::where('suites','>',1)->paginate(25),
            'parceiros' => Partner::with('fotos')->get(),
            'bairros' => Bairro::all(),
            'tipo_de_imovels' => TipoDeImovel::all(),
            'conditions' => Condicao::all(),
            'statuses' => Status::all()
        ]);
    }
    public function disponiveis()
    {
        return view('frontend.search')
        ->with( [
            'images'=> $this->images('welcome'),
            'imoveis'=> Imovel::where('status_id',3)->paginate(25),
            'parceiros' => Partner::with('fotos')->get(),
            'bairros' => Bairro::all(),
            'tipo_de_imovels' => TipoDeImovel::all(),
            'conditions' => Condicao::all(),
            'statuses' => Status::all()
        ]);
    }
}
