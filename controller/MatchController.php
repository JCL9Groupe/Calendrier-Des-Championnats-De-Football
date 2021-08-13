<?php
    require("./models/MatchModel.php");

    function listerMatchsPremierTour($groupes){
        $listeMatchs = [
            [
                new Matchs($groupes[0][0], $groupes[0][1]),
                new Matchs($groupes[0][2], $groupes[0][3]),
                new Matchs($groupes[0][0], $groupes[0][2]),
                new Matchs($groupes[0][1], $groupes[0][3]),
                new Matchs($groupes[0][0], $groupes[0][3]),
                new Matchs($groupes[0][1], $groupes[0][2])
            ],
            [
                new Matchs($groupes[1][0], $groupes[1][1]),
                new Matchs($groupes[1][2], $groupes[1][3]),
                new Matchs($groupes[1][0], $groupes[1][2]),
                new Matchs($groupes[1][1], $groupes[1][3]),
                new Matchs($groupes[1][0], $groupes[1][3]),
                new Matchs($groupes[1][1], $groupes[1][2])
            ]
        ];

        return $listeMatchs;
    }
?>