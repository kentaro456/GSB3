<?php 

    namespace App\Libraries;
    use App\Libraries\GestionDate;

    class Presentation {
        private int $idPresentation, $nbPlacesOccupées;

        private $datePresentation;
        
        private $horairePresentation;

        private $dureePresentation;

        private int $idConference;

        private int $nbJoursRestants;

        private Animateur $sonAnim;

        private Salle $saSalle;

        private Intervenant $sonIntervenant; 

        private array $reservations;

        public function __construct($idPres, $date, $horaire, $duree, $idConf, $unAnim, $uneSalle, $unIntervenant)
        {
            $this->idPresentation = $idPres;
            $this->datePresentation = $date;
            $this->horairePresentation = $horaire;
            $this->dureePresentation = $duree;
            $this->idConference = $idConf;
            $this->sonAnim = $unAnim;
            $this->saSalle = $uneSalle;
            $this->sonIntervenant = $unIntervenant;
            $this->nbJoursRestants = GestionDate::getNbJoursRestant($this->datePresentation);
            $this->nbPlacesOccupées = 0;
        }

        public function getIdPres(): int
        {
            return $this->idPresentation;
        }

        /**
         * Fonction qui set le nombres de places réservées d'une presentation
         *
         * @param int $nb
         * @return void
         */
        public function setNbplacesOccupees($nb)
        {
            $this->nbPlacesOccupées = $nb;
        }

        public function getNbPlacesOccupees():int
        {
            return ($this->nbPlacesOccupées);
        }

        public function setIdPres($idPres)
        {
            $this->idPresentation = $idPres;
        }
        public function getDatePres()
        {
            return $this->datePresentation;
        }

        public function setDatePres($uneDate)
        {
            $this->datePresentation = $uneDate;
        }

        public function getHorairePres()
        {
            return $this->horairePresentation;
        }

        public function setHorairePres($unHoraire)
        {
            $this->horairePresentation = $unHoraire;
        }

        public function getDureePres()
        {
            return $this->dureePresentation;
        }

        public function setDureePres($duree)
        {
            $this->dureePresentation = $duree;
        }

        public function getIdConference():int
        {
            return $this->idConference;
        }

        public function setIdConf($idConf)
        {
            $this->idConference = $idConf;
        }

        public function getSonAnim(): Animateur
        {
            return $this->sonAnim;
        }

        public function setSonAnim($unAnim)
        {
            $this->sonAnim = $unAnim;
        }

        public function getSonIntervenant(): Intervenant
        {
            return $this->sonIntervenant;
        }

        public function setSonIntervenant($unInter)
        {
            $this->sonIntervenant = $unInter;
        }

        public function getSaSalle(): Salle
        {
            return $this->saSalle;
        }

        public function setSaSalle($uneSalle)
        {
            $this->saSalle = $uneSalle;
        }

        /**
         * Fonction qui retourne le nombre de jours restants avant le déroulement de la présentation
         *
         * @return int $nbJours 
         */
        public function getNbJoursRestants():int
        {
            return $this->nbJoursRestants;
        }

        /**
         * Fonction qui mets à jours le nombre de jours restants
         *
         * @return void
         */
        public function updateJoursRestants():void
        {
            $this->nbJoursRestants = GestionDate::getNbJoursRestant($this->datePresentation);
        }
    }

?>