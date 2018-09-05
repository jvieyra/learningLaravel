@extends('layout')

@section('contenido')
<h1>Contacto</h1>
	<!-- session -->
	@if(session()->has('info'))
		<h3>{{ session('info') }}</h3>
	@else
	<form  method="POST" action="{{ route('mensajes.store') }}">
		{!! csrf_field() !!}

		@if(auth()->guest())
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}">
						{!! $errors->first(
							'nombre',
							'<span class=error>:message</span>') 
						!!}
					<p></p>	
				</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input class="form-control" type="text" name="email" value="{{ old('email') }}">
				{!! $errors->first('email','<span class=error>:message</span>') !!}
			<p></p>
			</div>
		@endif


		
		<div class="form-group">
			<label for="mensaje">Mensaje</label>
			<textarea class="form-control" name="mensaje">{{ old('mensaje') }}</textarea>
				{!! $errors->first('mensaje','<span class=error>:message</span>') !!}
			<p></p>
		</div>
		
		<button type="submit" class="btn btn-primary">Enviar</button>
	</form>
	@endif
@stop