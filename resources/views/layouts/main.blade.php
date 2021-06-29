<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- FONT Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!--CSS Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>

    <body class="antialiased">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="cloapse navbar-colapse" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Tabela</a>
                        </li>
                        <li class="nav-item">
                            <a href="/grafico/375/22/data,desc/2010-01-01" class="nav-link">Grafico</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        @yield('content')

        <footer>
            <p style="text-align: right;">&copy; 2021</p>
        </footer>

        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </body>
</html>
