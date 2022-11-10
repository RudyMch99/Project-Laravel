<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Blog Créative</title>
</head>
<body>

    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Blog Créative</span>
            </a>

            <ul class="nav nav-pills">

                <li class="nav-item me-2">
                    <a href="/" class="btn btn-primary" type="button">Accueil</a>
                </li>

                @guest
                <li class="nav-item me-2">
                    <a href="{{route('dashboard')}}" class="btn text-primary" type="button">connexion</a>
                </li>
                @endguest

                @auth
                <li class="nav-item me-2">
                    <a href="{{route('dashboard')}}" class="btn text-primary" type="button">dashboard</a>
                </li>
                <li class="nav-item me-2">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn text-primary">logout</a>
                    </form>
                </li>
                @endauth

            </ul>
        </header>
    </div>

    <div class="container" id="news" style="margin-bottom:150px">
        
        @yield('content')

    </div>

    <div class="container">
        <p>© 2022 Créative - Tous droits réservés</p>
    </div>
    
</body>
</html>