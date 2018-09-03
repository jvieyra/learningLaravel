<?php

/*tipos de rutas */
Route::get('test',function(){
	$user = new App\User;
	$user->name = 'Pablo';
	$user->email = 'vieyrapez@gmail.com';
	$user->password = bcrypt('secret');
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

Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');



