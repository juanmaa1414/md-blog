<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('notes', 'NotesController');

Route::get('test', function() {
	//Auth::loginUsingId(1);
	//echo Illuminate\Support\Facades\Auth::id();
	//$this->authorize('create-notes'); // esto para controllers
	if (Gate::denies('create-notes')) {
		abort(404);
	}
	/*
	$p = \App\Permission::create([
		'name'=>'show_drafts',
		'label'=>'Ver borradores'
	]);
	$r = \App\Role::create([
		'label'=>'Moderator'
	]);

	$r->givePermission($p);
	dd($r->permissions->all());
	*/


	$u1 = \App\User::findOrFail(1);
	$res = \App\Note::create([
		'title' => 'An example note!',
		'slug' => str_slug('An example note!'),
		'user_id' => $u1->id,
		'published' => true,
		'upvotes' => 0,
		'content' => '__Test 123__'
	]);

	//var_dump($u1->hasAccess(['show-drafts', 'show-notes']));
	echo 'aqui hay<br>';
	var_dump($res);

});

Route::get('test2', function() {
	
});

