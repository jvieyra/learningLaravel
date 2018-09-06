<?php

/*tipos de rutas */
Route::get('test',function(){

	/*
	$user = new App\User;
	$user->name = 'Jules';
	$user->email = 'jules@gmail.com';
	$user->password = bcrypt('secret');
	$user->save();
	return $user;
	*/

	// $role = new App\Role;
	// $role->name = "mod";
	// $role->display_name = "Moderador";
	// $role->description = "Este role tiene permisos de Moderador";
	// $role->save();
	// return $role;

});


// DB::listen(function($query){
// 	/*Muestra en pantalla las consultas sql eloquent*/
// 	echo "<pre><{ $query->sql }/pre>";

// 	/*Tiempo de carga de las consultas sql*/
// 	//echo "<pre><{ $query->time }/pre>";
// });



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



