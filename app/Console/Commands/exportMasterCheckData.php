<?php

namespace App\Console\Commands;

use App\Http\Controllers\ExportsController;
use Illuminate\Console\Command;

/**
 * Class exportMasterCheckData
 * @package App\Console\Commands
 * @url https://appdividend.com/2018/03/01/laravel-cronjob-scheduling-tutorial/
 */
class exportMasterCheckData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exportMasterCheckData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'export Mastercheck data';

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
        echo now() . ": Exporting Mastercheck data\n";
		$controller = new ExportsController();
		$controller->export();
    }
}
