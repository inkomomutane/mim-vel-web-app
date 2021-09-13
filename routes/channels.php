<?php

use App\Models\Message;
use App\Models\WebLink;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/


Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('notification', function ()
{
    return true;
});
Broadcast::channel('user.{id}', function ($user, $id) {
    return (int) $user->id == (int) $id;
});

Broadcast::channel('message_get.{toId}', function ($user,$toId) {
    return $user->id === $toId;
});
