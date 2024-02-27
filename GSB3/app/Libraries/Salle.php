<?php
    namespace App\Libraries;

    class Salle {

        private $idSalle, $nbPlacesMaxi,$nomSalle;

        private array $sesSieges;



        public function __construct($id, $nom, $nb)
        {
            $this->idSalle = $id;
            $this->nomSalle = $nom;
            $this->nbPlacesMaxi = $nb;
            $this->instanciateSesSieges($this->nbPlacesMaxi);
        }

        public function getIdSalle(): int
        {
            return $this->idSalle;
        }

        public function getNomSalle():string
        {
            return $this->nomSalle;
        }

        public function getNbPlacesMaxi():int
        {
            return $this->nbPlacesMaxi;
        }

        public function setIdSalle($nb)
        {
            $this->idSalle = $nb;
        }

        public function setNomSalle($nom)
        {
            $this->nomSalle = $nom;
        }

        public function setNbPlacesMaxi($nb)
        {
            $this->nbPlacesMaxi = $nb;
        }

        private function instanciateSesSieges($nb)
        {
            for($i = 1; $i <= $nb; $i++)
            {
                $this->sesSieges[$i] = new Siege();
            }
        }

        public function getSesSieges():array
        {
            return $this->sesSieges;
        }

        public function getUnSiege($index): Siege
        {
            return $this->sesSieges[$index];
        }
    }
?>