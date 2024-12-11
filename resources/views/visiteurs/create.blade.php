@extends('layouts.forme')

@section('title', 'Ajouter un Visiteur')

@section('content')
<h1>Ajouter un Visiteur</h1>

<form action="{{ route('visiteurs.store') }}" method="POST">
    @csrf
    @include('visiteurs.partials.form')
    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
@endsection
