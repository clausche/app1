<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		$user = new User();

		$user->name     = 'claudio';
		$user->email    = 'clausche@gmail.com';
		$user->password = bcrypt('zzaszz');
		$user->remember_token = str_random(10);
		$user->save();

	}
}
