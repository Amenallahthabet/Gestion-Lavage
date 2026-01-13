<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realisation;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\Employe;
use App\Models\Client;
use Carbon\Carbon;

class RealisationController extends Controller
{
    

    public function showTemp()
    {
        // استرجاع البيانات من قاعدة البيانات
        $realisations = Realisation::with(['service', 'vehicle', 'employe'])->get();
        
        // تهيئة الجدول للأيام
        $schedule = [
            'Lundi' => [], 'Mardi' => [], 'Mercredi' => [], 'Jeudi' => [], 'Vendredi' => []
        ];
        
        // المرور عبر كل البيانات المحصل عليها
        foreach ($realisations as $realisation) {
            // الحصول على اليوم من التاريخ
            $day = ucfirst(Carbon::parse($realisation->date_debut)->locale('fr')->isoFormat('dddd'));
            
            // تحويل الوقت إلى دقائق
            $start_time = Carbon::parse($realisation->temps_debut)->format('H:i');
            $end_time = Carbon::parse($realisation->temps_fin)->format('H:i');
            
            // تحويل الأوقات إلى دقائق
            $start_minutes = Carbon::parse($start_time)->hour * 60 + Carbon::parse($start_time)->minute;
            $end_minutes = Carbon::parse($end_time)->hour * 60 + Carbon::parse($end_time)->minute;
            
            // إضافة النتيجة إلى الجدول إذا كان اليوم موجودًا
            if (array_key_exists($day, $schedule)) {
                $schedule[$day][] = [
                    'start' => $start_time,
                    'end' => $end_time,
                    'start_minutes' => $start_minutes,
                    'end_minutes' => $end_minutes,
                ];
            }
        }
        
        // الحصول على اليوم الحالي
        $currentDay = ucfirst(Carbon::now()->locale('fr')->isoFormat('dddd'));
        
        // إرجاع البيانات إلى العرض
        return view('realisations.temp', compact('schedule', 'currentDay'));
    }
    
    





    public function index()
    {
        $realisations = Realisation::with(['service', 'vehicle', 'employe'])->get();
        return view('realisations.index', compact('realisations'));
    }

    public function create()
    {
        $clients = Client::all();
        $services = Service::all();
        $vehicles = Vehicle::all();
        $employes = Employe::all();
        $employesAvecServiceActif = Realisation::where('temps_fin', '>', Carbon::now()->format('H:i'))
        ->get(['employe_id', 'temps_fin'])
        ->keyBy('employe_id');
       
        return view('realisations.create', compact('clients', 'services', 'vehicles', 'employes','employesAvecServiceActif'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'employe_id' => 'required|exists:employes,id',
            'date_debut' => 'required|date',
            'temps_debut' => 'required|date_format:H:i',
        ]);

        $service = Service::find($request->service_id);
        $temps_debut = $request->temps_debut;
        $service_duration = (int) $service->tempservice;
        $temps_fin = Carbon::createFromFormat('H:i', $temps_debut)->addMinutes($service_duration)->format('H:i');


        Realisation::create([
            'service_id' => $request->service_id,
            'vehicle_id' => $request->vehicle_id,
            'employe_id' => $request->employe_id,
            'date_debut' => $request->date_debut,
            'temps_debut' => $temps_debut,
            'temps_fin' => $temps_fin,
        ]);

        return redirect()->route('realisations.index')->with('success', 'Réalisation ajoutée avec succès.');
    }

    public function edit($id)
    {
        $realisation = Realisation::findOrFail($id);
        $services = Service::all();
        $vehicles = Vehicle::all();
        $employes = Employe::all();
        $selectedEmployeId = $realisation->employe_id;
        return view('realisations.edit', compact('realisation', 'services', 'vehicles', 'employes','selectedEmployeId'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'employe_id' => 'required|exists:employes,id',
            'date_debut' => 'required|date',
            'temps_debut' => 'required|date_format:H:i',
        ]);

        $service = Service::find($request->service_id);
        $temps_debut = $request->temps_debut;
        $service_duration = (int) $service->tempservice;
        $temps_fin = Carbon::createFromFormat('H:i', $temps_debut)->addMinutes($service_duration)->format('H:i');

        $realisation = Realisation::findOrFail($id);
        $realisation->update([
            'service_id' => $request->service_id,
            'vehicle_id' => $request->vehicle_id,
            'employe_id' => $request->employe_id,
            'date_debut' => $request->date_debut,
            'temps_debut' => $temps_debut,
            'temps_fin' => $temps_fin,
        ]);

        return redirect()->route('realisations.index')->with('success', 'Réalisation mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $realisation = Realisation::findOrFail($id);
        $realisation->delete();

        return redirect()->route('realisations.index')->with('success', 'Réalisation supprimée avec succès.');
    }
}
