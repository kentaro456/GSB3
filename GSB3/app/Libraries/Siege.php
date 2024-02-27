<?php

    namespace App\Libraries;

    class Siege{
        private bool $reserved;

        public function __construct(){
            $this->reserved = false;
        }

        /**
         * Procédure qui permet de changer l'état d'un siège 
         *
         * @return void
         */
        public function swapState()
        {
            $this->reserved = !$this->reserved;
        }

        public function getState(): bool
        {
            return $this->reserved;
        }
    }

?>