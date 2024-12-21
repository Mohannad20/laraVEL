<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    /**
     * Afficher une liste des villes.
     */
    public function index()
    {
        $villes = Ville::all(); // Récupérer toutes les villes
        return view('villes.index', compact('villes'));
    }

    /**
     * Afficher le formulaire pour créer une nouvelle ville.
     */
    public function create()
    {
        return view('villes.create'); // Retourner la vue de création
    }

    /**
     * Enregistrer une nouvelle ville dans la base de données.
     */
    public function store(VilleRequest $request)
    {
        $request->validate([
            'ville' => 'required|string|max:255',
            'nbrHabitants' => 'required|integer|min:0',
        ]);

        Ville::create([
            'ville' => $request->ville,
            'nbrHabitants' => $request->nbrHabitants,
        ]);

        return redirect()->route('villes.index')->with('success', 'Ville créée avec succès.');
    }

    /**
     * Afficher une ville spécifique.
     */
    public function show(Ville $ville)
    {
        return view('villes.show', compact('ville'));
    }

    /**
     * Afficher le formulaire pour modifier une ville.
     */
    public function edit(Ville $ville)
    {
        return view('villes.edit', compact('ville'));
    }

    /**
     * Mettre à jour une ville existante dans la base de données.
     */
    public function update(VilleRequest $request, Ville $ville)
    {
        $request->validate([
            'ville' => 'required|string|max:255',
            'nbrHabitants' => 'required|integer|min:0',
        ]);

        $ville->update([
            'ville' => $request->ville,
            'nbrHabitants' => $request->nbrHabitants,
        ]);

        return redirect()->route('villes.index')->with('success', 'Ville mise à jour avec succès.');
    }

    /**
     * Supprimer une ville de la base de données.
     */
    public function destroy(Ville $ville)
    {
        $ville->delete();

        return redirect()->route('villes.index')->with('success', 'Ville supprimée avec succès.');
    }
}
