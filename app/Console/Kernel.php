<?php

namespace App\Console;

use App\Models\User;
use App\Notifications\MyDatabaseNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Retrieve users and dynamically send notifications based on certain conditions
            $users = User::all();
            foreach ($users as $user) {
                $user->notify(new MyDatabaseNotification([
                    'message' => 'This is a dynamic notification!',
                    'url' => '/notifications',
                    'date' => now(),
                ]));
            }
        })->hourly(); // Adjust the schedule as needed
    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
