<?php

namespace App\Http\Controllers;

use App\Models\Developpeur;
use Illuminate\Http\Request;

class DeveloppeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $developpeurStatusEnCours = Developpeur::whereHas('taches', function ($query) {
        //     $query->where('etat', 'en cours')->get();
        // });
        $developpeur = Developpeur::all();
        return view('developpeur.index', compact('developpeur'));
    }
    public function developpeursSansTaches()
    {
        $developpeursSansTaches = Developpeur::doesntHave('taches')->get();
        return view('developpeur.devNoTach', compact('developpeursSansTaches'));
    }
    public function tachBetweenDate(Request $request)
    {
        $duree1 = $request->input('duree1');
        $duree2 = $request->input('duree2');

        $developpeursBetween = Developpeur::whereHas('taches', function ($query) use ($duree1, $duree2) {
            $query->whereBetween('duree', [$duree1, $duree2]);
        })->get();
        $developpeur = Developpeur::all();

        
        return view('developpeur.index', compact('developpeursBetween', 'developpeur'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('developpeur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "nomDev" => "required|string",
                "prenomDev" => "required|string",
                "cvDev" => "required|file|mimes:pdf,doc,docx|max:2048",
                "photoDev" => "required|image|mimes:jpg,jpeg,png,gif|max:2048",
            ]
        );

        if ($request->hasFile('cvDev')) {
            $data['cvDev'] = $request->file('cvDev')->store('developpers_cv', 'public');
        }
        if ($request->hasFile('photoDev')) {
            $data['photoDev'] = $request->file('photoDev')->store('developpers_photos', 'public');
        }

        Developpeur::create($data);
        return redirect()->route('developpeur.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Developpeur $developpeur)
    {
        return view('developpeur.show', compact('developpeur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developpeur $developpeur)
    {
        return view('developpeur.edit', compact('developpeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developpeur $developpeur)
    {
        $data = $request->validate(
            [
                "nomDev" => "required|string",
                "prenomDev" => "required|string",
                "cvDev" => "file|mimes:pdf,doc,docx|max:2048",
                "photoDev" => "image|mimes:jpg,jpeg,png,gif|max:2048",
            ]
        );
        if ($request->hasFile('cvDev')) {
            if ($developpeur->cvDev) {
                \Storage::disk('public')->delete($developpeur->cvDev);
            }
            $data['cvDev'] = $request->file('cvDev')->store('developpers_cv', 'public');
        }
        if ($request->hasFile('photoDev')) {
            if ($developpeur->photoDev) {
                \Storage::disk('public')->delete($developpeur->photoDev);
            }
            $data['photoDev'] = $request->file('photoDev')->store('developpers_photos', 'public');
        }

        $developpeur->update($data);
        return redirect()->route('developpeur.show', $developpeur->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developpeur $developpeur)
    {
        $developpeur->delete();
        return redirect()->route('developpeur.index')->with('success', "developpeur deleted successfully");
    }


}