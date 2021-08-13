<?php
    class Equipe{
        
        private $id;
        private $nom;
        private $lot;

        function __construct($id, $nom, $lot){
            $this->id = $id;
            $this->nom = $nom;
            $this->lot = $lot;
        }

        public function getId(){
            return $this->id;
        }
        
        public function getNom(){
            return $this->nom;
        }
        
        public function getLot(){
            return $this->lot;
        }

        public function setBut($but){
            $this->but = $but;
        }
    }
?>