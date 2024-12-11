<?php

namespace App\Http\Controllers;

use App\Models\Localite;
use Illuminate\Http\Request;

class LocaliteController extends Controller
{
    public function index()
    {
        $localites = Localite::all();
        return view('localites.index', compact('localites'));
    }

    public function create()
    {
        return view('localites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nomloc' => 'required|string|max:255|unique:localites',
            'Superficie' => 'required|numeric',
        ]);

        Localite::create($request->all());
        return redirect()->route('localites.index')->with('success', 'Localité ajoutée avec succès.');
    }

    public function edit(Localite $localite)
    {
        return view('localites.edit', compact('localite'));
    }

    public function update(Request $request, Localite $localite)
    {
        $request->validate([
            'Nomloc' => 'required|string|max:255|unique:localites,Nomloc,' . $localite->id_loc . ',id_loc',
            'Superficie' => 'required|numeric',
        ]);

        $localite->update($request->all());
        return redirect()->route('localites.index')->with('success', 'Localité mise à jour avec succès.');
    }

    public function destroy(Localite $localite)
    {
        $localite->delete();
        return redirect()->route('localites.index')->with('success', 'Localité supprimée avec succès.');
    }
}
