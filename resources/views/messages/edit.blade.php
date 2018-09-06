@extends('layout')
@section('contenido')
	<h1>Editar mensaje  de {{ $message->nombre }}</h1>

	<form method="POST" action="{{ route('mensajes.update',$message->id) }}">
		{!! method_field('PUT') !!}
		<!-- edit, create-->
		@include('messages.form',
						[
							'btnText'=> 'Actualizar',
							'showFields' => ! $message->user_id])
	</form>

@stop 