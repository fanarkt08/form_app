@extends('layouts.app')

@section('title', 'Ajouter un cadeau')

@section('content')
    <h1>Ajouter un cadeau</h1>

    <form action="{{ route('gifts.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nom <span>*</span></label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}" minlength="3" maxlength="50" required>
            @error('name')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>
        <br>

        <div>
            <label for="url">URL</label><br>
            <input type="url" id="url" name="url" value="{{ old('url') }}" placeholder="https://...">
            @error('url')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>
        <br>

        <div>
            <label for="details">Détails</label><br>
            <textarea id="details" name="details" rows="4" cols="40">{{ old('details') }}</textarea>
            @error('details')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>
        <br>

        <div>
            <label for="price">Prix (€) <span>*</span></label><br>
            <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" required>
            @error('price')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>
        <br>

        <button type="submit">Enregistrer</button>
        <a href="{{ route('gifts.index') }}">Annuler</a>
    </form>
@endsection
