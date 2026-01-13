<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RealisationController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('admin.login');
});

// connexion admin
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AdminController::class, 'login']);
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
// ajout client
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
// recupere donner client , modifier , supprimer   et liste clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
// ajout employé
Route::get('/employes/create', [EmployeController::class, 'create'])->name('employes.create');
Route::post('/employes', [EmployeController::class, 'store'])->name('employes.store');
// recupere donner employes , modifier , supprimer   et liste employes
Route::get('/employes', [EmployeController::class, 'index'])->name('employes.index');
Route::get('/employes/{id}/edit', [EmployeController::class, 'edit'])->name('employes.edit');
Route::delete('/employes/{id}', [EmployeController::class, 'destroy'])->name('employes.destroy');
Route::put('/employes/{id}', [EmployeController::class, 'update'])->name('employes.update');
// ajouter vehicule
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles/store', [VehicleController::class, 'store'])->name('vehicles.store');

// recupere donner vehicule , modifier , supprimer   et liste vehicule
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::put('/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');

// ajouter service
Route::get('services/create', [ServiceController::class, 'create'])->name('service.create');
Route::post('services', [ServiceController::class, 'store'])->name('service.store');
// recupere donner service , modifier , supprimer   et liste service
Route::get('services', [ServiceController::class, 'index'])->name('service.index');
Route::get('services/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
Route::put('services/{id}', [ServiceController::class, 'update'])->name('service.update');
Route::delete('services/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

// ajouter realisation


Route::get('realisations/create', [RealisationController::class, 'create'])->name('realisations.create');
Route::post('realisations/store', [RealisationController::class, 'store'])->name('realisations.store');
 //
Route::get('realisations', [RealisationController::class, 'index'])->name('realisations.index');
Route::get('realisations/{id}/edit', [RealisationController::class, 'edit'])->name('realisations.edit');
Route::put('realisations/{id}', [RealisationController::class, 'update'])->name('realisations.update');
Route::delete('realisations/{id}', [RealisationController::class, 'destroy'])->name('realisations.destroy');
//  client imporet 
use App\Models\Vehicle;
use Illuminate\Http\Request;

Route::get('/get-vehicles/{clientId}', function ($clientId) {
    $vehicles = Vehicle::where('client_id', $clientId)->get();
    return response()->json($vehicles);
});


//
// Route pour afficher l'emploi du temps

Route::get('/realisations/update-schedule', [RealisationController::class, 'getUpdatedSchedule']);
Route::get('/realisations/temp', [RealisationController::class, 'showTemp']);


// dasborde 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');






