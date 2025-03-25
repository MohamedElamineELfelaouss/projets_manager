<?php

namespace App\Http\Controllers;

use App\Models\Developpeur;
use App\Models\Projet;
use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taches = Tache::all();
        return view('taches.index', compact('taches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projets = Projet::all();
        $developpeurs = Developpeur::all();
        return view('taches.create', compact('projets', 'developpeurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "nomTache" => "required|string|max:255",
                "idProjet" => "required|exists:projets,id",
                "idDev" => "required|exists:developpeurs,id",
                "duree" => "required|integer|min:1",
                "etat" => "required|string|max:50",
                "coutHeure" => "required|integer",
            ]
        );
        Tache::create($data);
        return redirect()->route('taches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tache = Tache::findOrFail($id);
        return view('taches.show', compact('tache'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tache $tache)
    {
        $projets = Projet::all();
        $developpeurs = Developpeur::all();
        return view('taches.edit', compact('tache', 'projets', 'developpeurs'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Tache $tache)
    {
        $data = $request->validate(
            [
                "nomTache" => "required|string|max:255",
                "idProjet" => "required|exists:projets,id",
                "idDev" => "required|exists:developpeurs,id",
                "duree" => "required|integer|min:1",
                "etat" => "required|string|max:50",
                "coutHeure" => "required|integer",
            ]
        );
        $tache->update($data);
        return redirect()->route('taches.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tache $tache)
    {
        $tache->delete();
        return redirect()->route('taches.index');
    }
}
