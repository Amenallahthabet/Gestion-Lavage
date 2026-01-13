<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; 
class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('service.index', compact('services'));
    }

    public function create()
    {
        $tempsOptions = ['2 minute','10 minute', '20 minute', '30 minute', '40 minute', '50 minute', '60 minute'];
        return view('service.create' , compact('tempsOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'tempservice' => 'required',
            'prixservice' => 'required|integer',

        ]);

        Service::create($request->all());

        return redirect()->route('service.index')->with('success', 'Service ajouté avec succès.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $tempsOptions = ['10 minute', '20 minute', '30 minute', '40 minute', '50 minute', '60 minute'];

        return view('service.edit', compact('service','tempsOptions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'tempservice' => 'required',
            'prixservice' => 'required|integer',
        ]);

        $service = Service::findOrFail($id);
        $service->update($request->all());

        return redirect()->route('service.index')->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service supprimé avec succès.');
    }
}
