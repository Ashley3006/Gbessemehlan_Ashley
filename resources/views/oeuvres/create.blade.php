@extends('layouts.app')

@section('content')
    <h2>Ajouter une œuvre</h2>
    <form action="{{ route('oeuvres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3"><label>Titre</label><input type="text" name="titre" class="form-control" required></div>
        <div class="mb-3"><label>Artiste</label><input type="text" name="artiste" class="form-control" required></div>
        <div class="mb-3"><label>Année</label><input type="number" name="annee_creation" class="form-control" required></div>
        <div class="mb-3"><label>Prix</label><input type="number" name="prix" class="form-control" required></div>
        <div class="mb-3"><label>Date acquisition</label><input type="date" name="date_acquisition" class="form-control" required></div>
        <div class="mb-3"><label>Description</label><textarea name="description" class="form-control" required></textarea></div>
        <div class="mb-3">
            <label>Catégorie</label>
            <select name="categorie_id" class="form-control">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Photo</label><input type="file" name="photo" class="form-control"></div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
@endsection
