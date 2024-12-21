<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VilleRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette demande.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; 
    }

    /**
     * Règles de validation.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ville' => 'required|string|max:255',
            'nbrHabitants' => 'required|integer|min:1', // Change to nbrHabitants
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
            'ville.required' => 'Le nom de la ville est obligatoire.',
            'nbrHabitants.required' => 'Le nombre d\'habitants est obligatoire.', // Update message
            'nbrHabitants.integer' => 'Le nombre d\'habitants doit être un nombre entier.', // Update message
            'nbrHabitants.min' => 'Le nombre d\'habitants doit être supérieur à zéro.', // Update message
        ];
    }
}
