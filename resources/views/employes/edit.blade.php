<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            margin-left:350px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333333;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 6cm;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
            width: 6cm;
        }
        .navbar-left {
    position: absolute;
    top: 0;
    left: 0;
    width: 250px;  
    height: 100vh;  
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
        <div class="form-container">
            <h2 class="form-title">Modifier un Employé</h2>
            <form action="{{ route('employes.update', $employe->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $employe->nom }}" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $employe->prenom }}" required>
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $employe->telephone }}" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('employes.index') }}" class="btn btn-danger">Annuler</a>
                </div>
            </form>
        </div>
    </div>
    
    
</body>
</html>
