@extends('layouts.forme')

@section('title', 'Créer une Localité')
@section('header', 'Créer une Localité')

@section('content')
<form action="{{ route('localites.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="Nomloc" class="form-label">Nom</label>
        <input type="text" class="form-control" id="Nomloc" name="Nomloc" required>
    </div>
    <div class="mb-3">
        <label for="Superficie" class="form-label">Superficie</label>
        <input type="number" step="0.01" class="form-control" id="Superficie" name="Superficie">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection
