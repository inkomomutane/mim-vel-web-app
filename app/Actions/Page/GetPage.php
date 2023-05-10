<?php

namespace App\Actions\Page;

use App\Models\Page;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class GetPage
{
   use AsController;

   public function asController()
   {
     $page = Page::first() ?? Page::create([]);
       return Inertia::render('Page/Index',[
        'pageData' => $page->getData()
       ]);
   }
}
