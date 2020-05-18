<?php

namespace App\Exports;

use App\Helpers\StringHelper;
use App\Import;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class Export extends DefaultValueBinder implements FromQuery, WithCustomCsvSettings, WithCustomValueBinder, WithStrictNullComparison
{
	use Exportable;

	private $columns;
	private $columnWidths = array();
	private $columnNames = array();

	public function __construct()
	{
		$this->columns = config('importexport.export');
		foreach ($this->columns as $key => $val) {
			array_push($this->columnWidths, $val);
			array_push($this->columnNames, $key);
		}
	}

	public function query() {
		return Import::query()->where('export', true)->select($this->columnNames);
	}

	public function getCsvSettings(): array
	{
		return [
			'delimiter' => '',
			'enclosure' => '',
		];
	}

	/**
	 * Export with column string padding
	 * @param Cell $cell
	 * @param mixed $value
	 * @return bool
	 * @throws \PhpOffice\PhpSpreadsheet\Exception
	 */
	public function bindValue(Cell $cell, $value)
	{
		//colidx starts at 1
		$columnIdx = Coordinate::columnIndexFromString($cell->getColumn()) - 1;

		$value = StringHelper::mb_str_pad($value, $this->columnWidths[$columnIdx]);

		return parent::bindValue($cell, $value);
	}
}
