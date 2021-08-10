<?php

namespace App\Http\Traits;
use App\Models\WebLink;

/**
 *
 */
trait BannerImages
{
    public function images(String $url)
    {
       return WebLink::where('url',$url)->first()->fotos->pluck('url');
    }
}
