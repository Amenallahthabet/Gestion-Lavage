<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
       
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
            
            
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
    background-color:#007bff;
    color: #fff;
}

.navbar-left details summary:hover {
    background-color: #007bff ;
    color: #fff;
    transform: translateX(10px);
}

.navbar-left .nav-link {
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
    padding: 10px 15px;
    border-radius: 5px;
    transition: all 0.3s ease;
    display: block;
    text-decoration: none;
    margin-left:28px;
}



.main-content {
    margin-left: 250px; 
    padding: 20px;
    text-align:center;
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
.stats {
    position:absolute;
    top:-1%;
    left:21%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
    
    
}

.stat-item {
    background: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin: 10px;
    padding: 15px;
    width: 300px;
    box-shadow: 0 5px 5px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
    margin-top: 150px;
    overflow: hidden;
    border-left: 5px solid #4a90e2 ;
   
    
}
.stat-item:hover{
    transform: scale(1.05);
} 

.stat-value {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}
#stat-icon {
    font-size: 30px;
    color:  #4a90e2;
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
                <a class="nav-link" href="{{ route('realisations.index') }}">Liste des  réalisations</a>
            </details>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Se déconnecter</button>
            </form>
        </div>
    </nav>

   
    <div class="main-content">
        <h1>Bienvenue sur votre Lavage</h1>
        <p>Gestion de Lavage et plus encore.</p>
        
    </div>


    <div class="stats">
        <div class="stat-item">
            <h3>Nombre d'Employés</h3>
            <p class="stat-value">{{ $nombreEmployes }}</p>
            <i class="fa-solid fa-user" id="stat-icon"></i>
        </div>
       
        <div class="stat-item">
            <h3>Nombre de Services</h3>
            <p class="stat-value">{{ $nombreServices }}</p>
            <i class="fas fa-wrench" id="stat-icon"></i>
        </div>

        <div class="stat-item">
            <h3 >Nombre des Clients</h3>
            <p class="stat-value">{{ $nombreClient }}</p>
            <i class="fa-solid fa-user-plus" id="stat-icon"></i>
        </div>
    </div>


 

  
    @if(session('succe'))
    <div class="message success-message">
        {{ session('succe') }}
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

   
</body>
</html>
