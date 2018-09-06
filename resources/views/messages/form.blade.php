{!! csrf_field() !!}

@if($showFields)
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input class="form-control" type="text" name="nombre" value="{{ $message->nombre or  old('nombre') }}">
				{!! $errors->first(
					'nombre',
					'<span class=error>:message</span>') 
				!!}
			<p></p>	
		</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input class="form-control" type="text" name="email" value="{{ $message->email or old('email') }}">
		{!! $errors->first('email','<span class=error>:message</span>') !!}
	<p></p>
	</div>
@endif


<div class="form-group">
	<label for="mensaje">Mensaje</label>
	<textarea class="form-control" name="mensaje">{{ $message->mensaje or old('mensaje') }}</textarea>
		{!! $errors->first('mensaje','<span class=error>:message</span>') !!}
	<p></p>
</div>

<input type="submit" class="btn btn-primary" value="{{ $btnText or 'Guardar'  }}" />