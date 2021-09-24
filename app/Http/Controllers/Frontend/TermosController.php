<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\BannerImages;
use App\Http\Traits\WebVisits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TermosController extends Controller
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
        if (Storage::exists('termos.dat')) {
            $request  = Storage::get('termos.dat');
            return view('frontend.termos')->with(['images'=>$this->images('termos'),'termos'=> $request]);
        }
        return view('frontend.termos')->with(['images'=>$this->images('termos'),'termos'=>'']);
    }
}
