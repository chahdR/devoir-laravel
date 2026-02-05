<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|min:10',
        ]);

        return redirect()->back()->with('success', 'Produit validé');
    }
}