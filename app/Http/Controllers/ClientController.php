<?php

namespace App\Http\Controllers;

use App\Models\Client; 
use Illuminate\Http\Request;

class ClientController extends Controller
{
    

    public function index(){
        $clients=Client::all();
        //return response()->json($clientli,200);
        return view('clients.index', compact('clients'));
    }



    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nom' => ['required', 'regex:/^[a-zA-ZÀ-ÿ\s\-]+$/u', 'max:255'],
            'prenom' => ['required', 'regex:/^[a-zA-ZÀ-ÿ\s\-]+$/u', 'max:255'],
            'telephone' => ['required', 'numeric', 'digits_between:8,15'],
        ]);

    
        Client::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
        ]);

        
        return redirect()->route('clients.index')->with('succe', 'Client ajouté avec succès!');
    }
// affiche il client bel id 
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }
// suppression mt3 client
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('succes', 'Client supprimé avec succès!');
    }

   
// modifier lel client
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
        ]);

        $client = Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client modifié avec succès!');
    }
}
