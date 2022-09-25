<?php

namespace App\Http\Controllers;

use Flasher\Notyf\Prime\NotyfFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $flasher;

    function __construct(NotyfFactory $flasher)
    {
        $this->flasher = $flasher->ripple(true)->position('y','top');
    }
}
