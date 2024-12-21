<?php

namespace App\Http\Controllers;

use App\Models\Habitant;
use App\Models\Ville;
use Illuminate\Http\Request;

class HabitantController extends Controller
{
    /**
     * Afficher une liste de tous les habitants.
     */
    public function index()
    {
        $habitants = Habitant::with('ville')->get(); // Charger les habitants avec leur ville
        return view('habitants.index', compact('habitants')); // Retourner à une vue
    }

    /**
     * Afficher le formulaire pour créer un nouvel habitant.
     */
    public function create()
    {
        $villes = Ville::all(); // Charger les villes pour le formulaire
        return view('habitants.create', compact('villes'));
    }

    /**
     * Enregistrer un nouvel habitant dans la base de données.
     */
    public function store(HabitantRequest  $request)
    {
        $request->validate([
            'cin' => 'required|unique:habitants|max:10',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'ville_id' => 'required|exists:villes,id',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Gérer l'upload de la photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Créer un habitant
        Habitant::create([
            'cin' => $request->cin,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'ville_id' => $request->ville_id,
            'photo' => $photoPath,
        ]);

        return redirect()->route('habitants.index')->with('success', 'Habitant créé avec succès.');
    }

    /**
     * Afficher un habitant spécifique.
     */
    public function show(Habitant $habitant)
    {
        return view('habitants.show', compact('habitant'));
    }

    /**
     * Afficher le formulaire pour modifier un habitant.
     */
    public function edit(Habitant $habitant)
    {
        $villes = Ville::all(); // Charger les villes pour le formulaire
        return view('habitants.edit', compact('habitant', 'villes'));
    }

    /**
     * Mettre à jour un habitant existant.
     */
    public function update(HabitantRequest $request, Habitant $habitant)
    {
        $request->validate([
            'cin' => 'required|unique:habitants,cin,' . $habitant->id . '|max:10',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'ville_id' => 'required|exists:villes,id',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Gérer l'upload de la nouvelle photo si nécessaire
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $habitant->photo = $photoPath;
        }

        // Mettre à jour les autres champs
        $habitant->update($request->only('cin', 'nom', 'prenom', 'ville_id'));

        return redirect()->route('habitants.index')->with('success', 'Habitant mis à jour avec succès.');
    }

    /**
     * Supprimer un habitant.
     */
    public function destroy(Habitant $habitant)
    {
        $habitant->delete();
        return redirect()->route('habitants.index')->with('success', 'Habitant supprimé avec succès.');
    }
}
