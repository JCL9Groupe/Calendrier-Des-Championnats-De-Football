<?php
    class Equipe{
        
        private $id;
        private $nom;
        private $lot;
        private $but;
        private $mJ;

        function __construct($id,
            $nom,
            $lot,
            $but = '?',
            $mJ = 0,
            $mG = 0,
            $mN = 0,
            $mP = 0,
            $bP = 0,
            $bC = 0,
            $diff = 0,
            $points = 0
        ){
            $this->id = $id;
            $this->nom = $nom;
            $this->lot = $lot;
            $this->but = $but;
            $this->mJ = $mJ;
            $this->mG = $mG;
            $this->mN = $mN;
            $this->mP = $mP;
            $this->bP = $bP;
            $this->bC = $bC;
            $this->diff = $diff;
            $this->points = $points;
        }

        //Id
        public function getId(){
            return $this->id;
        }
        
        //Nom
        public function getNom(){
            return $this->nom;
        }
        
        //Lot
        public function getLot(){
            return $this->lot;
        }

        //But
        public function setBut($but){
            $this->but = $but;
        }

        public function getBut(){
            return $this->but;
        }

        //Match Jouer
        public function setMatchJouer(){
            $this->mJ++;
        }

        public function getMatchJouer(){
            return $this->mJ;
        }

        //Match Gagner
        public function setMatchGagner(){
            $this->mG++;
        }

        public function getMatchGagner(){
            return $this->mG;
        }

        //Match Null
        public function setMatchNull(){
            $this->mN++;
        }

        public function getMatchNull(){
            return $this->mN;
        }

        //Match Perdu
        public function setMatchPerdu(){
            $this->mP++;
        }

        public function getMatchPerdu(){
            return $this->mP;
        }

        //But Pour
        public function setButPour($but){
            $this->bP += $but;
        }

        public function getButPour(){
            return $this->bP;
        }

        //But Contre
        public function setButContre($but){
            $this->bC += $but;
        }

        public function getButContre(){
            return $this->bC;
        }

        //Diff
        public function setDiff(){
            $this->diff = $this->getButPour() - $this->getButContre();
        }

        public function getDiff(){
            return $this->diff;
        }

        //Points
        public function setPoints($points){
            $this->points += $points;
        }

        public function getPoints(){
            return $this->points;
        }
    }
?>