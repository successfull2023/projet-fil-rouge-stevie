<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $clients = client::all();
        return view('Client.liste', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('Client.ajouter');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        client::create([
            'nom'=> $request-> nom,
            'prenom'=> $request-> prenom,
            'contact'=> $request-> contact,
        ]);

        $clients = new client();
        $clients->nom = $request->nom;
        $clients->prenom = $request->prenom;
        $clients->contact = $request->contact;
        $clients->photo = $request->photo->store('photo','public');

        $clients->save();


        return redirect()->route('client.index')->with('status', 'Un client a  été ajouté avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clients = client::find($id);
        return view('Client.details',compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clients = client::find($id);

        return view('Client.modifier',compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clients = client::find($id);

        $clients->update([
            'nom'=> $request-> nom,
            'prenom'=> $request-> prenom,
            'contact'=> $request-> contact,
            'photo'=> $request-> photo,
        ]);

        return redirect()->route('client.index')->with('status', 'Un client a  été modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clients = client::find($id);
            $clients->delete();
            return redirect()->route('client.index')->with('status', 'Un client a  été supprimé avec succes.');
    }
}

