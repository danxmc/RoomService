<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.partials.head')
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')
        
        @auth
        @include('layouts.partials.sidebar')
        @endauth

        <main class="py-3 container">
            @auth
            <a href="#" data-target="#sidebar" data-toggle="collapse"><i class="fa fa-navicon fa-2x py-2 p-1"></i></a>
            @endauth
            @yield('content')
        </main>
    </div>
    
    @include('layouts.partials.footer');
</body>
</html>
