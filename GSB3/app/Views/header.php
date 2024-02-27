<!-- Inclusion des fichiers CSS -->
<link rel="stylesheet" href="<?= base_url('style3.css') ?>">
<link rel="stylesheet" href="<?= base_url('style2.css') ?>">

<!-- En-tête de la page -->
<header>
    <!-- Barre de navigation -->
    <nav>
        <!-- Conteneur du logo -->
        <div class="logo-container">
            <!-- Logo de l'entreprise -->
            <img src="<?= base_url('Logo-gsb.png'); ?>" alt="GS3 Logo" class="logo">
        </div>
        <!-- Liste des liens de navigation -->
        <ul class="nav-links">
            <!-- Lien vers la page d'accueil -->
            <li><?= anchor('HomePage', 'Home'); ?></li>
            <!-- Lien vers la page des conférences -->
            <li><?= anchor('conference', 'Conférences'); ?></li>
            <!-- Lien vers la page de réservation -->
            <li><?= anchor('Reservation', 'Reservation'); ?></li>
            <!-- Lien vers la page de compte utilisateur -->
            <li><?= anchor('info', 'Mon Compte'); ?></li>
        </ul>
    </nav>
</header>
