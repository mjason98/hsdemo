<?php

namespace App\Listeners;

use App\Events\NewUserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

use App\Models\AdminEmails;

class SendNewUserNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(NewUserCreated $event)
    {
        $user = $event->user;

        $admins = AdminEmails::all();

        foreach($admins as $admin)
        {
            Mail::to($admin->email)->send(new \App\Mail\NewUserNotification($user));
        }
    }
}
