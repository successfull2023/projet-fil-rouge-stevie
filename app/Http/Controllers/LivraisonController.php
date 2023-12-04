<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $livraisons = livraison::all();
        return view('Livraisons.liste', compact('livraisons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('Livraison.ajouter');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        livraison::create([
            'date_livraison'=> $request-> date_livraison,
            'statut'=> $request-> statut,
            'adresse'=> $request-> adresse,
            'frais_livraison'=> $request-> frais_livraison,
            'transporteur'=> $request-> transporteur,
            'date_livraison'=> $request-> delais_livraison,
            'client_id'=> $request-> clients_id,
            'photo' => $request-> photo,

        ]);

        $livraisons = new livraison();
        $livraisons->date_livraison = $request->date_livraison;
        $livraisons->statut = $request->statut;
        $livraisons->adresse = $request->adresse;
        $livraisons->frais_livraison = $request->frais_livraison;
        $livraisons->transporteur = $request-> transporteur;
        $livraisons->adate_livraison = $request->date_livraison;
        $livraisons->commande_id = $request -> commandes_id;
        $livraisons->photo = $request->photo->store('photo','public');

        $livraisons->save();


        return redirect()->route('livraison.index')->with('status', 'Une livraison a  été ajoutée avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livraisons = livraison::find($id);
        return view('livraison.details',compact('livraisons'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $livraisons = livraison::find($id);

        return view('Livraison.modifier',compact('livraisons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $livraisons = livraison::find($id);

        $livraisons->update([
            'date_livraison'=> $request-> date_livraison,
            'statut'=> $request-> statut,
            'adresse'=> $request-> adresse,
            'frais_livraison'=> $request-> frais_livraison,
            'transporteur'=> $request-> transporteur,
            'date_livraison'=> $request-> delais_livraison,
            'commande_id'=> $request-> commandes_id,
            'photo' => $request-> photo,

        ]);

        return redirect()->route('livraison.index')->with('status', 'Une livraison a  été modifiée avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livraisons = livraison::find($id);
            $livraisons->delete();
            return redirect()->route('livraison.index')->with('status', 'Une livraison a  été supprimée avec succes.');
    }
}

