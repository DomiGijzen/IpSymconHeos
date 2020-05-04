<?php
    // Klassendefinition
    class HeosController extends IPSModule {

        // Überschreibt die interne IPS_Create($id) Funktion
        public function Create() {
            // Diese Zeile nicht löschen.
            parent::Create();
            
            //Properties
            $this->RegisterPropertyString("HeosIP", "192.168.100.100");
            $this->RegisterPropertyInteger("HeosPort", 1255);

            //Variables
            $this->RegisterVariableString("Feedback", "Feedback from Heos");
        }
    
        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
        public function ApplyChanges() {
            // Diese Zeile nicht löschen
            parent::ApplyChanges();

            $this->SetValue("Feedback", "nog leeg");
        }

        /**
        * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
        * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
        *
        * ABC_MeineErsteEigeneFunktion($id);
        *
        */
        // public function EchoText() {
        //     echo "tekst";
        // }

        public function GetPlayers() {
            define("STRING_DELIMITER", "\r\n");

            $pid = "870191764";

            // get players
            $command = "heos://player/get_players".STRING_DELIMITER;
            CSCK_SendText(14359, $command); 
        }

        public function ReceiveData($JSONString) {
             // Empfangene Daten vom Gateway/Splitter
            $data = json_decode($JSONString);
            IPS_LogMessage("ReceiveData", utf8_decode($data->Buffer));
        
            // Datenverarbeitung und schreiben der Werte in die Statusvariablen
            SetValue($this->GetIDForIdent("Feedback"), $data->Buffer);
        }
    }
?>