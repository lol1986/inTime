<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.public.header')
<body>
    @include('partials.public.nav')
        <main>
            @yield('content')
        </main>
    @include ('partials.public.footer')
</body>
</html>