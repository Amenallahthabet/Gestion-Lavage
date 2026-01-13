<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Réalisation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 25cm;
            margin-top: 40px;
            margin-left: 330px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
        }

        .btn {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #24d800;
            border: none;
            width: 6cm;
        }

        .btn-primary:hover {
            background-color: #00b300;
        }

        .btn-secondary {
            background-color: rgb(255, 28, 28);
            border: none;
            width: 6cm;
        }

        .btn-secondary:hover {
            background-color: #af0303;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }

        .btn-group-horizontal {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        option.selected-red {
    color: red;
    background-color: #f8d7da; 
}
.navbar-left {
    position: absolute;
    top: 0;
    left: 0;
    width: 250px;  
    height: 120vh;  
    background: linear-gradient(270deg, #4a90e2, #50e3c2);
    color: white;
    padding-top: 30px;
    padding-left: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.navbar-left details {
    margin-bottom: 20px;
}

.navbar-left details summary {
    cursor: pointer;
    color: #fff;
    font-size:21px;
    font-weight: 400;
    text-transform: uppercase;
    padding: 10px 15px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.navbar-left details[open] summary {
    background-color: #007bff;
    color: #fff;
}

.navbar-left details summary:hover {
    background-color: #007bff;
    color: #fff;
    transform: translateX(10px);
}

.navbar-left .nav-link {
    color: #fff;
    font-size: 15px;
    font-weight: 400;
    text-transform: uppercase;
    padding: 10px 15px;
    border-radius: 5px;
    transition: all 0.3s ease;
    display: block;
    text-decoration: none;
    margin-left:30px;
}



.main-content {
    margin-left: 250px; 
    padding: 20px;
}

.navbar-brand {
    color: #fff;
    font-size: 22px;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 40px;
}

.logout-btn {
    background-color: rgb(255, 28, 28);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-left:12px;
}

.logout-btn:hover {
    background-color: #c82333;
}

@keyframes fadeOut {
    0% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        opacity: 0;
        transform: translateY(-5px);
    }
}
    </style>
    <script>
        function calculateEndTime() {
    const tempsDebutInput = document.getElementById('temps_debut').value; 
    const serviceSelect = document.getElementById('service_id'); 
    const tempsFinInput = document.getElementById('temps_fin'); 
    const selectedService = serviceSelect.options[serviceSelect.selectedIndex];
    const serviceDuration = parseInt(selectedService.getAttribute('data-duration'), 10); 

    if (tempsDebutInput && serviceDuration) {
        // تحليل temp de debut 
        let [hours, minutes] = tempsDebutInput.split(':').map(Number);

        // إضافة srevice الخدمة
        minutes += serviceDuration;
        if (minutes >= 60) {
            hours += Math.floor(minutes / 60);
            minutes = minutes % 60;
        }

        // affiche service
        tempsFinInput.value = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}`;
    }
}

$(document).ready(function() {
    $('#client_id').on('change', function() {
        var clientId = $(this).val();
        var vehicleSelect = $('#vehicle_id');

        vehicleSelect.empty(); // Vider la liste actuelle
        vehicleSelect.append('<option value="">Sélectionner un Véhicule</option>');

        if (clientId) {
            $.ajax({
                url: '/get-vehicles/' + clientId, 
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(index, vehicle) {
                        vehicleSelect.append('<option value="' + vehicle.id + '">' +' ' + vehicle.marque + ' ' + vehicle.model + '</option>');
                    });
                }
            });
        }
    });
});


    </script>
</head>
<body>
    <nav class="navbar-left">
        <div>
            <p class="navbar-brand" href="#">Gestion Lavage</p>
            <details>
                <summary>Client </summary>
                <a class="nav-link active" href="{{ route('clients.create') }}">Ajouter un client</a>
                <a class="nav-link" href="{{ route('clients.index') }}">Liste des clients</a>
            </details>
            <details>
                <summary>Employé </summary>
                <a class="nav-link" href="{{ route('employes.create') }}">Ajouter un Employé</a>
                <a class="nav-link" href="{{ route('employes.index') }}">Liste des Employés</a>
            </details>
            <details>
                <summary>Véhicule </summary>
                <a class="nav-link" href="{{ route('vehicles.create') }}">Ajouter un véhicule</a>
                <a class="nav-link" href="{{ route('vehicles.index') }}">Liste des véhicules</a>
            </details>
            <details>
                <summary>Service </summary>
                <a class="nav-link" href="{{ route('service.create') }}">Ajouter un service</a>
                <a class="nav-link" href="{{ route('service.index') }}">Liste des services</a>
            </details>
            <details>
                <summary>Réalisation</summary>
                <a class="nav-link" href="{{ route('realisations.create') }}">Ajouter une réalisation</a>
                <a class="nav-link" href="{{ route('realisations.index') }}">Liste des réalisations</a>
            </details>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Se déconnecter</button>
            </form>
        </div>
    </nav>
<div class="container">
    <h2 class="form-title">Ajouter une Réalisation</h2>

    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('realisations.store') }}" method="POST">
        @csrf

        <div class="form-group row">
            <label for="service_id" class="col-sm-2 col-form-label">Service</label>
            <div class="col-sm-10">
                <select id="service_id" name="service_id" class="form-control" required onchange="calculateEndTime()">
                    <option value="">Sélectionner un Service</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" data-duration="{{ $service->tempservice }}">{{ $service->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="client_id" class="col-sm-2 col-form-label">Client</label>
            <div class="col-sm-10">
                <select id="client_id" name="client_id" class="form-control" required>
                    <option value="">Sélectionner un Client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="vehicule_id" class="col-sm-2 col-form-label">Véhicule</label>
            <div class="col-sm-10">
                <select id="vehicle_id" name="vehicle_id" class="form-control" required>
                    <option value="">Sélectionner un Véhicule</option>
                    
                </select>
            </div>
        </div>
        @php
        use Carbon\Carbon;
        
        
        @endphp
        <div class="form-group row">
            <label for="employe_id" class="col-sm-2 col-form-label">Employé</label>
            <div class="col-sm-10">
                <select id="employe_id" name="employe_id" class="form-control" required>
                    <option value="">Sélectionner un Employé</option>
                        @foreach($employes as $employe)
                            <option value="{{ $employe->id }}" 
                            @if(isset($employesAvecServiceActif[$employe->id]) 
                                && Carbon::now()->format('H:i') < $employesAvecServiceActif[$employe->id]['temps_fin'])
                                style="color: red;" 
                                disabled
                                @else 
                                style="color: green;"
                                
                             @endif>
                                {{ $employe->nom }} {{ $employe->prenom }}
                            </option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="date_debut" class="col-sm-2 col-form-label">Date de Début</label>
            <div class="col-sm-10">
                <input type="date" id="date_debut" name="date_debut" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="temps_debut" class="col-sm-2 col-form-label">Temps de Début</label>
            <div class="col-sm-10">
                <input type="time" id="temps_debut" name="temps_debut" class="form-control" required onchange="calculateEndTime()" >
            </div>
        </div>
        
        <div class="form-group row">
            <label for="temps_fin" class="col-sm-2 col-form-label">Temps de Fin</label>
            <div class="col-sm-10">
                <input type="time" id="temps_fin" name="temps_fin" class="form-control" readonly  >
            </div>
        </div>

        <div class="form-group row btn-group-horizontal">
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
</body>
</html>
