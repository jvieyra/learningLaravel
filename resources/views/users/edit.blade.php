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
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input class="form-control" type="text" name="name" value="{{ $user->name}}">
			{!! $errors->first(
				'name',
				'<span class=error>:message</span>') 
			!!}
			<p></p>
		</div>
		
		<div class="form-group">
			<label for="email">Email </label>
			<input class="form-control" type="text" name="email" value="{{ $user->email }}">
			{!! $errors->first('email','<span class=error>:message</span>') !!}
			<p></p>
		</div>
		

		
		<button type="submit" class="btn btn-primary btn-sm">Editar</button>
	</form>

@stop