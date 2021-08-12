<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\BannerImages;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Jorenvh\Share\Share;

class WelcomController extends Controller
{
    use BannerImages;
    public function index()
    {

        return view('frontend.welcome')->with(
        [
            'images'=>$this->images('welcome'),
            'destacados'=> $this->imoveis(),
            'procurados_por_localizacao'=> $this->imoveis(),

        ]);
    }

    public function imoveis()
    {
        $imoveis = Imovel::all()->map(function($imovel){
            $share = new Share();
                $imovel['image'] = $imovel->fotos->first()?$imovel->fotos->first()->url:'';
                return $imovel;

        });
        if($imoveis->count() > 9){
            return $imoveis->random(9);
        }
        return $imoveis;
    }
}
