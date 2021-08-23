<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\BannerImages;
use App\Http\Traits\WebVisits;
use App\Models\Denuncia;
use App\Models\Imovel;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    use BannerImages,WebVisits;

    public function index(Imovel $imovel)
    {
        return view('frontend.complaint')->with(['images'=>$this->images('complaint'),'imovel'=>$imovel,'denuncias'=>Denuncia::all()]);
    }

}
