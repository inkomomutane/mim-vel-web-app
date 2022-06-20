<?php

namespace App\Http\Controllers;

use App\Aspect\PostSearchAspect;
use App\Helpers\CollectionPaginator;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class PostSearchController extends Controller
{
    public function search()
    {
        if(request()->home_link){
        return view('website.posts',[
            'search' => request()->search
        ])
        ->with('posts', (((new Search())
        ->registerAspect(PostSearchAspect::class)
        ->search(request()->search ?? ''))
        ->pluck('searchable')->where('for_rent',request()->rent == 1)));
        }else{
            return view('website.posts',[
                'search' => request()->search
            ])
            ->with('posts', (((new Search())
            ->registerAspect(PostSearchAspect::class)
            ->search(request()->search ?? ''))
            ->pluck('searchable')->where('for_rent',request()->rent == 1)));
        }
    }
}
