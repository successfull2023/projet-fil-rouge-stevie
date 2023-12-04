<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $commandes = commande::all();
        return view('Commandes.liste', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('Commande.ajouter');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        commande::create([
            'date'=> $request-> date,
            'montant'=> $request-> montant,
            'statut'=> $request-> statut,
            'mode_paiement'=> $request-> mode_paiement,
            'produit_commande'=> $request-> produit_commande,
            'adresse'=> $request-> adresse,
            'client_id'=> $request-> clients_id,
            'photo' => $request-> photo

        ]);

        $commandes = new commande();
        $commandes->date = $request->date;
        $commandes->montant = $request->montant;
        $commandes->statut = $request->statut;
        $commandes->mode_paiement = $request->mode_paiement;
        $commandes->produit_commande = $request-> produit_commande;
        $commandes->adresse = $request->adresse;
        $commandes->client_id = $request -> clients_id;
        $commandes->photo = $request->photo->store('photo','public');

        $commandes->save();


        return redirect()->route('commande.index')->with('status', 'Une commande a  été ajouté avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commandes = commande::find($id);
        return view('Commande.details',compact('commandes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commandes = commande::find($id);

        return view('Commande.modifier',compact('commandes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commandes = commande::find($id);

        $commandes->update([
            'date'=> $request-> date,
            'montant'=> $request-> montant,
            'statut'=> $request-> statut,
            'mode_paiement'=> $request-> mode_paiement,
            'produit_commande'=> $request-> produit_commande,
            'adresse'=> $request-> adresse,
            'client_id'=> $request-> clients_id,
            'photo' => $request-> photo

        ]);

        return redirect()->route('commande.index')->with('status', 'Une commande a  été modifiée avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commandes = commande::find($id);
            $commandes->delete();
            return redirect()->route('commande.index')->with('status', 'Une commande a  été supprimée avec succes.');
    }
}

