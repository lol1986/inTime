@if(Auth::user()->role->id=='1' || Auth::user()->role->id=='2' || Auth::user()->role->id=='3')
<nav class="navbar-light bg-light p-0">
    <a class="navbar-brand" href="#">Menú usuario</a>
    <button class="navbar-toggler"  id="userbutton" type="button" data-toggle="collapse" aria-controls="userMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse show navbar-collapse" id="usermenu">
      <ul class="navbar-nav"> 
          <li class="nav-item active">
              <a class="nav-link" href="/home">Registro de jornada</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/usersholidays/create">Solicitar vacaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/leaves/create">Gestionar ausencias</a>
          </li>
      </ul>
    </div>
</nav>
@endif

<script>
    $(document).ready(function(){
      $("#userbutton").click(function(){
        $("#usermenu").slideToggle();
      });
    });
</script>