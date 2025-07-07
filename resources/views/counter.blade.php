<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Counter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded shadow text-center">
        <h1 class="text-2xl font-bold mb-4">Laravel Blade Counter</h1>

        <form method="POST" action="/">
            @csrf
            <input type="hidden" name="count" value="{{ session('count', 0) + 1 }}">
            <p class="text-xl mb-4">Current Count: {{ session('count', 0) }}</p>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Increment
            </button>
        </form>
    </div>

</body>
</html>
