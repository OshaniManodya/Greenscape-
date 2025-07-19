<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('partials.navbar')
    <main class="container mx-auto">
        @yield('content')  
    </main>
    @include('partials.footer')
</body>
</html>