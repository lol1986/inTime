@extends('layouts.public.app')
@section('content')
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
            <img class="img-fluid" src="images/logo.png">
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
        <div class="justify-content-left d-flex align-items-center row">
          <img src="images/1_sm.png" class="logo">
          <h2>Planificación</h2>
        </div>
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
        <div class="justify-content-left d-flex align-items-center row">
          <img src="images/6_sm.png" class="logo">
          <h2>Control</h2>
        </div>
        <p>Gracias a inTime además de lo anterior podrá:
        	<ul>
        		<li>Tener centralizado de forma sencilla datos de los empleados de su empresa</li>
        		<li>Obtener reportes sobre las horas trabajadas de sus empleados</li>
        		<li>Obtener reportes y estadísticas sobre las ausencias de sus empleados</li>
        	</ul>	
        </p>
      </div>
      <div class="col-lg-4">
        <div class="justify-content-left d-flex align-items-center row">
          <img src="images/2_sm.png" class="logo">
          <h2>Productividad</h2>
        </div>
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
      <div class="col-lg-4 offset-lg-2 justify-content-left d-flex align-items-center row">
        <img class="bt-logo" src="images/logo300.png">
        <h5>InTime ®</h5>
      </div>
    </div>
  </div>
</section>
@endsection