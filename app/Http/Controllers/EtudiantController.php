<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function create()
    {
        return view('etudiant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'type_bac' => 'required',
            'filiere' => 'required',
        ]);

        return redirect()->back()->with('success', 'Étudiant ajouté avec succès');
    }
}