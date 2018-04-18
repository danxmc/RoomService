<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.partials.head')
</head>
<body>

    @include('layout.partials.nav')

    <div class="container">
        @yield('content')
    </div>

    @include('layout.partials.footer')

    @include('layout.partials.footer-scripts')
</body>
</html>