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
	//if (Gate::denies('create-notes')) {
	//	abort(404);
	//

});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
	Route::group(['prefix' => 'notes'], function () {
		Route::get('search_tags', 'Admin\NotesController@jsonSearchTags');
	});
	Route::resource('notes', 'Admin\NotesController');
});

