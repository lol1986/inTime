<nav class="navbar-light bg-light p-0">
  <a class="navbar-brand" href="#">Menú gestión</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#adminMenu" aria-controls="adminMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse show navbar-collapse" id="adminMenu">
      <ul class="navbar-nav">
          <li class="nav-item active">
              <a class="nav-link" href={{route('users.index')}}>Gestionar empleados</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Gestionar horarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Gestionar vacaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Gestionar ausencias</a>
          </li>
      </ul>
    </div>
  </nav>