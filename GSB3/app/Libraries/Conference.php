<?php 

namespace App\Libraries;

    class Conference{

        private int $idConference;
        
        private string $themeConference;

        public function __construct($id, $theme){
            $this->idConference = $id;
            $this->themeConference = $theme;
        }

        public function getIdConf(): int
        {
            return $this->idConference;
        }

        public function getThemeConf(): string
        {
            return $this->themeConference;
        }
    }
?>