@extends('layout')

@section('contenido')
	<h1>Editar usuario</h1>

		@if(session()->has('info'))

		<div class="alert alert-success" role="alert">
  		{{ session('info') }}
		</div>
			
		@endif
		<form method="POST" action="{{ route('usuarios.update',$user->id) }}">
		{!! method_field('PUT') !!}
		
			@include('users.form')


		
			<button type="submit" class="btn btn-primary btn-sm">Editar</button>
		</form>

@stop