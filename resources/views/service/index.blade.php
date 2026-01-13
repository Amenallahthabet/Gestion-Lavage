<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f5f7;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 40px;
            max-width: 95%;
        }

        h1 {
            text-align: center;
            font-weight: 700;
            color: #333333;
            margin-bottom: 20px;
        }

        .table-container {
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            width: 23cm;
            margin-left: 300px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        thead {
            background: linear-gradient(270deg, #4a90e2, #50e3c2);
            color: #ffffff;
        }

        th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
            border-bottom: 2px solid #f4f5f7;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #dddddd;
        }

        tbody tr:hover {
            background-color: #f9f9f9;
            transition: background-color 0.3s;
        }

        .btn-edit {
            background-color: #28a745;
            color: #ffffff;
            padding: 6px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #ffffff;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        form {
            display: inline-block;
        }

        .message {
            position: absolute;
            top: 100px;
            left: 45%;
            padding: 20px;
            border-radius: 10px;
            font-family: 'Arial', sans-serif;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            overflow: hidden;
            animation: fadeInOut 3s ease-in-out forwards;
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
        }

        .success-message::before {
            content: '✔';
            font-size: 32px;
            color: white;
        }

        .continue-button {
            background-color: white;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .continue-button:hover {
            background-color: #f0f0f0;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            50% {
                opacity: 1;
                transform: translateY(0);
            }
            100% {
                opacity: 0;
                transform: translateY(-5px);
            }
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



        .a {
            width: 5cm;
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
    <h1>Liste des Services</h1>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Temp de Service</th>
                    <th>Prix de Service</th>
                    <th class="a">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->nom }}</td>
                        <td>{{ $service->tempservice }}</td>
                        <td>{{ $service->prixservice }}</td>
                        <td>
                            <a href="{{ route('service.edit', $service->id) }}" class="btn btn-edit">Modifier</a>
                            <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Afficher les messages de succès -->
@if(session('success'))
    <div class="message success-message">
        {{ session('success') }}
    </div>
@endif
</body>
</html>
