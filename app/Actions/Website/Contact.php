<?php

namespace App\Actions\Website;

use Lorisleiva\Actions\Concerns\AsController;

class Contact
{
    use AsController;

    public function asController()
    {
        return view('website.contact');
    }
}
