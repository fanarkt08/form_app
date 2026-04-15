<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $gift->name }}</title>
</head>
<body>
    <h1>{{ $gift->name }}</h1>

    <p><strong>Prix :</strong> {{ number_format($gift->price, 2) }} €</p>

    @if ($gift->url)
        <p><strong>Lien :</strong> <a href="{{ $gift->url }}" target="_blank">{{ $gift->url }}</a></p>
    @endif

    @if ($gift->details)
        <p><strong>Détails :</strong> {{ $gift->details }}</p>
    @endif

    <br>
    <a href="{{ route('gifts.edit', $gift) }}">Modifier</a>
    &nbsp;|&nbsp;
    <a href="{{ route('gifts.index') }}">Retour à la liste</a>
</body>
</html>
