<?php

namespace App\Console\Commands;

use App\Http\Controllers\CustomerController;
use Illuminate\Console\Command;

/**
 * Class updateMasterCheckData
 * @package App\Console\Commands
 * @url https://appdividend.com/2018/03/01/laravel-cronjob-scheduling-tutorial/
 */
class updateMasterCheckData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateMasterCheckData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetch & update Mastercheck data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo now() . ": Updating Mastercheck data\n";
		$controller = new CustomerController();
		$controller->checkMastercheck();
    }
}
