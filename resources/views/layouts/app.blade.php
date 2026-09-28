<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <header class="bg-dark text-white py-3">
        <div class="container">
            <h1 class="h3 mb-0">MY NEW HEADING</h1>
        </div>
    </header>

    @include('partials._nav')

    <main class="container py-4">
        @yield('content')
    </main>

    <footer class="container border-top py-3 text-muted">
        Made by Rostom P. Vigil
    </footer>

</body>
</html>