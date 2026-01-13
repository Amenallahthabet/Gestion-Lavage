<?php

namespace App\Http\Controllers;
use App\Models\Client; 
use App\Models\Vehicle; 
use Illuminate\Http\Request;


class VehicleController extends Controller
{   
    public function index(){
        
        $vehicles=Vehicle::all();
        $clients = Client::all();
        //return response()->json($clientli,200);
        return view('vehicles.index', compact('vehicles','clients'));
    }



    public function create()
    {
        $clients = Client::all();
        return view('vehicles.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numseri' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'client_id' => 'nullable|exists:clients,id',
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')->with('succe', 'Véhicule ajouté avec succès.');
    }

      // affiche il vehicule bel id 
      public function edit($id)
      {
          $vehicle = Vehicle::findOrFail($id);
          $clients = Client::all();
          return view('vehicles.edit', compact('vehicle', 'clients'));
      }
  // suppression mt3 client
      public function destroy($id)
      {
          $vehicle = Vehicle::findOrFail($id);
          $vehicle->delete();
  
          return redirect()->route('vehicles.index')->with('succes', 'Vehicle supprimé avec succès!');
      }
  
     
  // modifier lel client
      public function update(Request $request, $id)
      {
          $request->validate([
            'numseri' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'client_id' => 'nullable|exists:clients,id',
          ]);
  
          $client = Vehicle::findOrFail($id);
          $client->update($request->all());
  
          return redirect()->route('vehicles.index')->with('success', 'vehicle modifié avec succès!');
      }
  
  
}
