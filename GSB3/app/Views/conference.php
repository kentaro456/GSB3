<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('C.css'); ?>">
    
    
    <title>Conférences</title>
    
  
</head>

<body>
<div class="conference-list">
        <?php
        $modele = new \App\Modele\Modele();
        $conferences = $modele->getLesConferences();
        
        foreach ($conferences as $conference) : ?>
             <div class="card" onclick="showConferenceDetails('<?php echo $conference['idconference']; ?>', '<?php echo $conference['description']; ?>')">
             <div class="card-image">
                    <img src="<?php echo base_url('teste.avif'); ?>" alt="Description de l'image">
                </div>
                <div class="category"> Decouvrer nos conference sur :</div>
                <div class="heading"> <?php echo $conference['theme']; ?>
                    <div class="author"> Conference <span class="name"><?php echo $conference['idconference']; ?></span> </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="popup1" class="overlay">
        <div class="popup">
            <h2 id="conference-title"></h2>
            <p id="conference-description"></p>
            <div class="presentation-link">
               
             <?php echo anchor('home/index2/' . $conference['idconference'], 'Voir la présentation'); ?>

            </div>
            <button class="close" onclick="closePopup()">Fermer</button>
        </div>
    </div>
    <div class="icons-container">
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
            src="https://cdn.lordicon.com/thvvrdbi.json"
            trigger="loop"
            delay="1"
            style="width:150px;height:150px">
        </lord-icon>

        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
            src="https://cdn.lordicon.com/leararmb.json"
            trigger="loop"
            delay="1"
            style="width:100px;height:150px">
        </lord-icon><script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
            src="https://cdn.lordicon.com/hpffvnsi.json"
            trigger="loop"
            delay="1"
            style="width:150px;height:150px">
        </lord-icon>
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
            src="https://cdn.lordicon.com/rmgtnokl.json"
            trigger="loop"
            delay="1"
            style="width:150px;height:150px">
        </lord-icon>
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
            src="https://cdn.lordicon.com/xafrnote.json"
            trigger="loop"
            delay="3"
            style="width:150px;height:150px">
        </lord-icon>
        
        
    </div>

    <div id="conference-details" class="conference-details">
        <h2 id="conference-title"></h2>
        <p id="conference-description"></p>
        <button id="close-details-btn" onclick="closeConferenceDetails()">Fermer</button>
    </div>

    <script>
    function showConferenceDetails(conferenceId, description) {
        var conferenceDetails = {
            title: conferenceId,
            description: description
        };

        document.getElementById("conference-title").innerText = conferenceDetails.title;
        document.getElementById("conference-description").innerText = conferenceDetails.description;

        // Modifier le lien pour inclure l'ID de la conférence
        var presentationLink = document.querySelector(".presentation-link a");
        presentationLink.href = "<?php echo base_url('home/index2/'); ?>" + conferenceId;

        document.getElementById("popup1").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup1").style.display = "none";
    }
</script>

    <style>
        .overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Couleur de fond semi-transparente */
    z-index: 999; /* Assure que le pop-up est au-dessus de tous les autres éléments */
    display: none; /* Par défaut, le pop-up est caché */
}

.popup {
    position: fixed;
    background-color: white;
    width: 5000%; /* Largeur du pop-up */
    max-width: 500px; /* Largeur maximale */
    padding: 30px;
    top: 50%; /* Centre le pop-up verticalement */
    left: 50%; /* Centre le pop-up horizontalement */
    transform: translate(-50%, -50%); /* Déplace le pop-up de moitié de sa taille */
    border-radius: 40.5px;
    box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.5); /* Ombre pour un effet de profondeur */
}

.popup h2 {
    margin-top: 0;
    color: #333;
}

.popup p {
    margin-bottom: 20px;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}

.close:hover {
    color: red;
}

    </style>
</body>

</html>
