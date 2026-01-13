<?php

namespace App\Http\Controllers;
use App\Models\Employe; 

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index(){
        $employes=Employe::all();
        //return response()->json($clientli,200);
        return view('employes.index', compact('employes'));
    }

    public function create()
    {
        return view('employes.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
        ]);

    
        Employe::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
        ]);

        
        return redirect()->route('employes.index')->with('succe', 'Employé ajouté avec succès!');
    }

    // affiche il client bel id 
    public function edit($id)
    {
        $employe = Employe::findOrFail($id);
        return view('employes.edit', compact('employe'));
    }
// suppression mt3 client
    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();

        return redirect()->route('employes.index')->with('succes', 'Employé supprimé avec succès!');
    }

   
// modifier lel client
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
        ]);

        $client = Employe::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('employes.index')->with('success', 'Employé modifié avec succès!');
    }



}
