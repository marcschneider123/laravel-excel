<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
		'App\Console\Commands\updateMasterCheckData',
		'App\Console\Commands\exportMasterCheckData',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule
			->command('updateMasterCheckData')
//			->call('App\Http\Controllers\CustomerController@checkMastercheck')
//        	->weeklyOn(6, '0:00')
			->everyMinute()
			->appendOutputTo(storage_path('logs/mastercheck_job.txt'))
//			->emailOutputTo(config('app.error_log_mail'))
			;

        $schedule
			->command('exportMasterCheckData')
//        	->weeklyOn(6, '0:00')
			->everyMinute()
			->appendOutputTo(storage_path('logs/mastercheck_job.txt'))
//			->emailOutputTo(config('app.error_log_mail'))
			;
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