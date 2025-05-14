@extends('layouts.app')

@section('content')
    <h2>Catégories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>

    <ul class="list-group">
        @foreach ($categories as $categorie)
            <li class="list-group-item d-flex justify-content-between">
                {{ $categorie->nom }}
                <span>
                    <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('categories.destroy', $categorie) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
@endsection
