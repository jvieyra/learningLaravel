@extends('layout')

@section('contenido')
<h1>Contacto</h1>
	<!-- session -->
	@if(session()->has('info'))
		<h3>{{ session('info') }}</h3>
	@else
	<form  method="POST" action="{{ route('mensajes.store') }}">
		<!-- edit, create-->
		@include('messages.form',['message'=> new App\Message])
	</form>
	@endif
@stop