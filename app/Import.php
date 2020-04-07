<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
	protected $fillable = [
		'countrycode',
		'salutation',
		'firstname',
		'lastname',
		'export'
	];
}
