<?= \Config\Services::validation()->listErrors(); ?>

<?php helper('form') ?>
<link rel="stylesheet" href="<?= base_url('R.css') ?>">
<link rel="stylesheet" href="<?= base_url('R.js') ?>">
<?= form_open('home/submitReservation', ['id' => 'reservationForm']); ?>
<body>

<div class="form-group">
    <?= form_label('Choisir une conférence :', 'conference', ['class' => 'font-weight-bold']); ?>
    <?php 
    $modele = new \App\Modele\Modele();
    $conferences = $modele->getLesConferencesThemes(); 
    ?>
    <select name="conference" id="conference" class="form-control">
        <?php foreach ($conferences as $conference): ?>
            <option value="<?= $conference['theme'] ?>"><?= $conference['theme'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <?= form_label('Choisir un créneau de présentation :', 'presentation', ['class' => 'font-weight-bold']); ?>
    <?php 
    $presentations = $modele->getLesPresentations(); // Modification pour récupérer les présentations
    ?>
    <select name="presentation" id="presentation" class="form-control">
        <?php foreach ($presentations as $presentation): ?>
            <option value="<?= $presentation['horaire'] ?>"><?= $presentation['horaire'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <?= form_label('Date de réservation disponible :', 'date', ['class' => 'font-weight-bold']); ?>
    <?php 
    $dates = $modele->getLesPresentationsDate(); // Modification pour récupérer les dates
    ?>
    <select name="date" id="date" class="form-control" required>
        <?php foreach ($dates as $date): ?>
            <option value="<?= $date['dateDisponible'] ?>"><?= $date['dateDisponible'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <?= form_label('Votre nom :', 'name', ['class' => 'font-weight-bold']); ?>
    <?= form_input(['name' => 'name', 'id' => 'name', 'class' => 'form-control', 'required' => 'required']); ?>
</div>
<div id="reservationPopup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <p>Votre réservation a été enregistrée avec succès !</p>
    </div>
</div>

<?= form_submit('submit', 'Réserver', ['class' => 'btn btn-primary']); ?>
<?= form_close(); ?>
<script>
    // Fonction pour charger les présentations en fonction de la conférence sélectionnée
    function loadPresentations() {
        // Récupérer la valeur sélectionnée dans le menu déroulant des conférences
        var selectedConference = document.getElementById('conference').value;

        // Envoyer une requête AJAX au serveur pour récupérer les présentations associées à la conférence sélectionnée
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'getPresentations.php?conference=' + selectedConference, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Mettre à jour le menu déroulant des présentations avec les données récupérées
                var presentations = JSON.parse(xhr.responseText);
                var presentationDropdown = document.getElementById('presentation');
                presentationDropdown.innerHTML = '';
                presentations.forEach(function (presentation) {
                    var option = document.createElement('option');
                    option.text = presentation.horaire;
                    option.value = presentation.horaire;
                    presentationDropdown.add(option);
                });
            } else {
                console.error('Erreur lors de la récupération des présentations');
            }
        };
        xhr.send();
    }

    // Écouter les changements dans le menu déroulant des conférences
    document.getElementById('conference').addEventListener('change', loadPresentations);

    // Charger les présentations initiales au chargement de la page
    window.onload = loadPresentations;
</script>





</body>
