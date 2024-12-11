@extends('layouts.forme')

@section('title', 'Modifier un Visiteur')

@section('content')
<h1>Modifier un Visiteur</h1>

<form action="{{ route('visiteurs.update', $visiteur) }}" method="POST">
    @csrf
    @method('PUT')
    @include('visiteurs.partials.form', ['visiteur' => $visiteur])
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
