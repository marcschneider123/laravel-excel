<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// create user
		$user = new User;
		$user->name = 'admin';
		$user->email = 'admin@example.com';
		$user->password = bcrypt('admin');
		$user->save();
	}
}
