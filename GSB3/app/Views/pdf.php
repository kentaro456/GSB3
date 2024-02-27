<!DOCTYPE html>
<html>
<head>
    <title>Réservation PDF</title>
    <!-- Styles CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <!-- Contenu de la page -->
    <div class="container">
        <!-- Titre de la page avec le prénom et le nom de l'utilisateur -->
        <h1>Informations de réservation pour <?= session()->get('user_prenom') ?> <?= session()->get('user_nom') ?></h1>
        <!-- Tableau des réservations -->
        <table>
            <thead>
                <!-- En-têtes de colonnes -->
                <tr>
                    <th>Conférence</th>
                    <th>Date</th>
                    <th>Nom</th>
                    <th>Horaire</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inclusion du modèle pour récupérer les données de réservation
                use App\Modele\Modele;

                $modele = new Modele();
                // Récupération des réservations de l'utilisateur
                $reservation = $modele->getReservationsByPrenom(session()->get('user_prenom'));
                // Affichage des réservations dans le tableau
                foreach ($reservation as $reservations): ?>
                <tr> 
                    <td><?= $reservations->conference_theme ?></td>
                    <td><?= $reservations->reservation_date ?></td>
                    <td><?= $reservations->user_name ,"  ", session()->get('user_nom')  ?></td> 
                    <td><?= $reservations->presentation_creneau ?></td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
