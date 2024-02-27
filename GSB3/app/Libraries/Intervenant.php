<?php
    namespace App\Libraries;

    class Intervenant extends Utilisateur {
        private string $specialite;

        public function __construct($id, $nom, $prenom, $typeUser ,$spec)
        {
            parent::__construct($id, $nom, $prenom, $typeUser);
            $this->specialite = $spec;
        }

        public function getIdIntervenant(): int
        {
            return $this->getIdUser();
        }

        public function getNomIntervenant():string
        {
            return $this->getNomUser();
        }

        public function getPrenomIntervenant():string
        {
            return $this->getPrenomUser();
        }

        /**
         * Fonction qui retourne la spécialité de l'intervenant 
         * @return string
         */
        public function getSpecialite():string
        {
            return $this->specialite;
        }

        /**
         * Fonction qui permet de changer la specialité d'un intervenant
         *
         * @param string $uneSpec
         * @return void
         */
        public function setSpecialite($uneSpec)
        {
            $this->specialite = $uneSpec;
        }
    }
?>