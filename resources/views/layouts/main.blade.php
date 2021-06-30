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

    </head>

    <body class="antialiased">

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">

                <a href="/" class="nav-link">
                    <img style="width: 300px;" src="http://www.funceme.br/wp-content/uploads/2021/04/FUNCEME-ORGAO-SEC-INVERTIDA-WEB-BRANCA.svg" alt="Fundação Cearense de Metereologia e Recursos Hídricos">
                </a>

                <div class="cloapse navbar-colapse justify-content-center id="navbar">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item" style="width:150px; text-align:center;">
                            <a href="/tabela/375/22/data,desc/2010-01-01" class="nav-link">TABELA</a>
                        </li>
                        <li class="nav-item" style="width:150px; text-align:center;">
                            <a href="/grafico/375/22/data,desc/2010-01-01" class="nav-link">GRÁFICO</a>
                        </li>
                        <li class="nav-item" style="width:150px; text-align:center;">
                            <a href="/agenda" class="nav-link">AGENDA</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        @yield('content')

        <footer class="text-muted" style="position:fixed; bottom:0;">
            <p style="text-align: right;">&copy; 2021</p>
        </footer>

        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </body>
</html>
