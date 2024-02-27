<?php 
    namespace App\Libraries;

    /**
     * Classe Utilisateur 
     */
    class Utilisateur{

        private int $idUser;

        private String $nomUser, $prenomUser, $typeUser;

        /**
         * Constructeur de la classe Utilisateur
         *
         * @param int $id
         * @param string $nom
         * @param string $prenom
         * @param string $unType
         */
        public function __construct($id, $nom, $prenom, $unType) {
            $this->nomUser = $nom;
            $this->prenomUser = $prenom;
            $this->idUser = $id;
            $this->typeUser = $unType;
        }

        /**
         * Retourne l'id de l'Utilisateur
         *
         * @return int
         */
        public function getIdUser(): int
        {
            return $this->idUser;
        }

        /**
         * prenom user
         *
         * @return string
         */
        public function getPrenomUser(): string
        {
            return $this->prenomUser;
        }

        /**
         * Nom user
         *
         * @return string
         */
        public function getNomUser(): string
        {
            return $this->nomUser;
        }

        /**
         * Type user
         *
         * @return string
         */
        public function getTypeUser(): string
        {
            return $this->typeUser;
        }

        /**
         * Modifie un type d'un User
         *
         * @param string $unType
         * @return void
         */
        public function setTypeVisiteur($unType)
        {
            $this->typeUser = $unType;
        }
    }
?>