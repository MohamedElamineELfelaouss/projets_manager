@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
        <a href="{{ route('developpeur.index') }}"
            class="flex items-center mb-6 text-blue-600 hover:text-blue-800 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Retour
        </a>

        <h1 class="text-2xl font-bold mb-4">{{ $developpeur->nomDev }} {{ $developpeur->prenomDev }}</h1>

        @if($developpeur->photoDev)
            <div class="flex justify-center mb-6">
                <img src="{{ asset('storage/' . $developpeur->photoDev) }}" alt="Photo de {{ $developpeur->nomDev }}"
                    class="w-64 h-auto object-contain">
            </div>
        @endif

        @if($developpeur->cvDev)
            <p class="mb-2">
                <strong>CV :</strong>
                <a href="{{ asset('storage/' . $developpeur->cvDev) }}" target="_blank" class="text-blue-600 hover:underline">
                    Télécharger le CV
                </a>
            </p>
        @endif

        <h2 class="text-xl font-bold mt-8 mb-4">Tâches associées</h2>
        @if($developpeur->taches->isNotEmpty())
            <div class="space-y-4">
                @foreach($developpeur->taches as $tache)
                    <div class="bg-gray-100 p-4 rounded shadow">
                        <h3 class="text-lg font-semibold mb-2">
                            <a href="{{ route('taches.show', $tache->id) }}" class="text-blue-600 hover:underline">
                                {{ $tache->nomTache }}
                            </a>
                        </h3>
                        <p class="mb-1">
                            <strong>Projet : </strong>
                            @if($tache->projets)
                                <a href="{{ route('projets.show', $tache->projets->id) }}" class="text-blue-600 hover:underline">
                                    {{ $tache->projets->nomProjet }}
                                </a>
                            @else
                                N/A
                            @endif
                        </p>
                        <p class="mb-1">
                            <strong>Coût Heure : </strong> {{ $tache->coutHeure }} DH
                        </p>
                        <p class="mb-1">
                            <strong>Durée : </strong> {{ $tache->duree }} heures
                        </p>
                        <p>
                            <strong>État : </strong>
                            @if($tache->etat == 'en_attente')
                                <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">À faire</span>
                            @elseif($tache->etat == 'en_cours')
                                <span class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">En cours</span>
                            @elseif($tache->etat == 'terminee')
                                <span class="bg-green-200 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Terminée</span>
                            @else
                                <span
                                    class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm font-medium">{{ ucfirst($tache->etat) }}</span>
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p>Aucune tâche associée pour ce développeur.</p>
        @endif
    </div>
@endsection