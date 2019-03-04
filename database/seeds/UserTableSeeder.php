<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
	{
		DB::table('users')->delete();

		for($i = 0; $i < 5; ++$i)
		{
			DB::table('users')->insert([
				'name' => 'Nom' . $i,
				'email' => 'email' . $i . '@bakeli.edu.sn',
				'password' => bcrypt('password' . $i),
				'admin' => rand(0, 1)
			]);
		}
	}
}
