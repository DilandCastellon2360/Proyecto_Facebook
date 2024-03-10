<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Facebook')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Tu CSS principal -->
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('users.index') }}"><img src="{{ asset('img/Users.png') }}" alt="Users"></a></li>
            <li><a href="{{ route('posts.index') }}"><img src="{{ asset('img/Posts.png') }}" alt="Posts"></a></li>

            <!-- Botón principal para mostrar los botones de impresión -->
            <li><a href="#" id="print-button">
                <img src="{{ asset('img/Print.png') }}" alt="Print"></a>
            </li>

            <!-- Botones de impresión (inicialmente ocultos) -->
            <div class="print-buttons">
                <li><a href="{{ route('users.pdf') }}">PDF Usuarios</a></li>
                <li><a href="{{ route('posts.pdf') }}">PDF Posts</a></li>
            </div>
        </ul>
    </nav>

    <div class="container">
        <img src="{{ asset('img/Logo.png') }}" alt="Logo de Facebook" style="width: 60px; height: 60px; position: absolute; top: 14px; left: 15px;">
        @yield('content')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const printButton = document.getElementById('print-button');
            const printButtons = document.querySelector('.print-buttons');

            printButton.addEventListener('click', function() {
                printButtons.style.display = (printButtons.style.display === 'none') ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
