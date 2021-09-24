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
        $images = WebLink::where('url',$url)->get();

        if($images->count() > 0 ){
            return $images->first()->fotos->pluck('url');
        }else{
            return collect([]);
        }
    }
}
