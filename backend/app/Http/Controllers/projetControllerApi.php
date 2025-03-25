<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Storage;

class ProjetControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projets = Projet::all();

        return response()->json($projets);
    }

    /**
     * Store a newly created resource in storage.
     */
     
    public function store(Request $request)
    {
        $data = $request->validate([
            'nomProjet' => 'required|string',
            'description' => 'required|string|max:3000',
            'photoProjet' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        if ($request->hasFile('photoProjet')) {
            $data['photoProjet'] = $request->file('photoProjet')->store('projets_photos', 'public');
        }

        $projet = Projet::create($data);

        return response()->json($projet, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Projet $projet)
    {

        return response()->json($projet);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projet $projet)
    {
        $data = $request->validate([
            'nomProjet' => 'sometimes|required|string',
            'description' => 'sometimes|required|string|max:3000',
            'photoProjet' => 'sometimes|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        if ($request->hasFile('photoProjet')) {
            if ($projet->photoProjet) {
                Storage::disk('public')->delete($projet->photoProjet);
            }
            $data['photoProjet'] = $request->file('photoProjet')->store('projets_photos', 'public');
        }

        $projet->update($data);

        return response()->json($projet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {
        if ($projet->photoProjet) {
            Storage::disk('public')->delete($projet->photoProjet);
        }

        $projet->delete();

        return response()->json(['message' => 'Projet deleted successfully!']);
    }
}
