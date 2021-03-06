<?php
    // Recuperations des equipes
    require("./controller/EquipeController.php");
    require("./controller/MatchController.php");

    $groupes = [ [], [] ];
    $listeDeLotequipes = [];
    
    $listeDesEquipes = listeEquipe();

    for ($i=0; $i < count($listeDesEquipes) / 2; $i++) { 
        array_push($listeDeLotequipes, deuxEquipesDeMemeLot($listeDesEquipes[$i], $listeDesEquipes));
    }

    if (isset($_GET['tirage'])) {
        $groupes = tirage($groupes, $listeDeLotequipes);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coupe 3eme Infos</title>
        <link type="text/css" rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>
                        <p>Lot #1</p>
                        <p>(1<sup>e</sup> tete de serie)</p>
                    </th>
                    
                    <th>
                        <p>Lot #2</p>
                        <p>(2<sup>e</sup> tete de serie)</p>
                    </th>
                    <th>
                        <p>Lot #3</p>
                        <p>(3<sup>e</sup> tete de serie)</p>
                    </th>
                    <th>
                        <p>Lot #4</p>
                        <p>(4<sup>e</sup> tete de serie)</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bresil</td>
                    <td>France</td>
                    <td>Espagne</td>
                    <td>Portugal</td>
                </tr>

                <tr>
                    <td>Argentine</td>
                    <td>Italie</td>
                    <td>Allemagne</td>
                    <td>Haiti</td>
                </tr>
            </tbody>
        </table>
        
        <form action="index.php" method="GET">
            <input type="submit" name="tirage" value="Tirage">
        </form>
        
        <?php
            if (!empty($groupes[0])) {
                ?>

                <table border="1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Groupe A</th>
                            <th>Groupe B</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($groupes[0] as $key => $equipe) { 
                                
                                $index = $key + 1;
                                
                                ?>
                                    <tr>
                                        <td><?= $index ?><sup>e</sup> tete de serie</td>
                                        <td><?= $equipe->getNom() ?></td>
                                        <td><?= $groupes[1][$key]->getNom() ?></td>
                                    </tr>
                                    <?php
                            }
                    ?>
                    </tbody>
                </table>
                
                
                <table border="1">
                    <thead>
                        <tr>
                            <th>Groupe A</th>
                            <th>Affiche</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $listeMatchsPremierTours = listerMatchsPremierTour($groupes);

                            $index = 1;

                            foreach ($listeMatchsPremierTours[0] as $key => $match) { 

                                $match->jouer();

                                ?>
                                    <tr>
                                        <td>Match <?= $index ?></td>
                                        <td><?= $match->getEquipe1()->getNom() ?> VS <?= $match->getEquipe2()->getNom() ?></td>
                                        <td><?= $match->getEquipe1()->getBut() ?> - <?= $match->getEquipe2()->getBut() ?></td>
                                    </tr>
                                <?php
                                $index++;
                            }
                        ?>
                    </tbody>
                </table>

                <table border="1">
                    <thead>
                        <tr>
                            <th>Groupe B</th>
                            <th>Affiche</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $listeMatchsPremierTours = listerMatchsPremierTour($groupes);

                            foreach ($listeMatchsPremierTours[1] as $key => $match) { 

                                $match->jouer();

                                ?>
                                    <tr>
                                        <td>Match <?= $index ?></td>
                                        <td><?= $match->getEquipe1()->getNom() ?> VS <?= $match->getEquipe2()->getNom() ?></td>
                                        <td><?= $match->getEquipe1()->getBut() ?> - <?= $match->getEquipe2()->getBut() ?></td>
                                    </tr>
                                <?php
                                $index++;
                            }
                        ?>
                    </tbody>
                </table>

                <table border="1">
                    <thead>
                        <tr>
                            <th colspan="10">Groupe A</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>MJ</th>
                            <th>MG</th>
                            <th>MN</th>
                            <th>MP</th>
                            <th>BP</th>
                            <th>BC</th>
                            <th>Diff</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $listeMatchsPremierTours = listerMatchsPremierTour($groupes);

                            foreach ($groupes[0] as $key => $equipe) { 

                                $position;

                                switch ($key) {
                                    case 0:
                                        $position = "Premier";
                                        break;
                                    
                                        
                                    case 1:
                                        $position = "Deuxieme";
                                        break;
                                    
                                    case 2:
                                        $position = "Troisieme";
                                        break;
                                    
                                    case 3:
                                        $position = "Quatrieme";
                                        break;
                                    default:break;
                                }

                                ?>
                                    <tr>
                                        <td><?= $position ?></td>
                                        <td><?= $equipe->getMatchJouer() ?></td>
                                        <td><?= $equipe->getMatchGagner() ?></td>
                                        <td><?= $equipe->getMatchNull() ?></td>
                                        <td><?= $equipe->getMatchPerdu() ?></td>
                                        <td><?= $equipe->getButPour() ?></td>
                                        <td><?= $equipe->getButContre() ?></td>
                                        <td><?= $equipe->getDiff() ?></td>
                                        <td><?= $equipe->getPoints() ?></td>
                                    </tr>
                                <?php
                                $index++;
                            }
                        ?>
                    </tbody>
                </table>

                <table border="1">
                    <thead>
                        <tr>
                            <th colspan="9">Groupe B</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>MJ</th>
                            <th>MG</th>
                            <th>MN</th>
                            <th>MP</th>
                            <th>BP</th>
                            <th>BC</th>
                            <th>Diff</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $listeMatchsPremierTours = listerMatchsPremierTour($groupes);

                            foreach ($groupes[1] as $key => $equipe) { 

                                $position;

                                switch ($key) {
                                    case 0:
                                        $position = "Premier";
                                        break;
                                    
                                        
                                    case 1:
                                        $position = "Deuxieme";
                                        break;
                                    
                                    case 2:
                                        $position = "Troisieme";
                                        break;
                                    
                                    case 3:
                                        $position = "Quatrieme";
                                        break;
                                    default:break;
                                }

                                ?>
                                    <tr>
                                        <td><?= $position ?></td>
                                        <td><?= $equipe->getMatchJouer() ?></td>
                                        <td><?= $equipe->getMatchGagner() ?></td>
                                        <td><?= $equipe->getMatchNull() ?></td>
                                        <td><?= $equipe->getMatchPerdu() ?></td>
                                        <td><?= $equipe->getButPour() ?></td>
                                        <td><?= $equipe->getButContre() ?></td>
                                        <td><?= $equipe->getDiff() ?></td>
                                        <td><?= $equipe->getPoints() ?></td>
                                    </tr>
                                <?php
                                $index++;
                            }
                        ?>
                    </tbody>
                </table>
                <?php
            }
        ?>
    </body>
</html>
