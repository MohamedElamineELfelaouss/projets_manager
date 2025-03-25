@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <a href="{{ route('taches.index') }}" class="flex items-center mb-6 text-blue-600 hover:text-blue-800 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Cancel
        </a>
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="text-2xl font-bold mb-4">Éditer la Tâche : {{ $tache->nomTache }}</h1>
        <form action="{{ route('taches.update', $tache->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nomTache" class="block font-medium">Nom de la Tâche :</label>
                <input type="text" name="nomTache" id="nomTache" value="{{ $tache->nomTache }}"
                    class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="idProjet" class="block font-medium">Projet :</label>
                <select name="idProjet" id="idProjet" class="border rounded w-full p-2" required>
                    <option value="">Sélectionnez un projet</option>
                    @foreach($projets as $projet)
                        <option value="{{ $projet->id }}" {{ $tache->idProjet == $projet->id ? 'selected' : '' }}>
                            {{ $projet->nomProjet }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="idDev" class="block font-medium">Développeur :</label>
                <select name="idDev" id="idDev" class="border rounded w-full p-2" required>
                    <option value="">Sélectionnez un développeur</option>
                    @foreach($developpeurs as $dev)
                        <option value="{{ $dev->id }}" {{ $tache->idDev == $dev->id ? 'selected' : '' }}>
                            {{ $dev->nomDev }} {{ $dev->prenomDev }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="duree" class="block font-medium">Durée (en heures) :</label>
                <input type="number" name="duree" id="duree" value="{{ $tache->duree }}" class="border rounded w-full p-2"
                    min="1" required>
            </div>
            <div>
                <label for="coutHeure" class="block font-medium">Coût heure (en dirham DH) :</label>
                <input type="number" name="coutHeure" id="coutHeure" value="{{ $tache->coutHeure }}"
                    class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="etat" class="block font-medium">État :</label>
                <select name="etat" id="etat" class="border rounded w-full p-2" required>
                    <option value="">Sélectionnez un état</option>
                    <option value="en_attente" {{ $tache->etat == 'en_attente' ? 'selected' : '' }}>à faire</option>
                    <option value="en_cours" {{ $tache->etat == 'en_cours' ? 'selected' : '' }}>In Progress</option>
                    <option value="terminee" {{ $tache->etat == 'terminee' ? 'selected' : '' }}>Terminée</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
@endsection