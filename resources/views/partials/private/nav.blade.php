<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
         <a class="nav-link"> Bienvenid@ <b>{{Auth::user()->name}}</b></a>
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