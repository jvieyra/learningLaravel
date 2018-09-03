@extends('layout')

@section('contenido')
	<h1>Todos los mensajes.</h1>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Mensajes</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($messages as $message)
				<tr>
					<td>{{ $message->id }}</td>
					<td>
						<a href="{{ route('mensajes.show',$message->id) }}">
							{{ $message->nombre }}
						</a>
					</td>
					<td>{{ $message->email }}</td>
					<td>{{ $message->mensaje }}</td>
					<td>
						<a class="btn btn-primary btn-sm" href="{{ route('mensajes.edit',$message->id) }}">
							Editar
						</a>
						<form method="POST" action="{{ route('mensajes.destroy', $message->id) }}">
							{!! method_field('DELETE') !!}

							{!! csrf_field() !!}
							
							<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop