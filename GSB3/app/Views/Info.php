<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <!-- Styles CSS personnalisés -->
    <style>
        /* Styles pour la mise en page */
        .container {
            max-width: 600px;
            margin: 5px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            width: 500; /* Cette propriété n'est pas valide, il devrait y avoir une unité spécifiée (par exemple, px) */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style pour le titre h1 */
        h1 {
            text-align: center;
            color: #007bff; /* Couleur bleue */
            margin-bottom: 20px;
        }

        /* Styles pour les informations de l'utilisateur */
        .info {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .info strong {
            color: #007bff; /* Couleur bleue pour les étiquettes */
        }

        /* Styles pour les boutons */
        .btn {
            display: block;
            width: 100%;
            background-color: #007bff; /* Couleur bleue pour le fond */
            color: #fff; /* Couleur du texte blanc */
            padding: 10px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s; /* Transition de couleur de fond fluide */
        }
        .btn:hover {
            background-color: #0056b3; /* Couleur de fond au survol */
        }

        /* Styles pour les icônes */
        .icons-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .icon {
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <!-- Contenu principal de la page -->
    <div class="container">
        <!-- Titre de la page -->
        <h1>Mon Compte</h1>
        <!-- Vérification de la session utilisateur -->
        <?php if (session()->get('authenticated')): ?>
            <!-- Informations utilisateur -->
            <div class="info">
                <p><strong>Prénom:</strong> <?= session()->get('user_prenom'); ?></p>
                <p><strong>Nom:</strong> <?= session()->get('user_nom'); ?></p>
                <p><strong>Habit a:</strong> <?= session()->get('user_ville'); ?></p>
            </div>
            <!-- Bouton de déconnexion -->
            <a href="<?= base_url('deconnexion'); ?>" class="btn">Se déconnecter</a>
        <?php else: ?>
            <!-- Message si l'utilisateur n'est pas connecté -->
            <p>Veuillez vous connecter pour accéder à cette page.</p>
        <?php endif; ?>
    </div>
    
    <!-- Conteneur des icônes -->
    <div class="icons-container">
        <!-- Icône animée 1 -->
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
            class="icon"
            src="https://cdn.lordicon.com/zhprqosp.json"
            trigger="loop"
            delay="5"
            style="width:100px;height:100px">
        </lord-icon>
        <!-- Icône animée 2 -->
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
            class="icon"
            src="https://cdn.lordicon.com/tfliqeqn.json"
            trigger="loop"
            style="width:100px;height:100px">
        </lord-icon>
        <!-- Icône animée 3 -->
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
            class="icon"
            src="https://cdn.lordicon.com/pyarizrk.json"
            trigger="loop"
            delay="2500"
            stroke="light"
            state="in-reveal"
            style="width:100px;height:100px">
        </lord-icon>
        <!-- Icône animée 4 -->
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
            class="icon"
            src="https://cdn.lordicon.com/mebvgwrs.json"
            trigger="loop"
            delay="2500"
            state="in-reveal"
            style="width:100px;height:100px">
        </lord-icon>
    </div>

    <!-- Lien pour télécharger le PDF -->
    <div>
        <a href="<?= base_url('/generate-pdf') ?>">Télécharger PDF</a>
    </div>
</body>

</html>
