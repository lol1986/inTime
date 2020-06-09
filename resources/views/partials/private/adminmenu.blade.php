@if(Auth::user()->role->id=='2' || Auth::user()->role->id=='1')
<nav class="navbar-light bg-light p-0">
  <a class="navbar-brand" href="#">Menú gestión</a>
  <button class="navbar-toggler" id="adminbutton" type="button" data-toggle="collapse" aria-controls="adminMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="adminMenu">
      <ul class="navbar-nav">
          <li class="nav-item active">
              <a class="nav-link" href={{route('users.index')}}>Gestionar empleados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{route('usersholidays.index')}}>Gestionar vacaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{route('leaves.index')}}>Gestionar ausencias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{route('timeregistries.index')}}>Gestionar registros</a>
          </li>
      </ul>
    </div>
</nav>
@endif

<script>
    $(document).ready(function(){
      $("#adminbutton").click(function(){
        $("#adminMenu").slideToggle();
      });
    });
</script>