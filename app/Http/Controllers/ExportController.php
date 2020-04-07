<?php

namespace App\Http\Controllers;

use App\Exports\Export;
use App\Exports\ExportQueued;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
	public function __construct()
	{
		//
	}

	/**
	 * Do excel exports (stored in storage/app)
	 * @throws \PhpOffice\PhpSpreadsheet\Exception
	 * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
	 */
	public function export()
	{
		//non queued export, working
		Excel::store(new Export(), 'export.dat', null, \Maatwebsite\Excel\Excel::CSV);

		//queue not working, customvaluebinder not used on ShouldQueue
		(new ExportQueued())->store('export_queued.dat', null,  \Maatwebsite\Excel\Excel::CSV)
			->allOnQueue('export')
		;

		dump("export done");
	}
}
