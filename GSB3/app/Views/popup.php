<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de places de cinéma</title>
    
    <!-- Inclusion du fichier CSS pour la fenêtre modale -->
    <link rel="stylesheet" href="<?= base_url('popup.css') ?>">
    <!-- Inclusion de la bibliothèque Bootstrap pour les styles CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-qvAz91wK0A5vnO3d4wRvNUmfdPwbrNJ0Iz9C0AD0rG/w1U+HNb0q5jcXvxB1ZKap" crossorigin="anonymous">
    <style>
        /* Vous pouvez ajouter ici vos styles personnalisés */
    </style>
</head>
<body>
    <!-- Fenêtre modale de confirmation -->
    <div id="popup1" class="overlay">
        <div class="popup">
            <!-- Titre de la fenêtre modale -->
            <h2>Bien joué</h2>
            <!-- Lien pour fermer la fenêtre modale -->
            <a class="close" href="<?= site_url('HomePage') ?>">Clique ici<span>&times;</span></a>
            <div class="content">
                <!-- Contenu de la fenêtre modale -->
                <h3>Réservation réalisée avec succès</h3>
            </div>
        </div>
    </div>

    <!-- Script pour charger les icônes animées -->
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <!-- Icône animée -->
    <lord-icon
        src="https://cdn.lordicon.com/guqkthkk.json"
        trigger="loop"
        delay="2"
        style="width:150px;height:150px">
    </lord-icon>

    <!-- Lien pour télécharger le PDF -->
    <a href="<?= base_url('/generate-pdf') ?>">Télécharger PDF</a>
</body>
</html>
