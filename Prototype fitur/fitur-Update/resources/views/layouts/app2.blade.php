<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SIHADIR</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <!-- Footer Anda di sini -->
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
