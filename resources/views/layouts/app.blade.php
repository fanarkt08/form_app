<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cadeaux')</title>
</head>
<body>
    <nav>
        <a href="{{ route('gifts.index') }}">Liste des cadeaux</a>
        &nbsp;|&nbsp;
        <a href="{{ route('gifts.create') }}">Ajouter un cadeau</a>
    </nav>

    <hr>

    <main>
        @yield('content')
    </main>
</body>
</html>
