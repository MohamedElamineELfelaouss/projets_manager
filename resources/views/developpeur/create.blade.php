@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Ajouter un Développeur</h1>
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('developpeur.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="nomDev" class="block font-medium">Nom :</label>
                <input type="text" name="nomDev" id="nomDev" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="prenomDev" class="block font-medium">Prénom :</label>
                <input type="text" name="prenomDev" id="prenomDev" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="cvDev" class="block font-medium">CV (PDF, DOC, DOCX) :</label>
                <input type="file" name="cvDev" id="cvDev" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="photoDev" class="block font-medium">Photo (JPG, JPEG, PNG, GIF) :</label>
                <input type="file" name="photoDev" id="photoDev" class="border rounded w-full p-2" required>
            </div>
            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
@endsection