<?php

use App\Actions\Website\Contact;
use App\Actions\Website\SendMessage;

Route::get('/contacto', Contact::class)->name('website.contact');
Route::post('/contacto/send/message', SendMessage::class)->name('website.contact.send.message');
