<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perm1 = App\Permission::find(1);
		$perm2 = App\Permission::find(2);

		$r1 = App\Role::create(['label' => 'Admin']);
		$r1->givePermission($perm1);
		$r1->givePermission($perm2);

		$r2 = App\Role::create(['label' => 'Moderator']);
		$r2->givePermission($perm1);
		$r2->givePermission($perm2);
    }
}
