<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de places de cinéma</title>
    
    <link rel="shortcut icon" type="image/png" href="../../assets/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url('R.css'); ?>">
</head>
<body>

<?php helper('form') ?>

<?= form_open('home/submitReservation', ['id' => 'reservationForm']); ?>

<div class="movie-container">
    <?= form_label('Choisir une conférence :', 'conference', ['class' => 'font-weight-bold']); ?>
    <select id="conference" name="conference">
        <?php 
      use App\Modele\Modele;
      $modele = new Modele();
      $conferences = $modele->getLesConferences();
      foreach ($conferences as $conference) : ?>
          <option value="<?= $conference['theme']; ?>"><?= $conference['theme']; ?></option>
      <?php endforeach; ?>
    </select>
</div>


<div class="movie-container">
    <?= form_label('Choisir un créneau de présentation :', 'presentation', ['class' => 'font-weight-bold']); ?>
    <select id="presentation" name="presentation">
        <?php 
        $presentations = $modele->getLesPresentations();
        $conferences = $modele->getLesConferences();
        
        foreach ($presentations as $presentation) : ?>
            <?php foreach ($conferences as $conference) : ?>
                <?php if ($presentation['idconference'] == $conference['idconference']) : ?>
                    <option value="<?= $presentation['horaire'] ?>"><?= $presentation['horaire'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <?= form_label('Votre nom :', 'name', ['class' => 'font-weight-bold']); ?>
    <?= form_input(['name' => 'name', 'id' => 'name', 'class' => 'form-control', 'required' => 'required']); ?>
</div>

<div class="movie-container">
    <?= form_label('Date de réservation disponible :', 'date', ['class' => 'font-weight-bold']); ?>
    <select id="date" name="date">
        <?php 
        $dates = $modele->getLesPresentationsDate();
        foreach ($dates as $date) : ?>
            <option value="<?= $date['dateDisponible'] ?>"><?= $date['dateDisponible'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="container">
    <div class="screen">Écran</div>
    <div class="row">
        <?php for ($i = 1; $i <= 8; $i++) : ?>
            <div class="seat"></div>
        <?php endfor; ?>
    </div>
    <div class="row">
        <?php for ($i = 1; $i <= 8; $i++) : ?>
            <div class="seat"></div>
        <?php endfor; ?>
    </div>
    <div class="row">
        <?php for ($i = 1; $i <= 8; $i++) : ?>
            <div class="seat"></div>
        <?php endfor; ?>
    </div>
    <div class="row">
        <?php for ($i = 1; $i <= 8; $i++) : ?>
            <div class="seat"></div>
        <?php endfor; ?>
    </div>
    <div class="row">
        <?php for ($i = 1; $i <= 8; $i++) : ?>
            <div class="seat"></div>
        <?php endfor; ?>
    </div>
    <div class="row">
        <?php for ($i = 1; $i <= 8; $i++) : ?>
            <div class="seat"></div>
        <?php endfor; ?>
    </div>
    <!-- Répétez la structure pour les autres rangées de sièges -->
</div>

<p class="text">Vous avez sélectionné <span id="count">0</span> places pour un prix total de $<span id="total">0</span></p>

<?= form_submit('submit', 'Réserver', ['class' => 'btn btn-primary']); ?>
<?= form_close(); ?>

<script src="Rd.js"></script>

<script>
     const container = document.querySelector('.container');
    const seats = document.querySelectorAll('.row .seat:not(.occupied)');
    const count = document.getElementById('count');
    const total = document.getElementById('total');
    const conferenceSelect = document.getElementById('conference');
    const presentationSelect = document.getElementById('presentation');
    const dateSelect = document.getElementById('date');

    populateUI();

    let ticketPrice = +conferenceSelect.value;

    const setMovieData = (movieIndex, moviePrice) => {
        localStorage.setItem('selectedMovieIndex', movieIndex);
        localStorage.setItem('selectedMoviePrice', moviePrice);
    };

    const updateSelectedCount = () => {
        const selectedSeats = document.querySelectorAll('.row .seat.selected');
        const seatsIndex = [...selectedSeats].map(seat => [...seats].indexOf(seat));
        localStorage.setItem('selectedSeats', JSON.stringify(seatsIndex));
        const selectedSeatsCount = selectedSeats.length;
        count.innerText = selectedSeatsCount;
        total.innerText = selectedSeatsCount * ticketPrice;
    };

    function populateUI() {
        const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));
        const selectedConferenceIndex = localStorage.getItem('selectedMovieIndex');

        if (selectedSeats !== null && selectedSeats.length > 0) {
            seats.forEach((seat, index) => {
                if (selectedSeats.indexOf(index) > -1) {
                    seat.classList.add('selected');
                }
            });
        }

        if (selectedConferenceIndex !== null) {
            conferenceSelect.selectedIndex = selectedConferenceIndex;
        }
    }

    conferenceSelect.addEventListener('change', e => {
        ticketPrice = +e.target.value;
        setMovieData(e.target.selectedIndex, e.target.value);
        updateSelectedCount();
    });

    container.addEventListener('click', (e) => {
        if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
            e.target.classList.toggle('selected');
            updateSelectedCount();
        }
    });
    // Fonction pour mettre à jour la sélection du menu déroulant lorsque vous choisissez un thème
    function updateConferenceSelection() {
        const selectedTheme = conferenceSelect.value;
        conferenceSelect.querySelectorAll('option').forEach(option => {
            if (option.value === selectedTheme) {
                option.selected = true;
            } else {
                option.selected = false;
            }
        });
    }
    document.getElementById('reservationForm').addEventListener('submit', function(event) {
    const conferenceSelect = document.getElementById('conference');
    if (conferenceSelect.value === '') {
        event.preventDefault(); // Empêche la soumission du formulaire
        alert('Veuillez sélectionner une conférence.');
    }
});

    // Événement de changement sur le menu déroulant des thèmes
    conferenceSelect.addEventListener('change', () => {
        updateConferenceSelection();
    });

    // Appel initial de la fonction pour mettre à jour la sélection
    updateConferenceSelection();

    updateSelectedCount();
    

    // Écouter les changements dans le menu déroulant des conférences
    document.getElementById('conference').addEventListener('change', loadPresentations);

    // Charger les présentations initiales au chargement de la page
    window.onload = loadPresentations;
    fetch('http://localhost/GSB3/public/index.php/Reservation?id=' + selectedConferenceId)
    .then(response => response.json())
    .then(data => {
        // Afficher les informations de la conférence dans la page
        document.getElementById('conferenceInfo').innerHTML = `
            <p>Titre: ${data.theme_conference}</p>
            <p>Description: ${data.description}</p>
            <!-- Ajoutez d'autres informations que vous souhaitez afficher -->
        `;
    })
    .catch(error => console.error('Erreur lors du chargement des informations de la conférence:', error));

</script>

</body>
</html>
