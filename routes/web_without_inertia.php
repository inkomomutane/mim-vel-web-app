<?php

use App\Actions\Website\Welcome;

Route::get('/', Welcome::class)->name('welcome');

foreach (new FilesystemIterator(__DIR__.'/website') as $fileinfo) {
    require $fileinfo->getPathname();
}
