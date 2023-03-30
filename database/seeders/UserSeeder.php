<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//
		User::create(
			[
				'first_name' => 'Super',
				'last_name' => 'Admin',
				'email' => 'admin@test.com',
				'username' => 'admin',
				'role' => 'Admin',
				'password' => bcrypt('admin123'),
				'remember_token' => Str::random(10),

			]
		);
	}
}
