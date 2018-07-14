<?php

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
        $r1 = App\Role::find(1);
	
		factory(App\User::class)->create([
			'name' => 'Juan M. Fernandez',
			'email' => 'user@myemail.com',
			'password' => bcrypt('admin'),
			'country_num' => 1
		])->assignRole($r1); // Assigning Admin.
    }
}
