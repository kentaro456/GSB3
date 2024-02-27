<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8iKu1G5lD91zqMzjsl5+zqvmU/DJh5/W9UcNInylWd5lF5oD1G2n2z" crossorigin="anonymous">
    <title>GS3 - Connexion</title>
    
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <img src="<?php echo base_url('Logo-gsb.png'); ?>" alt="GS3 Logo" class="logo">
        <h1>Bienvenue sur GSB3</h1>
        <p>Connectez-vous pour accéder à votre compte</p>
    </div>
    
    <form action="<?= base_url('home/authenticate'); ?>" method="post" class="login-form">
    <!-- Vos champs de formulaire restent inchangés -->
    <div class="input-group">
        <label for="username"><i class="fas fa-user"></i></label>
        <input type="text" id="username" name="login" placeholder="Nom d'utilisateur" required>
    </div>

    <div class="input-group">
        <label for="password"><i class="fas fa-lock"></i></label>
        <input type="password" id="password" name="mdp" placeholder="Mot de passe" required>
    </div>

    <button type="submit">Se connecter</button>

    <p class="forgot-password"><a href="#">Mot de passe oublié?</a></p>
</form>

</div>

</body>
</html>
