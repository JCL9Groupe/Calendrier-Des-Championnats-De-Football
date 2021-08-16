<?php
    class Matchs{

        private $equipe_1;
        private $equipe_2;

        function __construct($equipe_1, $equipe_2){
            $this->equipe_1 = $equipe_1;
            $this->equipe_2 = $equipe_2;
        }

        public function jouer(){
            $this->equipe_1->setBut(rand(0, 7));
            $this->equipe_2->setBut(rand(0, 7));

            $this->equipe_1->setMatchJouer();
            $this->equipe_2->setMatchJouer();

            $but_1 = $this->equipe_1->getBut();
            $but_2 = $this->equipe_2->getBut();

            if ($but_1 == $but_2) {
                $this->equipe_1->setMatchNull();
                $this->equipe_2->setMatchNull();

                $this->equipe_1->setPoints(1);
                $this->equipe_2->setPoints(1);
            }elseif ($but_1 > $but_2) {
                $this->equipe_1->setMatchGagner();
                $this->equipe_2->setMatchPerdu();

                $this->equipe_1->setPoints(3);
                $this->equipe_2->setPoints(0);
            }else{
                $this->equipe_1->setMatchPerdu();
                $this->equipe_2->setMatchGagner();

                $this->equipe_1->setPoints(0);
                $this->equipe_2->setPoints(3);
            }

            $this->equipe_1->setButPour($but_1);
            $this->equipe_2->setButPour($but_2);

            $this->equipe_1->setButContre($but_2);
            $this->equipe_2->setButContre($but_1);

            $this->equipe_1->setDiff();
            $this->equipe_2->setDiff();
        }

        public function getEquipe1(){
            return $this->equipe_1;
        }

        public function getEquipe2(){
            return $this->equipe_2;
        }
    }
?>