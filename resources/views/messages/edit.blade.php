@extends('layout')
@section('contenido')
	<h1>Editar mensaje  de {{ $message->nombre }}</h1>

	<form method="POST" action="{{ route('mensajes.update',$message->id) }}">
		{!! method_field('PUT') !!}
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input class="form-control" type="text" name="nombre" value="{{ $message->nombre}}">
			{!! $errors->first(
				'nombre',
				'<span class=error>:message</span>') 
			!!}
			<p></p>
		</div>
		
		<div class="form-group">
			<label for="email">Email </label>
			<input class="form-control" type="text" name="email" value="{{ $message->email }}">
			{!! $errors->first('email','<span class=error>:message</span>') !!}
			<p></p>
		</div>
		
		<div class="form-group">
			<label for="mensaje">Mensaje</label>
			<textarea class="form-control" name="mensaje">{{ $message->mensaje }}</textarea>
			{!! $errors->first('mensaje','<span class=error>:message</span>') !!}
		<p></p>
		</div>
		
		<button type="submit" class="btn btn-primary btn-sm">Editar</button>
	</form>

@stop