<?php

    namespace App\Libraries;

    class GestionDate {

        /**
         * Fonction qui retourne un nombre de jours de différence entre la date actuelle et la date passée en parametre
         *
         * @param string $uneDate
         * @return integer
         */     
        public static function getNbJoursRestant(string $uneDate): int
        {
            // Convertir la date passée en paramètre en timestamp Unix
            $timestampDatePassée = strtotime($uneDate);
    
            // Obtenir le timestamp actuel
            $timestampDateActuelle = time();
    
            // Calculer la différence en secondes
            $differenceEnSecondes = $timestampDatePassée - $timestampDateActuelle ;

            if ($timestampDatePassée < $timestampDateActuelle) {
                return -1;
            }
    
            // Calculer le nombre de jours en arrondissant vers le bas
            $nbJours = floor($differenceEnSecondes / (60 * 60 * 24));

            return $nbJours;
        }
    }


?>