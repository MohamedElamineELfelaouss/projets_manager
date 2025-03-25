@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Ajouter un projet</h1>
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-4">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif
        <form action="{{ route('projets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="nomProjet" class="block font-medium">Nom Projet :</label>
                <input type="text" name="nomProjet" id="nomProjet" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="description" class="block font-medium">description :</label>
                <input type="text" name="description" id="description" class="border rounded w-full p-2" required>
            </div>
            <div>
                <label for="photoProjet" class="block font-medium">photo Projet :</label>
                <input type="file" name="photoProjet" id="photoProjet" class="border rounded w-full p-2" required>
            </div>
            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
@endsection