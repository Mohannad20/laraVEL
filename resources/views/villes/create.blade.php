@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter une Ville</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <strong class="font-bold">Whoops!</strong> Il y a eu quelques problèmes avec votre entrée.
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('villes.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="ville" class="block text-gray-700 text-sm font-bold mb-2">Nom de la Ville</label>
            <input type="text" name="ville" id="ville" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('ville') }}" required>
        </div>
        <div class="mb-4">
            <label for="nombreHabitant" class="block text-gray-700 text-sm font-bold mb-2">Nombre d'Habitants</label>
            <input type="number" name="nbrHabitants" id="nombreHabitant" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nbrHabitants') }}" required>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajouter</button>
            <a href="{{ route('villes.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Retour</a>
        </div>
    </form>
</div>
@endsection