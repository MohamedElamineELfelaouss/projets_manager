@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <a href="{{ route('projets.index') }}" class="flex items-center mb-6 text-blue-600 hover:text-blue-800 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            cancel
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
        <h1 class="text-2xl font-bold mb-4">Éditer le projet: {{ $projet->nomProjet }}</h1>
        <form action="{{ route('projets.update', $projet->id) }}" enctype="multipart/form-data" method="POST"
            class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nomProjet" class="block font-medium mb-3">Nom :</label>
                <input type="text" name="nomProjet" id="nomProjet" value="{{ $projet->nomProjet }}"
                    class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="description" class="block font-medium mb-3">description :</label>
                <input type="text" name="description" id="description" value="{{ $projet->description }}"
                    class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="photoProjet" class="block font-medium mb-3">photo Projet :</label>
                <input type="file" name="photoProjet" id="photoProjet" class="border rounded w-full p-2">
            </div>
            @if($projet->photoProjet)
                <div>
                    <label for="oldPhoto" class="block font-medium mb-3">Old photo :</label>
                    <img src="{{ asset('storage/' . $projet->photoProjet) }}" alt="PHOTO DE  {{ $projet->photoProjet }}"
                        class="border rounded w-full p-2">
                </div>
            @endif

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Mettre à jour
                </button>
            </div>

        </form>
    </div>
@endsection