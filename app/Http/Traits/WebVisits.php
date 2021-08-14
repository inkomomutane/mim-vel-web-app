<?php
namespace App\Http\Traits;

use App\Models\WebLink;

/**
 *
 */
trait WebVisits
{
    public function visit()
    {
        $web = WebLink::where('url','views')->where('icon','fa fa-eye')->first();
            if($web)
             visits($web)->increment();
            else
        return $web;
    }
}
