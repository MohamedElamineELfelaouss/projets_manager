@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
        <a href="{{ route('taches.index') }}" class="flex items-center mb-6 text-blue-600 hover:text-blue-800 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Retour
        </a>


        <h1 class="text-2xl font-bold mb-4">{{ $tache->nomTache }}</h1>
        <p class="mb-2">
            <strong>Projet :</strong>
            {{ $tache->projets->nomProjet ?? 'N/A' }}
        </p>
        <p class="mb-2">
            <strong>Développeur :</strong>
            {{ $tache->developpeurs->nomDev ?? 'N/A' }} {{ $tache->developpeurs->prenomDev ?? '' }}
        </p>
        <p class="mb-2"><strong>Durée :</strong> {{ $tache->duree }} heures</p>
        <p class="mb-2"><strong>Coût Horaire :</strong> {{ $tache->coutHeure ?? 'N/A' }}</p>
        <p class="mb-2"><strong>État :</strong> {{ $tache->etat }}</p>
    </div>
@endsection