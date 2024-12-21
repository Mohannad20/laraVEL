@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Détails de la Ville</h1>
    <table class="min-w-full bg-white border border-gray-200">
        <tr class="border-t">
            <th class="px-4 py-2 text-left text-gray-700">ID</th>
            <td class="px-4 py-2">{{ $ville->id }}</td>
        </tr>
        <tr class="border-t">
            <th class="px-4 py-2 text-left text-gray-700">Nom de la Ville</th>
            <td class="px-4 py-2">{{ $ville->ville }}</td>
        </tr>
        <tr class="border-t">
            <th class="px-4 py-2 text-left text-gray-700">Nombre d'Habitants</th>
            <td class="px-4 py-2">{{ $ville->nbrHabitants }}</td>
        </tr>
    </table>
    <div class="mt-4 flex space-x-2">
        <a href="{{ route('villes.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Retour</a>
        <a href="{{ route('villes.edit', $ville->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier</a>
        <form action="{{ route('villes.destroy', $ville->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
        </form>
    </div>
</div>
@endsection