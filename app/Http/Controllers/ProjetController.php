<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projets = Projet::all();
        return view('projets.index', compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'nomProjet' => 'required|string',
                'description' => 'required|string|max:3000',
                'photoProjet' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
            ]
        );
        if ($request->hasFile('photoProjet')) {
            $data['photoProjet'] = $request->file('photoProjet')->store('projets_photos', 'public');
        }


        Projet::create($data);
        return redirect()->route('projets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Projet $projet)
    {
        return view('projets.show', compact('projet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projet $projet)
    {
        return view('projets.edit', compact('projet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projet $projet)
    {
        $data = $request->validate(
            [
                'nomProjet' => 'required|string',
                'description' => 'required|string|max:3000',
                'photoProjet' => 'image|mimes:jpg,jpeg,png,gif|max:2048'
            ]
        );
        if ($request->hasFile('photoProjet')) {
            if ($projet->photoProjet) {
                \Storage::disk('public')->delete($projet->photoProjet);
            }
            $data['photoProjet'] = $request->file('photoProjet')->store('projets_photos', 'public');
        }


        $projet->update($data);
        return redirect()
            ->route('projets.index', $projet->id)
            ->with('success', 'Projet updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {
        if ($projet->photoProjet) {
            \Storage::disk('public')->delete($projet->photoProjet);
        }
        $projet->delete();
        return redirect()
            ->route('projets.index')
            ->with('success', 'Projet deleted successfully!');
    }
}
