<?php

use App\Actions\Message\DeleteMessage;
use App\Actions\Message\GetMessages;
use App\Actions\Message\UpdateMassageReadState;

Route::get('dashboard/messages', GetMessages::class)->middleware(['auth', 'verified'])->name('message.all');
Route::patch('dashboard/message/{agenda}', UpdateMassageReadState::class)->middleware(['auth', 'verified'])->name('message.update');
Route::delete('dashboard/message/{agenda}/delete', DeleteMessage::class)->middleware(['auth', 'verified'])->name('message.delete');
