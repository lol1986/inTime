<!DOCTYPE html>
<html lang="es">

@include('partials.header')
@include('privatePartials.header')

<body>
@include('privatePartials.nav')

<div class="row col-lg-12  col-md-12">
  
  @include('privatePartials.leftmenu')
  @include('pages.content')
  
</div>

@include ('partials.footer')
</body>
</html>