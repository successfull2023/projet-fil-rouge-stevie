<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = categorie::all();
        return view('Categorie.liste', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('Categorie.ajouter');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        categorie::create([
            'categorie_id'=> $request-> categorie_id,
            'libelle'=> $request-> libelle,


        ]);

        $categories = new categorie();
        $categories->categories_id = $request->categorie_id;
        $categories->libelle = $request->libelle;
        $categories->photo = $request->photo->store('photo','public');

        $categories->save();


        return redirect()->route('categorie.index')->with('status', 'Une categorie a  été ajoutée avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = categorie::find($id);
        return view('Categorie.details',compact('caregories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = categorie::find($id);

        return view('Categorie.modifier',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = categorie::find($id);

        $categories->update([
            'categorie_id'=> $request-> categorie_id,
            'libelle'=> $request-> libelle,
            'photo'=> $request-> photo,
        ]);

        return redirect()->route('categorie.index')->with('status', 'Une categorie a  été modifiée avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = categorie::find($id);
            $categories->delete();
            return redirect()->route('categorie.index')->with('status', 'Une categorie a  été supprimée avec succes.');
    }
}

