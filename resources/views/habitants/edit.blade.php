@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-2xl font-bold mb-4">Modifier un Habitant</h1>

        @if($errors->any())
            <div class="alert alert-danger bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('habitants.update', $habitant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-4">
                <label for="cin" class="block text-gray-700 text-sm font-bold mb-2">CIN</label>
                <input type="text" name="cin" id="cin" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('cin', $habitant->cin) }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nom', $habitant->nom) }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('prenom', $habitant->prenom) }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="date_naissance" class="block text-gray-700 text-sm font-bold mb-2">Date de Naissance</label>
                <input type="date" name="date_naissance" id="date_naissance" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('date_naissance', $habitant->date_naissance) }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="ville_id" class="block text-gray-700 text-sm font-bold mb-2">Ville</label>
                <select name="ville_id" id="ville_id" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Sélectionner une Ville</option>
                    @foreach($villes as $ville)
                        <option value="{{ $ville->id }}" {{ old('ville_id', $habitant->ville_id) == $ville->id ? 'selected' : '' }}>
                            {{ $ville->ville }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="form-group mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier</button>
                <a href="{{ route('habitants.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Retour</a>
            </div>
        </form>
    </div>
</div>
@endsection