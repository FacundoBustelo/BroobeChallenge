<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broobe Challenge</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="banner">
        <img src="{{ asset('images/logo.jpg') }}" alt="Banner"> <!-- esto es un banner -->
    </div>
    <nav class="navbar">
        <div class="navbar-container">
            <ul class="navbar-menu">
                <li class="navbar-item"><a href="/">Run Metric</a></li>
                <li class="navbar-item"><a href="/metric-history">Metric History</a></li>
            </ul>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
