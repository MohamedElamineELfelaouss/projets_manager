@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Liste des Tâches</h1>
            <a href="{{ route('taches.create') }}" class="text-blue-600 hover:underline">
                Ajouter une Tâche
            </a>
        </div>
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-4">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 ">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom Tâche</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">État</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($taches as $tache)
                        <tr>
                            <td class="px-6 py-4">{{ $tache->nomTache }}</td>
                            <td class="px-6 py-4">
                                @if($tache->etat === "en_attente")
                                    <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">En
                                        attente</span>
                                @elseif($tache->etat === "en_cours")
                                    <span class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">En
                                        cours</span>
                                @elseif($tache->etat === "terminee")
                                    <span
                                        class="bg-green-200 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Terminée</span>
                                @else
                                    <span
                                        class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">{{ ucwords(str_replace('_', ' ', $tache->etat)) }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('taches.show', $tache->id) }}" class="text-blue-600 hover:underline">Voir</a>
                                <a href="{{ route('taches.edit', $tache->id) }}"
                                    class="text-yellow-600 hover:underline">Editer</a>
                                <form action="{{ route('taches.destroy', $tache->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection