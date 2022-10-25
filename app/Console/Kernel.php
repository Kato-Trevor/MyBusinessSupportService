<?php

namespace App\Console;

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
        $schedule->command('participant:everyMinute')
        ->everyMinute()
        ->appendOutputTo('participantschedule.log');

        $schedule->command('product:everyMinute')
        ->everyMinute()
        ->appendOutputTo('productschedule.log');

        // $schedule->command('addStock:everyMinute')
        // ->everyMinute()
        // ->appendOutputTo('addstock.log');

        $schedule->command('verification:everyMinute')
        ->everyMinute()
        ->appendOutputTo('verification.log');

        $schedule->command('performance:everyMinute')
        ->everyMinute()
        ->appendOutputTo('performanceschedule.log');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
