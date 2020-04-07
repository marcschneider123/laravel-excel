<?php

use App\Import;
use Illuminate\Database\Seeder;

class ImportsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = \Faker\Factory::create();

		for ($i=0;$i<20;$i++) {
			// create import
			$import = new Import;
			$import->countrycode = 'DE';
			$import->salutation = $faker->randomElement(['Herr', 'Frau', 'Firma']);
			$import->firstname = $faker->firstName;
			$import->lastname = $faker->lastName;
			$import->export = true;

			$import->save();
		}
	}
}
