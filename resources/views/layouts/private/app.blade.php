<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.private.header')
<body>
    @include('partials.private.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
@include ('partials.public.footer')
</body>
</html>