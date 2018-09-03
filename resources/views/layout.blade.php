<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mi sitio</title>
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	<header>

		<?php
			function activeMenu($url){
				return request()->is($url) ? 'active' : '';
			}
		?>
		
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    	<li class="nav-item {{ activeMenu('/') }}" >
    		<a class="nav-link" href="{{ route('home') }}">Inicio </a>
    	</li>
    	<li class="nav-item {{activeMenu('saludo') }}">
    		<a class="nav-link" href="{{ route('saludo') }}">Saludos </a>
    	</li>
			<li class="nav-item {{ activeMenu('mensajes/create')}}">
				<a class="nav-link" href="{{ route('mensajes.create') }}">Contacto </a>
			</li>

			@if(auth()->check())
				<li class=" nav-item {{ activeMenu('mensajes')}}">
					<a class="nav-link" href="{{ route('mensajes.index') }}"> Mensajes</a>
				</li>
				<li class="nav-item dropdown">
        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ auth()->user()->name }}
        	</a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="/logout">Cerrar sesión</a>
	         
	        </div>
      </li>
			@endif
			
			@if(auth()->guest())
				<li class="nav-item {{ activeMenu('login')}}">
					<a class="nav-link" href="/login"> Login</a>
				</li>
			@endif
      

    </ul>
  </div>
</nav>

	</header>
	<div class="container">
		@yield('contenido')	
	</div>
	
	<footer></footer>
	<script src="/js/all.js"></script>
</body>
</html>