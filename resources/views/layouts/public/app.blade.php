<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.public.header')
<body>
    @include('partials.public.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
@include ('partials.public.footer')
</body>
</html>