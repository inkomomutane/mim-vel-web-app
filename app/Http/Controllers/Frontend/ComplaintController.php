<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\BannerImages;
use App\Http\Traits\WebVisits;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    use BannerImages,WebVisits;

    public function index()
    {
        $this->visit();
        return view('frontend.complaint')->with(['images'=>$this->images('complaint')]);
    }
}
