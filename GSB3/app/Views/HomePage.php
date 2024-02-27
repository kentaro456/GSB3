<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Gestion de Conférences</title>
    <style>
        
        .content {
            max-width: 800px;
            margin: 25px auto;
            padding: 20px;
            background-color: lightcyan;
            border-radius: 100px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .welcome-message {
            margin-bottom: 20px;
            color: black;
        }
        h1{
            color: black;
        }

    

        .content p {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
            margin-bottom: 20px;
        }

    </style>
</head>

<body>

    <div class="content">
        <div class="welcome-message">
            <img src="<?= base_url('teste.avif'); ?>" alt="GS3 Logo">
            <h1>Bienvenue sur GSB3 Conférences</h1>
        </div>
       
       
        <?php
        // Vérifier si l'utilisateur est connecté
        if (session()->get('authenticated')) {
            // Récupérer le nom et le prénom de la session
            $nom = session()->get('user_nom');
            $prenom = session()->get('user_prenom');

            // Afficher le message de bienvenue personnalisé
            echo "<p>Allez !!!  $prenom $nom ! Profitez pleinement de votre expérience sur GSB3 Conférences.</p>";
            
        } else {
            // Afficher un message générique si l'utilisateur n'est pas connecté
            echo "<p>Connectez-vous dès maintenant pour bénéficier de tous les avantages de notre plateforme.</p>";
        }
        ?>
         <p>Sur notre plateforme de gestion de conférences. Explorez notre catalogue de conférences passionnantes, choisissez celles qui vous intéressent et participez à des événements enrichissants.</p>
    </div>

    <footer>
        <?= anchor('deconnexion', 'Déconnexion'); ?>
    </footer>

</body>

</html>
