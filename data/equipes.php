<?php
    require("./models/equipe.php");

    //Fonction qui retourne la liste des equipes
    function listeEquipe(){
        $listeDesEquipes = [
            new Equipe(1, "Bresil", 1),
            new Equipe(2, "France", 2),
            new Equipe(3, "Espagne", 3),
            new Equipe(4, "Portugal", 4),
            new Equipe(5, "Argentine", 1),
            new Equipe(6, "Italie", 2),
            new Equipe(7, "Allemegne", 3),
            new Equipe(8, "Haiti", 4)
        ];

        return $listeDesEquipes;
    }


    //Fonction qui retourne deux equipes d'un meme lot
    function deuxEquipesDeMemeLot($equipe, $tableauEquipes){
        $lesDeuxEquipes = [];

        foreach ($tableauEquipes as $newEquipe) {
            if ($newEquipe->getLot() == $equipe->getLot() && $newEquipe->getId() != $equipe->getId()) {
                array_push($lesDeuxEquipes, $equipe);
                array_push($lesDeuxEquipes, $newEquipe);
            }
        }

        return $lesDeuxEquipes;
    }

    //Function qui permet de tester si une equipe existe deja dans un tableau
    // function equipeExiste($equipe, $tableauEquipes){
    //     $existe = false;

    //     foreach ($tableauEquipes as $newEquipe) {
    //         if ($newEquipe->getNom() == $equipe->getNom() && $newEquipe->getId() == $equipe->getId()) {
    //             $existe = true;
    //         }
    //     }

    //     return $existe;
    // }
?>