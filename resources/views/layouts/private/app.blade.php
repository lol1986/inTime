<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.private.header')
<body>
    @include('partials.private.nav')
    <div class="row col-lg-12  col-md-12">
        @include('partials.private.leftmenu')
        <main class="container col-lg-8 col-md-9">
            @yield('content')
        </main>
    </div>
    @include ('partials.public.footer')
</body>
</html>