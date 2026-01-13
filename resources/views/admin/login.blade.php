<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
 body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background: linear-gradient(270deg, #4a90e2, #50e3c2);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

.login-container {
    background: #fff;
    padding: 60px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

.login-header h2 {
    margin-bottom: 13px;
    font-size: 24px;
    color: black;
}
h2{
    position: absolute;
    top: 83px;
    left: 43%;
}

.login-header p {
    margin-bottom: 20px;
    color: #666;
}

.form-group {
    margin-bottom: 20px;
    text-align: left;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
    
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    color: #333;
    text-align: center;
    margin-left: -10px;
}

.login-button {
    width: 100%;
    padding: 10px;
    background: linear-gradient(135deg, #4a90e2, #50e3c2);
    border: none;
    border-radius: 5px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.login-button:hover {
    background: linear-gradient(135deg, #50e3c2, #4a90e2);
}

.login-footer {
    margin-top: 20px;
    font-size: 14px;
    color: #666;
}

.login-footer a {
    color: #4a90e2;
    text-decoration: none;
}

.login-footer a:hover {
    text-decoration: underline;
}

h2{
  position: absolute;
  top: 2%;
  left: 30%;
  font-size: 40px;
  font-weight: 600;
  color: aliceblue;
  
}
.erreur{
  position: inherit;
  margin-left: -12%;
}




.form-group #togglePassword {
    position: absolute;
    right: 35.6%;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #666;
}

.form-group #togglePassword:hover {
    color: #4a90e2;
}

.form-group #mail {
    position: absolute;
    right: 35.6%;
    top: 36%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #666;
}

    </style>
</head>
<body>
    <h2>Se connecter en tant qu'admin</h2>
    <div class="login-container">

    
        <form action="{{ url('/login') }}" method="POST" class="login-form">
            @csrf
            <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" required>
                    <i class="fa-solid fa-envelope" id="mail"></i>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required class="password">
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>
            @if ($errors->any())
                <div class="erreur">
                    @foreach ($errors->all() as $error)
                        <p style="color: red;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <button type="submit" class="login-button">Se connecter</button>

        </form>
    <div class="login-footer">
            <p>Pas encore de compte ? <a href="#">S'inscrire</a></p>
    </div>
    </div> 
    <script>
      document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        // Basculer entre type "password" et "text"
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Changer l'icône de l'œil
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});
    </script>
</body>
</html>
