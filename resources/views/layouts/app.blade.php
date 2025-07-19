<!DOCTYPE html>
<html>
<head>
    <title>Plant Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('partials.navbar') <!-- Shared navigation -->
    @yield('content') <!-- Dynamic content from child views -->
    @include('partials.footer') <!-- Shared footer -->
</body>
</html>