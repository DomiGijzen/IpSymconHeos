<?php
    // Klassendefinition
    class HeosController extends IPSModule {

        // Überschreibt die interne IPS_Create($id) Funktion
        public function Create() {
            // Diese Zeile nicht löschen.
            parent::Create();

            $this->RegisterPropertyString("HeosIP", "192.168.100.100");
            $this->RegisterPropertyInteger("HeosPort", 1255);
        }
    
        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
        public function ApplyChanges() {
            // Diese Zeile nicht löschen
            parent::ApplyChanges();
        }

        /**
        * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
        * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
        *
        * ABC_MeineErsteEigeneFunktion($id);
        *
        */
        public function TestHeos() {
            echo "werkt"
        }

        public function GetPlayers() {
            define("STRING_DELIMITER", "\r\n");

            $pid = "870191764";

            // get players
            $command = "heos://player/get_players".STRING_DELIMITER;
            CSCK_SendText(14359, $command); 
        }
    }
?>