<?php

/*tipos de rutas */
Route::get('test',function(){
/*	$user = new App\User;
	$user->name = 'John';
	$user->email = 'bonachon@gmail.com';
	$user->password = bcrypt('secret');
	
	$user->save();

	return $user;*/

	$role = new App\Role;
	$role->name = "estudiante";
	$role->display_name = "Estudiante";
	$role->description = "Este role tiene permisos de estudiante";
	$role->save();
	return $role;

});



Route::get('/', ['as' => 'home','uses' => 'PagesController@home']);


##Validacion de tipo de datos, acepta solo letras
Route::get('saludo/{nombre?}',
	[
		'as' => 'saludo',
		'uses'=> 'PagesController@saludo']
)->where('nombre','[A-Za-z]');


Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');

Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');


Route::get('roles',function(){
	return \App\Role::with('user')->get();
});



