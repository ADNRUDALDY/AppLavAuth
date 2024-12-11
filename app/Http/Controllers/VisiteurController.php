<?php

namespace App\Http\Controllers;

use App\Models\Visiteur;
use App\Models\Localite;
use Illuminate\Http\Request;

class VisiteurController extends Controller
{
    // Affiche la liste des visiteurs
    public function index()
    {
        $visiteurs = Visiteur::with('localite')->get();
        return view('visiteurs.index', compact('visiteurs'));
    }

    // Formulaire de création
    public function create()
    {
        $localites = Localite::all(); // Récupérer toutes les localités
        return view('visiteurs.create', compact('localites'));
    }

    // Stocker un visiteur
    public function store(Request $request)
{
    // Validation des données
    $validatedData = $request->validate([
        'Nom' => 'required|string|max:255',
        'Prenom' => 'required|string|max:255',
        'Naiss' => 'required|date',
        'Lieu' => 'required|string|max:255',
        'Sexe' => 'required|string|max:1',
        'Diplome' => 'nullable|string|max:255',
        'Fonction' => 'nullable|string|max:255',
        'Tel' => 'nullable|string|max:20',
        'mail' => 'nullable|email|max:255',
        'id_loc' => 'required|exists:localites,id_loc', // Relation avec Localite
    ]);

    // Enregistrement du visiteur
    Visiteur::create($validatedData);

    // Redirection avec message de succès
    return redirect()->route('visiteurs.index')->with('success', 'Visiteur ajouté avec succès.');
}
    // Formulaire d'édition
    public function edit(Visiteur $visiteur)
    {
        $localites = Localite::all();
        return view('visiteurs.edit', compact('visiteur', 'localites'));
    }

    // Mise à jour d'un visiteur
    public function update(Request $request, Visiteur $visiteur)
    {
        $validated = $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Naiss' => 'required|date',
            'Lieu' => 'required|string|max:255',
            'Sexe' => 'required|string|max:10',
            'Diplome' => 'required|string|max:255',
            'Fonction' => 'required|string|max:255',
            'Tel' => 'required|string|max:15',
            'mail' => 'required|email|unique:visiteurs,mail,' . $visiteur->id_visiteur,
            'id_loc' => 'required|exists:localites,id_loc',
        ]);

        $visiteur->update($validated);
        return redirect()->route('visiteurs.index')->with('success', 'Visiteur mis à jour avec succès.');
    }

    // Suppression d'un visiteur
    public function destroy(Visiteur $visiteur)
    {
        $visiteur->delete();
        return redirect()->route('visiteurs.index')->with('success', 'Visiteur supprimé avec succès.');
    }
}
