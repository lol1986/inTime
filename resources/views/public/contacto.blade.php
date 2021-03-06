@extends('layouts.public.app')

@section('content')
<section id="middle">
  <div class="container justify-content-center">
    <div class="row col-md-8 offset-md-2">
      <h2>Te atendemos de forma personalizada</h2>
      <p>
        Si tienes cualquier consulta completa tus datos y envía este formulario.
        <br/>
        Contactaremos contigo para brindarte atención personalizada,
        podemos resolver todas tus dudas y mostrarte todas las ventajas de InTime en directo.
      </p>
    </div>
      <div class="row justify-content-center">
        <form class='m-5 col-md-8'>
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre">   
          </div>
          <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" placeholder="Apellidos">   
          </div>
          <div class="form-group">
            <label for="empresa">Empresa</label>
            <input type="text" class="form-control" id="empresa" placeholder="Empresa">
          </div>
          <div class="form-group">
            <label for="empleados">Número empleados</label>
            <input type="text" class="form-control" id="empleados" placeholder="Número empleados">
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" placeholder="Teléono">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="privacidad">
              <label class="form-check-label" for="privacidad">He leído y acepto la política de privacidad</label>
            </div>
          </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection