<?php


return [
	/*
    |--------------------------------------------------------------------------
    | Import/Export configuration
    |--------------------------------------------------------------------------
    */

	//queue chunk size
	'chunkSize' => env('CHUNK_SIZE', 100),

	//ricoh column widths
	'export' => [
		'countrycode' => 2,
		'salutation' => 10,
		'firstname' => 30,
		'lastname' => 50
	]
];
