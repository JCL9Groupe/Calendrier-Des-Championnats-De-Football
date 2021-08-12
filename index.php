<?php
    // Recuperations des equipes
    require("./data/equipes.php");

    $equipes = [];

    $listeDesEquipes = listeEquipe();

    for ($i=0; $i < 4; $i++) { 
        array_push($equipes, deuxEquipesDeMemeLot($listeDesEquipes[$i], $listeDesEquipes));
    }

    echo "<pre>";
    print_r($equipes);
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
    </body>
</html>