<?php 
    namespace App\Libraries;

    class Animateur extends Utilisateur {
        private int $nbPresentations;

        public function __construct($nom, $prenom, $id, $nb, $typeUser) {
            parent::__construct($id, $nom, $prenom, $typeUser);
            $this->nbPresentations = $nb;
        }

        public function getIdAnimateur():int
        {
            return $this->getIdUser();
        }

        public function getNomAnimateur():string
        {
            return $this->getNomUser();
        }

        public function getPrenomAnimateur():string
        {
            return $this->getPrenomUser();
        }

        public function getTypeUser():string
        {
            return $this->getTypeUser();
        }

        public function getNbAnimations():int
        {
            return $this->nbPresentations;
        }

        public function setNbAnimations($nb)
        {
            $this->nbPresentations = $nb;
        }
    }
?>