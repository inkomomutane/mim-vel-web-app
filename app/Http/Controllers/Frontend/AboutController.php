<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\BannerImages;
use App\Http\Traits\WebVisits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    use BannerImages,WebVisits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->visit();
        if (Storage::exists('sobre.dat')) {
            $request  = Storage::get('sobre.dat');
            return view('frontend.about')->with(['images'=>$this->images('about'),'sobre'=> $request]);
        }


        return view('frontend.about')->with(['images'=>$this->images('about'),'sobre'=>'']);
    }
}
