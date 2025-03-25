@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
        <a href="{{ route('projets.index') }}" class="flex items-center mb-6 text-blue-600 hover:text-blue-800 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Retour
        </a>
        <h1 class="text-2xl font-bold mb-4">{{ $projet->nomProjet }}</h1>
        <p class="mb-2"><strong>Description :</strong> {{ $projet->description }}</p>
        @if($projet->photoProjet)
            <div class="flex justify-center mb-6">
                <img src="{{ asset('storage/' . $projet->photoProjet) }}" alt="PHOTO DE  {{ $projet->photoProjet }}"
                    class="w-64 h-auto object-contain">
            </div>
        @endif
    </div>
@endsection