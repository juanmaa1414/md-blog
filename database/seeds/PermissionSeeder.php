<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$permissions = [
			['name' => 'see-notes', 'label' => 'Can see notes'],
			['name' => 'create-notes', 'label' => 'Can create notes'],
			['name' => 'edit-notes', 'label' => 'Can edit notes'],
			['name' => 'delete-notes', 'label' => 'Can delete notes'],
			['name' => 'see-drafts', 'label' => 'Can see drafts'],
			['name' => 'create-drafts', 'label' => 'Can create drafts'],
			['name' => 'edit-drafts', 'label' => 'Can edit drafts'],
			['name' => 'delete-drafts', 'label' => 'Can delete drafts']
		];
		
        App\Permission::insert($permissions);
    }
}
