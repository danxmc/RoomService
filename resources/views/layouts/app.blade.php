<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.partials.head')
</head>
<body data-spy="scroll">
@include('layouts.partials.navbar')
@yield('content')
@include('layouts.partials.footer')
@include('layouts.partials.scripts')
</body>
</html>
