<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oeuvre;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;

class OeuvreController extends Controller
{
    public function index()
    {
        $oeuvres = Oeuvre::with('categorie')->get();
        return view('oeuvres.index', compact('oeuvres'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('oeuvres.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'artiste' => 'required|string|max:255',
            'annee_creation' => 'required|integer',
            'prix' => 'required|numeric',
            'date_acquisition' => 'required|date',
            'description' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('oeuvres', 'public');
        }

        Oeuvre::create([
            'titre' => $request->titre,
            'artiste' => $request->artiste,
            'annee_creation' => $request->annee_creation,
            'prix' => $request->prix,
            'date_acquisition' => $request->date_acquisition,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
            'photo' => $path,
        ]);

        return redirect()->route('oeuvres.index')->with('success', 'Œuvre ajoutée !');
    }

    public function destroy($id)
    {
        $oeuvre = Oeuvre::findOrFail($id);

        if ($oeuvre->photo) {
            Storage::disk('public')->delete($oeuvre->photo);
        }

        $oeuvre->delete();

        return redirect()->route('oeuvres.index')->with('success', 'Œuvre supprimée !');
    }
}
