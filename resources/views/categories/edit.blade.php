@extends('layouts.app')

@section('content')
    <h2>Modifier la catégorie</h2>
    <form action="{{ route('categories.update', $categorie) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la catégorie</label>
            <input type="text" name="nom" value="{{ $categorie->nom }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
