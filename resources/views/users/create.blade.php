@extends('layout')

@section('contenido')
	<h1>Crear usuario</h1>
	<form method="POST" action="{{ route('usuarios.store') }}">
		
		
			@include('users.form',['user'=> new App\User])
			

		
			<button type="submit" class="btn btn-primary btn-sm">Guardar</button>
		</form>
@stop