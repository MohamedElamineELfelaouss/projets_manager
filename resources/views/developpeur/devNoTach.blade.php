@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-3xl mx-auto">
        <a href="{{ route('developpeur.index') }}"
            class="flex items-center mb-6 text-blue-600 hover:text-blue-800 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Retour à la liste des développeurs
        </a>

        <h1 class="text-2xl font-bold mb-4">Développeurs sans tâches</h1>

        @if($developpeursSansTaches->isNotEmpty())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prénom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($developpeursSansTaches as $dev)
                        <tr>
                            <td class="px-6 py-4">{{ $dev->nomDev }}</td>
                            <td class="px-6 py-4">{{ $dev->prenomDev }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('developpeur.show', $dev->id) }}" class="text-blue-600 hover:underline">Voir</a>
                                <a href="{{ route('developpeur.edit', $dev->id) }}"
                                    class="text-yellow-600 hover:underline">Editer</a>
                                <form action="{{ route('developpeur.destroy', $dev->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun développeur sans tâche.</p>
        @endif
    </div>
@endsection