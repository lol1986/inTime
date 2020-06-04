<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
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
              <a class="btn btn-success" href="{{route('login')}}">Acceder</a>
          </li>
      </ul>
    </div>
</nav>