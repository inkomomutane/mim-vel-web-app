<?php


use App\Services\SessionMessageFlasher;

if (! function_exists('flash')) {
    function flash(): SessionMessageFlasher
    {
        return SessionMessageFlasher::getInstance();
    }
}
