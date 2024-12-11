@extends('layouts.forme')

@section('title', 'Liste des Localités')
@section('header', 'Liste des Localités')

@section('content')
<a href="{{ route('localites.create') }}" class="btn btn-primary mb-3">Ajouter une Localité</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Superficie</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($localites as $localite)
        <tr>
            <td>{{ $localite->id_loc }}</td>
            <td>{{ $localite->Nomloc }}</td>
            <td>{{ $localite->Superficie }}</td>
            <td>
                <a href="{{ route('localites.edit', $localite->id_loc) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('localites.destroy', $localite->id_loc) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
