<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="/assets/css/fontawesome.css" rel="stylesheet">
    <link href="/assets/css/solid.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/font-awesome.min.css" rel="" media="all">

    <title>@yield('titulo')</title>
    <link rel="stylesheet" href={{ asset('css/bootstrap.css') }}>
    <script src={{ asset("js/bootstrap.min.js") }}></script>

    <style>
        .contenedor{
            display: flex;
        }

        .navbar {
            background-color: #3498db;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-nav .nav-link:hover {
            color: #ecf0f1;
        }
        .navbar-nav .nav-link.active {
            font-weight: bold;
        }
        .container {
            margin-top: 80px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            background-color: #34495e;
            color: #ecf0f1;
            padding: 10px;
        }

    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Proximamente menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">menu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="container">
            @yield('contenido')
        </div>
    </div>
    <script src={{ asset("js/bootstrap.js") }}></script>
    <script src="/assets/jquery/jquery.js"></script>
    <script src="/assets/jquery/jquery.min.js"></script>

</body>
</html>
