<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitantRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette demande.
     *
     * @return bool
     */
    public function authorize()
    {
        // Vous pouvez ajouter des règles d'autorisation ici
        return true; // Par défaut, tout le monde est autorisé
    }

    /**
     * Règles de validation.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cin' => 'required|unique:habitants,cin,' . $this->route('habitant') . '|digits:10', // Validation unique sauf pour l'objet en cours (édition)
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'ville_id' => 'required|exists:villes,id', // Vérifie que la ville existe dans la table villes
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour la photo (optionnelle, avec types et taille)
        ];
    }

    /**
     * Messages de validation personnalisés.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cin.required' => 'Le numéro de CIN est obligatoire.',
            'cin.unique' => 'Le numéro de CIN est déjà utilisé.',
            'cin.digits' => 'Le numéro de CIN doit comporter 10 chiffres.',
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'ville_id.required' => 'La ville est obligatoire.',
            'ville_id.exists' => 'La ville spécifiée n\'existe pas.',
            'photo.image' => 'Le fichier photo doit être une image.',
            'photo.mimes' => 'La photo doit être au format jpeg, png, jpg, gif ou svg.',
            'photo.max' => 'La photo ne doit pas dépasser 2 Mo.',
        ];
    }

    /**
     * Prépare les données avant de les valider.
     *
     * @return array
     */
    public function prepareForValidation()
    {
        // Exemple : si vous souhaitez manipuler les données avant validation (par exemple, convertir un nom en majuscule)
        $this->merge([
            'nom' => ucfirst($this->nom), // Exemple de manipulation des données avant validation
            'prenom' => ucfirst($this->prenom), // Exemple de manipulation des données avant validation
        ]);
    }
}
