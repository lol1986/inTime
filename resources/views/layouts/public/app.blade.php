<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.header')
<body>
    @include('partials.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
@include ('partials.footer')
</body>
</html>