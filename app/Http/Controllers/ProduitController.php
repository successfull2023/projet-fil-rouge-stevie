<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $produits = produit::all();
        return view('Produits.liste', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('Produit.ajouter');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        produit::create([
            'designation'=> $request-> designation,
            'prix'=> $request-> prix,
            'quantite'=> $request-> quantite,
            'categorie_id'=> $request-> categories_id,
            'photo' => $request-> photo,

        ]);

        $produits = new produit();
        $produits->designation = $request->designation;
        $produits->prix = $request->prix;
        $produits->quantite = $request->quantite;
        $produits->categorie_id = $request -> categories_id;
        $produits->photo = $request->photo->store('photo','public');

        $produits->save();


        return redirect()->route('produit.index')->with('status', 'Un produit a  été ajoutée avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produits = produit::find($id);
        return view('produit.details',compact('produits'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produits = livraison::find($id);

        return view('Produits.modifier',compact('produits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produits = produit::find($id);

        $produits->update([
            'designation'=> $request-> designation,
            'prix'=> $request-> prix,
            'quantite'=> $request-> quantite,
            'categorie_id'=> $request-> categories_id,
            'photo' => $request-> photo,

        ]);

        return redirect()->route('produit.index')->with('status', 'Un produit a  été modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produits = produit::find($id);
            $produits->delete();
            return redirect()->route('produit.index')->with('status', 'Un produit a  été supprimé avec succes.');
    }
}

