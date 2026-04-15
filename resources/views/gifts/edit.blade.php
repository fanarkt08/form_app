<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier {{ $gift->name }}</title>
</head>
<body>
    <h1>Modifier le cadeau</h1>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('gifts.update', $gift) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nom <span>*</span></label><br>
            <input type="text" id="name" name="name" value="{{ old('name', $gift->name) }}" minlength="3" maxlength="50" required>
        </div>
        <br>

        <div>
            <label for="url">URL</label><br>
            <input type="url" id="url" name="url" value="{{ old('url', $gift->url) }}" placeholder="https://...">
        </div>
        <br>

        <div>
            <label for="details">Détails</label><br>
            <textarea id="details" name="details" rows="4" cols="40">{{ old('details', $gift->details) }}</textarea>
        </div>
        <br>

        <div>
            <label for="price">Prix (€) <span>*</span></label><br>
            <input type="number" id="price" name="price" value="{{ old('price', $gift->price) }}" step="0.01" min="0" required>
        </div>
        <br>

        <button type="submit">Mettre à jour</button>
        <a href="{{ route('gifts.show', $gift) }}">Annuler</a>
    </form>
</body>
</html>
