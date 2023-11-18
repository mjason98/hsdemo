<?php

namespace App\Listeners;

use App\Events\NewUserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewUserNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(NewUserCreated $event)
    {
        $user = $event->user;

        Mail::to('admin@mail.com')->send(new \App\Mail\NewUserNotification($user));
    }
}
