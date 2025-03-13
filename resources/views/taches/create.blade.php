@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Ajouter une Tâche</h1>
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('taches.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nomTache" class="block font-medium">Nom de la Tâche :</label>
                <input type="text" name="nomTache" id="nomTache" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="idProjet" class="block font-medium">Projet :</label>
                <select name="idProjet" id="idProjet" class="border rounded w-full p-2" required>
                    <option value="">Sélectionnez un projet</option>
                    @foreach($projets as $projet)
                        <option value="{{ $projet->id }}">{{ $projet->nomProjet }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="idDev" class="block font-medium">Développeur :</label>
                <select name="idDev" id="idDev" class="border rounded w-full p-2" required>
                    <option value="">Sélectionnez un développeur</option>
                    @foreach($developpeurs as $dev)
                        <option value="{{ $dev->id }}">{{ $dev->nomDev }} {{ $dev->prenomDev }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="duree" class="block font-medium">Durée (en heures) :</label>
                <input type="number" name="duree" id="duree" class="border rounded w-full p-2" min="1" required>
            </div>
            <div>
                <label for="coutHeure" class="block font-medium">Cout heure (en dirham DH) :</label>
                <input type="number" name="coutHeure" id="coutHeure" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="etat" class="block font-medium">État :</label>
                <select name="etat" id="etat" class="border rounded w-full p-2" required>
                    <option value="" disabled selected>Selectionnez un état</option>
                    <option value="en_attente">à faire</option>
                    <option value="en_cours">In Progress</option>
                    <option value="terminee">Terminée</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
@endsection