<?php foreach ($presentations as $presentation): ?>
    <div class="presentation-card">
        <!-- Section des informations de la présentation -->
        <div class="presentation-info">
            <h2>Date de la présentation :</h2>
            <p><?= $presentation->dateDisponible; ?></p> <!-- Affichage de la date de la présentation -->
            <h2>Horaire de la présentation :</h2>
            <p><?= $presentation->horaire; ?></p> <!-- Affichage de l'horaire de la présentation -->
        </div>
        <!-- Section des détails de la présentation -->
        <div class="presentation-details">
            <h3>Détails :</h3>
            <ul>
                <li>Durée : 1 heure</li> <!-- Durée fixe de la présentation -->
                <li>Intervenant : Superman</li> <!-- Nom de l'intervenant -->
                <li>Animateur : GOLD.D.ROGER</li> <!-- Nom de l'animateur -->
                <li>Nombres de places : 30</li> <!-- Nombre de places disponibles -->
            </ul>
        </div>
    </div>
<?php endforeach; ?>
<style>
    /* Style des cartes de présentation */
    .presentation-card {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
        padding: 20px;
        background-color: #f9f9f9;
    }

    /* Style des informations de la présentation */
    .presentation-info {
        margin-bottom: 15px;
    }

    /* Style des titres des informations de la présentation */
    .presentation-info h2 {
        font-size: 18px;
        margin-bottom: 5px;
    }

    /* Style du titre des détails de la présentation */
    .presentation-details h3 {
        font-size: 16px;
        margin-bottom: 10px;
    }

    /* Style de la liste des détails de la présentation */
    .presentation-details ul {
        list-style-type: none;
        padding: 0;
    }

    /* Style des éléments de la liste des détails de la présentation */
    .presentation-details ul li {
        margin-bottom: 5px;
    }

</style>
