@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <a href="{{ route('developpeur.index') }}"
            class="flex items-center mb-6 text-blue-600 hover:text-blue-800 font-medium">
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
        <h1 class="text-2xl font-bold mb-4">Éditer le Développeur : {{ $developpeur->nomDev }} {{ $developpeur->prenomDev }}
        </h1>
        <form action="{{ route('developpeur.update', $developpeur->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nomDev" class="block font-medium mb-2">Nom :</label>
                <input type="text" name="nomDev" id="nomDev" value="{{ $developpeur->nomDev }}"
                    class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="prenomDev" class="block font-medium mb-2">Prénom :</label>
                <input type="text" name="prenomDev" id="prenomDev" value="{{ $developpeur->prenomDev }}"
                    class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="cvDev" class="block font-medium mb-2">CV (PDF, DOC, DOCX) :</label>
                <input type="file" name="cvDev" id="cvDev" class="border rounded w-full p-2">
                @if($developpeur->cvDev)
                    <p class="mt-2">
                        CV actuel :
                        <a href="{{ asset('storage/' . $developpeur->cvDev) }}" target="_blank"
                            class="text-blue-600 hover:underline">
                            Télécharger le CV
                        </a>
                    </p>
                @endif
            </div>
            <div>
                <label for="photoDev" class="block font-medium mb-2">Photo (JPG, JPEG, PNG, GIF) :</label>
                <input type="file" name="photoDev" id="photoDev" class="border rounded w-full p-2">
                @if($developpeur->photoDev)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $developpeur->photoDev) }}" alt="Photo de {{ $developpeur->nomDev }}"
                            class="w-32 h-auto object-contain">
                    </div>
                @endif
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
@endsection