<div class="text-center">
  <div class="container d-flex justify-content-around align-items-center">
    <div class="d-flex">
      <div class="p-2">
        <div class="">
          <div>
            <img class="bt-logo" src="{{URL::asset('/images/logo120.png')}}">
            <h5>InTime ®</h5>
          </div>
        </div>   
      </div>
    </div> 
      <div class="d-flex">
        <div class="p-2">
          <h1>InTime -Software de registro horario </h1>
        </div>
      </div>
    </div>
</div>

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
         <a class="nav-link">Bienvenido <b>{{Auth::user()->name}}</b></a>
        </li>    
      </ul>
      <ul class="navbar-nav">        
        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();">
            <img class="m-1" width='15px' src="/images/logout.png">
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </ul>
    </div>
</nav>