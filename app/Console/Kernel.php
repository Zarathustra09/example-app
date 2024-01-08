<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        //  // Schedule the command to run daily at 9 AM
        // $schedule->command('membership:send-expiration-emails')->dailyAt('09:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        // $this->commands([
        //     \App\Console\Commands\SendMembershipExpirationEmails::class,
        // ]);

        require base_path('routes/console.php');
    }
}
