@extends('layout')

@section('contenido')
	<h1>Login</h1>

	<form action="/login" method="POST">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="email" name="email" placeholder="Email">
		</div>
		
		<div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" type="password" name="password" placeholder="Password">
		</div>
		
		<button type="submit" class="btn btn-primary">Entrar</button>
	</form>
@stop