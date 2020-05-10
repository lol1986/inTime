
<div class="text-center">
  <div class='overlay'>
    <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h1>InTime -Software de registro horario </h1>
          </div>
          <div class="col-lg-6">
            <img class="img-fluid" src="img/logo.png">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="navbar-brand" href="{{route('index')}}">Bienvenido <b>Francisco Álvarez García</b></a>
        </li>    
      </ul>
      <ul class="navbar-nav">        
        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
      </ul>
    </div>
</nav>