<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces = Annonce::latest()->paginate(10);
        return view('annonces.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:Appartement,Maison,Villa,Magasin,Terrain',
            'ville' => 'required|string|max:255',
            'superficie' => 'required|numeric|min:0',
            'neuf' => 'required|boolean',
            'prix' => 'required|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('photo');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('public', $filename);
            $data['photo'] = $filename;
        }

        Annonce::create($data);

        return redirect()->route('annonces.index')
            ->with('success', 'Annonce créée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        return view('annonces.show', compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        return view('annonces.edit', compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annonce $annonce)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:Appartement,Maison,Villa,Magasin,Terrain',
            'ville' => 'required|string|max:255',
            'superficie' => 'required|numeric|min:0',
            'neuf' => 'required|boolean',
            'prix' => 'required|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('photo');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($annonce->photo && Storage::exists('public/' . $annonce->photo)) {
                Storage::delete('public/' . $annonce->photo);
            }
            
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('public', $filename);
            $data['photo'] = $filename;
        }

        $annonce->update($data);

        return redirect()->route('annonces.index')
            ->with('success', 'Annonce mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        // Delete photo if exists
        if ($annonce->photo && Storage::exists('public/' . $annonce->photo)) {
            Storage::delete('public/' . $annonce->photo);
        }

        $annonce->delete();

        return redirect()->route('annonces.index')
            ->with('success', 'Annonce supprimée avec succès!');
    }

    /**
     * Display the dashboard with statistics.
     */
    public function dashboard()
    {
        $stats = [
            'total' => Annonce::count(),
            'prix_total' => Annonce::sum('prix'),
            'prix_moyen' => Annonce::avg('prix'),
            'superficie_totale' => Annonce::sum('superficie'),
        ];

        return view('annonces.dashboard', compact('stats'));
    }
}
