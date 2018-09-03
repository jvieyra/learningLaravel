<?php

/*tipos de rutas */
Route::get('test',function(){
	$user = new App\User;
	$user->name = 'Alan';
	$user->email = 'alan@gmail.com';
	$user->password = bcrypt('secret');
	$user->role = 'estudiante';
	$user->save();

	return $user;
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



