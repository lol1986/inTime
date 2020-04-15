<!DOCTYPE html>
<html lang="es">
<head>
  <title>inTime Registro horario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <link href="{{ asset('js/app.js') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <div class="navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="navbar-brand" href="{{route('index')}}">Inicio</a>
      </li>    
      <li class="nav-item active">
        <a class="nav-link" href="{{route('producto')}}">Producto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('contacto')}}">Contacto</a>
      </li>
    </ul>
    <ul class="navbar-nav">
    	<li class="nav-item">
        	<a class="btn btn-success" href="#">Acceder</a>
        </li>
    </ul>
  </div>
</nav>

<div class="jumbotron text-center">
  <div class='overlay'>
    <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h1>InTime -Software de registro horario </h1>
            <p>InTime le permite gestionar de forma sencilla el control del registro horario de su
            empresa</p>
            <p>¿Aún no lo tienes?</p>
            <button class="btn btn-success">SOLICITAR INFORMACIÓN</button>
          </div>
          <div class="col-lg-6">
            <img class="img-fluid" src="img/logo.png">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
<section id="middle">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <img src="img/logo.png" class="logo">
        <p>Intime le permite gestionar de forma sencilla la siguiente información de su empresa:
        	<ul>
        		<li>Datos de empleados</li>
        		<li>Vacaciones y ausencias de los empleados</li>
        		<li>Horas de inicio y fin de la jornada</li>
        		<li>Fichajes de entrada y salida y tiempo de trabajo efectivo</li>
    	    	<li>Pausas de los empleados</li>
    	    </ul>
    	</p>
      </div>
      <div class="col-lg-4">
        <img src="img/logo1.png" class="logo">
        <p>Gracias a inTime además de lo anterior podrá:
        	<ul>
        		<li>Tener centralizado de forma sencilla datos de los empleados de su empresa</li>
        		<li>Obtener reportes sobre las horas trabajadas de sus empleados</li>
        		<li>Obtener reportes y estadísticas sobre las ausencias de sus empleados</li>
        	</ul>	
        </p>
      </div>
      <div class="col-lg-4">
        <img src="img/logo3.png" class="logo">
        <p>¿Quieres conocer más?</p>
      </div>
    </div>
  </div>
</section>

<section id="features">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <h1>Funcionalidades</h1>
        <ul>
          <li><i class="fas fa-check"></i> Control horario</li>
          <li><i class="fas fa-check"></i> Control de ausencias</li>
          <li><i class="fas fa-check"></i> Planificación</li>
        </ul>
      </div>
      <div class="col-lg-4 offset-lg-2">
        <img class="bt-logo" src="img/btlogo.png">
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12">
        <ul>
          <li><a href="{{route('index')}}">Inicio</a></li>
          <li><a href="{{route('contacto')}}">Producto</a></li>
          <li><a href="{{route('contacto')}}">Contacto</a></li>
        </ul>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <p>Copyright &copy;2020, All Rights Reserved</p>
      </div>
    </div>
  </div>
</footer>
</body>
</html>