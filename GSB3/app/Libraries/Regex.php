<?php

    namespace App\Libraries;
    class Regex{
        /**
         * Fonction qui teste le pattern du mot de passe
         *
         * @param string $password
         * @return boolean 
         */
        public static function checkPassword($password): bool
        {
            // Vérifier si le mot de passe contient au moins un nombre, une majuscule et aucun caractère spécial
            return preg_match('/[0-9]/', $password) && preg_match('/[A-Z]/', $password) && !preg_match('/[^A-Za-z0-9]/', $password);
        }
    }

?>