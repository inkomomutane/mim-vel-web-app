<?php

namespace App\Actions\Page;

use App\Models\Page;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class GetPage
{
    use AsController;
    use AsAction;


    public function handle() :Page {

        return  Page::first() ?? Page::create([]);
    }




    public function asController()
    {
        return Inertia::render('Page/Index', [
            'pageData' => $this->handle()->getData(),
        ]);
    }
}
