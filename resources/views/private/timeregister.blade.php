<!DOCTYPE html>
<html lang="es">

@include('partials.public.header')
@include('partials.private.header')

<body>
@include('partials.private.nav')

<div class="row col-lg-12  col-md-12">
  
  @include('partials.private.leftmenu')
  @include('partials.public.content')
  
</div>

@include ('partials.footer')
</body>
</html>