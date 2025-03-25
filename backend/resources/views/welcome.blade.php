@extends('layouts.welcome')

@section('content')

    <div class="relative h-screen w-full">
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
            <h1 class="text-5xl font-extrabold tracking-tight text-white drop-shadow-lg">
                Bienvenue sur <span class="text-blue-300">ProjectManager</span>
            </h1>
            <p class="mt-4 text-xl text-white max-w-2xl">
                Gérez vos projets efficacement et collaborez avec votre équipe en toute simplicité grâce à ProjectManager.
            </p>
            <a href="{{ route('projets.index') }}"
                class="mt-8 bg-gradient-to-r from-blue-600 to-blue-500 text-white px-8 py-3 rounded-full shadow-2xl hover:from-blue-700 hover:to-blue-600 transition duration-200">
                Commencez maintenant
            </a>
        </div>


@endsection