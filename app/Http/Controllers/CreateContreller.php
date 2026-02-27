<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateContreller extends Controller
{
    public function create()
    {
        return view('compte.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'password' => 'required|confirmed|min:6',

        ]);

        return redirect()->back()->with('success', 'compte crée avec succès');
    }
    }
    
