@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <h1 class="text-2xl font-bold text-gray-800">Liste des Développeurs</h1>
            <div class="flex space-x-4">
                <a href="{{ route('developpeur.create') }}"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-600">
                    Ajouter un développeur
                </a>
                <a href="{{ route('developpeur.devNoTach') }}"
                    class="bg-gray-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-gray-600">
                    Développeur sans tâches
                </a>
            </div>
        </div>

        <!-- Filter Form -->
        <div class="mb-6">
            <form action="{{ route('developpeur.tachBetweenDate') }}" method="GET" class="flex space-x-4">
                <div>
                    <label for="duree1" class="block text-gray-700">Durée min:</label>
                    <input type="number" name="duree1" id="duree1" class="border rounded p-2" placeholder="Durée min"
                        required>
                </div>
                <div>
                    <label for="duree2" class="block text-gray-700">Durée max:</label>
                    <input type="number" name="duree2" id="duree2" class="border rounded p-2" placeholder="Durée max"
                        required>
                </div>
                <div class="flex items-end space-x-2">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Filtrer
                    </button>
                    <a href="{{ route('developpeur.index') }}"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-4">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-100 text-gray-600 uppercase text-sm font-semibold">
                    <tr>
                        <th class="px-6 py-3 text-left border-b">Nom</th>
                        <th class="px-6 py-3 text-left border-b">Prénom</th>
                        <th class="px-6 py-3 text-center border-b">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if(isset($developpeursBetween) && $developpeursBetween->isNotEmpty())
                        @foreach($developpeursBetween as $dev)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-gray-800 font-semibold">{{ $dev->nomDev }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $dev->prenomDev }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center space-x-3">
                                        <a href="{{ route('developpeur.show', $dev->id) }}"
                                            class="text-blue-500 hover:text-blue-700 font-medium">Voir</a>
                                        <a href="{{ route('developpeur.edit', $dev->id) }}"
                                            class="text-yellow-500 hover:text-yellow-700 font-medium">Éditer</a>
                                        <form action="{{ route('developpeur.destroy', $dev->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 font-medium">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @foreach($developpeur as $dev)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-gray-800 font-semibold">{{ $dev->nomDev }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $dev->prenomDev }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center space-x-3">
                                        <a href="{{ route('developpeur.show', $dev->id) }}"
                                            class="text-blue-500 hover:text-blue-700 font-medium">Voir</a>
                                        <a href="{{ route('developpeur.edit', $dev->id) }}"
                                            class="text-yellow-500 hover:text-yellow-700 font-medium">Éditer</a>
                                        <form action="{{ route('developpeur.destroy', $dev->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 font-medium">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection