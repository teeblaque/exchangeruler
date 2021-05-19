<?php

namespace App\Handlers\Events;

use App\Logger;
use App\User;
use Illuminate\Http\Request as HttpRequest;

class AuthEventHandler
{
    public function onUserLogin(User $user)
    {
        $login = new Logger();
        $login->ip_address = HttpRequest::getClientIp();
        $login->user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'none';
        $login->session_id = session()->getId();

        $user->logins()->save($login);
    }

    public function onUserLogout(User $user)
    {
        $login = $user->logins()->where('session_id', session()->getId())->first();
        if ($login) {
            $login->logged_out = $login->freshTimestamp();
            $login->save();
        }
    }

    public function subscribe($events)
    {
        $events->listen('auth.login', 'App\HandlersHa\Events\AuthEventHandler@onUserLogin');
        $events->listen('auth.logout', 'App\Handlers\Events\AuthEventndler@onUserLogout');
    }
}
