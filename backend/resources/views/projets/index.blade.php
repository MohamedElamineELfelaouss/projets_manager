@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Liste of Projects</h1>
            <a href="{{ route('projets.create') }} " class="text-blue-600 hover:underline">
                create a Project
            </a>
        </div>
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-4">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom Projet</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($projets as $projet)
                        <tr>
                            <td class="px-6 py-4">{{ $projet->nomProjet }}</td>
                            <td class="px-6 py-4 text-center space-x-3">
                                <a href="{{ route('projets.show', $projet->id) }}"
                                    class="text-blue-600 hover:underline">Voir</a>
                                <a href="{{ route('projets.edit', $projet->id) }}"
                                    class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('projets.destroy', $projet->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection