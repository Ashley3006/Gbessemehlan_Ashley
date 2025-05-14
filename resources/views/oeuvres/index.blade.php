@extends('layouts.app')

@section('content')
    <h2>Œuvres d'art</h2>
    <a href="{{ route('oeuvres.create') }}" class="btn btn-primary mb-3">Ajouter une œuvre</a>

    <div class="row">
        @foreach ($oeuvres as $oeuvre)
            <div class="col-md-4">
                <div class="card mb-3">
                    @if($oeuvre->photo)
                        <img src="{{ asset('storage/' . $oeuvre->photo) }}" class="card-img-top" alt="{{ $oeuvre->titre }}">
                    @endif
                    <div class="card-body">
                        <h5>{{ $oeuvre->titre }}</h5>
                        <p>{{ $oeuvre->description }}</p>
                        <p><strong>Artiste :</strong> {{ $oeuvre->artiste }}</p>
                        <p><strong>Catégorie :</strong> {{ $oeuvre->categorie->nom }}</p>
                        <form action="{{ route('oeuvres.destroy', $oeuvre) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
