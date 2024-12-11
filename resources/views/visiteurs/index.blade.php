@extends('layouts.forme')

@section('title', 'Liste des Visiteurs')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Liste des Visiteurs</h1>
    <a href="{{ route('visiteurs.create') }}" class="btn btn-primary">Ajouter un Visiteur</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Localité</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($visiteurs as $visiteur)
        <tr>
            <td>{{ $visiteur->id_visiteur }}</td>
            <td>{{ $visiteur->Nom }}</td>
            <td>{{ $visiteur->Prenom }}</td>
            <td>{{ $visiteur->localite->Nomloc ?? 'Non définie' }}</td>
            <td>
                <a href="{{ route('visiteurs.edit', $visiteur) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('visiteurs.destroy', $visiteur) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
