<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Service;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        $employes = Employe::all(); // Récupère tous les employés
        $nombreEmployes = $employes->count(); // Compte le nombre d'employés
        $client=Client::all();
        $nombreClient=Client::count();
        $nombreServices = Service::count(); // Nombre total de services

        return view('admin.dashboard', compact('employes', 'nombreEmployes',  'nombreServices','nombreClient'));
    }
}
