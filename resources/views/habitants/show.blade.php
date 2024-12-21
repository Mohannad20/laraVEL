@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-2xl font-bold mb-4">Détails de l'Habitant</h1>
        <table class="min-w-full bg-white border border-gray-200">
            <tbody>
                <tr class="border-t">
                    <th class="px-4 py-2 text-left text-gray-700">ID</th>
                    <td class="px-4 py-2">{{ $habitant->id }}</td>
                </tr>
                <tr class="border-t">
                    <th class="px-4 py-2 text-left text-gray-700">CIN</th>
                    <td class="px-4 py-2">{{ $habitant->cin }}</td>
                </tr>
                <tr class="border-t">
                    <th class="px-4 py-2 text-left text-gray-700">Nom</th>
                    <td class="px-4 py-2">{{ $habitant->nom }}</td>
                </tr>
                <tr class="border-t">
                    <th class="px-4 py-2 text-left text-gray-700">Prénom</th>
                    <td class="px-4 py-2">{{ $habitant->prenom }}</td>
                </tr>
                <tr class="border-t">
                    <th class="px-4 py-2 text-left text-gray-700">Ville</th>
                    <td class="px-4 py-2">{{ $habitant->ville->ville }}</td>
                </tr>
                <tr class="border-t">
                    <th class="px-4 py-2 text-left text-gray-700">Photo</th>
                    <td class="px-4 py-2">
                        @if (filter_var($habitant->photo, FILTER_VALIDATE_URL))
                            <img src="{{ $habitant->photo }}" alt="Photo de {{ $habitant->nom }}" class="w-32 h-32 object-cover rounded">
                        @else
                            <img src="{{ asset('storage/' . $habitant->photo) }}" alt="Photo de {{ $habitant->nom }}" class="w-32 h-32 object-cover rounded">
                        @endif
                        {{-- <img src="{{ asset('storage/' . $habitant->photo) }}" alt="Photo de {{ $habitant->nom }}" class="w-32 h-32 object-cover rounded"> --}}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4 flex space-x-2">
            <a href="{{ route('habitants.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Retour</a>
            <a href="{{ route('habitants.edit', $habitant->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier</a>
            <form action="{{ route('habitants.destroy', $habitant->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection