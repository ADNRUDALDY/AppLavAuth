@extends('layouts.forme')

@section('title', 'Modifier une Localité')
@section('header', 'Modifier une Localité')

@section('content')
<form action="{{ route('localites.update', $localite->id_loc) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="Nomloc" class="form-label">Nom</label>
        <input type="text" class="form-control" id="Nomloc" name="Nomloc" value="{{ $localite->Nomloc }}" required>
    </div>
    <div class="mb-3">
        <label for="Superficie" class="form-label">Superficie</label>
        <input type="number" step="0.01" class="form-control" id="Superficie" name="Superficie" value="{{ $localite->Superficie }}">
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
