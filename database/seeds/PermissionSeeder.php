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
			['name' => 'see_notes', 'label' => 'Can see notes'],
			['name' => 'create_notes', 'label' => 'Can create notes'],
			['name' => 'edit_notes', 'label' => 'Can edit notes'],
			['name' => 'delete_notes', 'label' => 'Can delete notes'],
			['name' => 'see_drafts', 'label' => 'Can see drafts'],
			['name' => 'create_drafts', 'label' => 'Can create drafts'],
			['name' => 'edit_drafts', 'label' => 'Can edit drafts'],
			['name' => 'delete_drafts', 'label' => 'Can delete drafts']
		];
		
        App\Permission::insert($permissions);
    }
}
