<?php

use App\Actions\Website\Contact;

Route::get('/contacto',Contact::class)->name('website.contact');
