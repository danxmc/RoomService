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

        <main class="col-md-9 float-left col px-5 pl-md-2 pt-2 main py-3 container">
            @auth
            <a href="#" data-target="#sidebar" data-toggle="collapse"><i class="fa fa-navicon fa-2x py-2 p-1"></i></a>
            @endauth
            @yield('content')
            
            @include('layouts.partials.footer');
        </main>
    </div>
    
</body>
</html>
