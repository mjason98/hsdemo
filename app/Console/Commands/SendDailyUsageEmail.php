<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailyUsageEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-daily-usage-email';

    protected $description = 'Send a daily usage email to all users';

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            // Customize the email content and subject as needed
            Mail::to($user->email)->send(new \App\Mail\DailyUsageEmail($user));
        }

        $this->info('Daily usage emails sent successfully.');
    }
}
