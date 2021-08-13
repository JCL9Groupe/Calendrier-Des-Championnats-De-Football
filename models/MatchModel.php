<?php
    class Matchs{

        private $equipe_1;
        private $equipe_2;

        function __construct($equipe_1, $equipe_2){
            $this->equipe_1 = $equipe_1;
            $this->equipe_2 = $equipe_2;
        }

        public function jouer($equipe_1, $equipe_2){
            $but_1 = rand(0, 7);
            $but_2 = rand(0, 7);
        }

        public function getEquipe1(){
            return $this->equipe_1;
        }

        public function getEquipe2(){
            return $this->equipe_2;
        }
    }
?>