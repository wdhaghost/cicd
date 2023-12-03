<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 vh-100">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <ul class="nav">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">NWS</a>
                </li>
                <li>
                    <a href="{{ route('students.index') }}" class="nav-link">Etudiants</a>
                </li>
                <li>
                    <a href="{{ route('equipments.index') }}" class="nav-link">matériel</a>
                </li>
           
    
            </ul>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8 h-100">
        @yield('content')
    </main>

    <footer class=" bg-white shadow position-absolute bottom-0 w-100">
        <div class="container mx-auto px-4 py-4">
            <div class="text-center text-gray-500">
                &copy; {{ date('Y') }} Mon site. Tous droits réservés.
            </div>
        </div>
    </footer>
</body>
</html>
