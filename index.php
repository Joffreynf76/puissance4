<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Puissance 4</title>
</head>
<body>
<h1>Puissance 4</h1>

<?php
session_start();
function deck(int $x=7, int $y =6) : array {
    for($row =0; $row<=5;$row++){
        for($col =0; $col<=6; $col++){
            $plateau[$row][$col] = 0;
        }
    }

    for($row =0; $row<=5;$row++){
        for($col =0; $col<=6; $col++){
            echo $plateau[$row][$col];
            if($col ==6){
                echo '<br>';
            }
        }
    }
    $_SESSION['plateau'] = $plateau;
    return $plateau;
}
if(!isset($_POST['play'])){
    deck();
}

function play(){


    if(isset($_POST['play2'])){
        $colonne = (int)$_POST['colonne'];
        $plateau = $_SESSION['plateau'];
        $count = count($plateau[0]);
        $i=0;

        for($x=$count;$x>=0;$x--){
            if($plateau[$x][$colonne]===1){
                $i++;
            }
        }
        for($j=5;$j>=0;$j--){

            if($plateau[$j][$colonne] === 1 ||$plateau[$j][$colonne] === 2 ){



                $plateau[$j-$i][$colonne] = 2;
                if($plateau[$j][2] == 1  || $plateau[$j][4] == 1){
                    if($plateau[$j][1] == 1  || $plateau[$j][5] == 1){
                        if($plateau[$j][0] == 1  || $plateau[$j][6] == 1){
                            $_SESSION['end'] = true;

                        }
                    }
                }

                break;

            } else {
                $plateau[$j][$colonne] = 2;
                if($plateau[$j][2] == 1  || $plateau[$j][4] == 1){
                    if($plateau[$j][1] == 1  || $plateau[$j][5] == 1){
                        if($plateau[$j][0] == 1  || $plateau[$j][6] == 1){
                            $_SESSION['end'] = true;

                        }
                    }
                }
                break;
            }
        }
        for($row =0; $row<=5;$row++){
            for($col =0; $col<=6; $col++){
                echo $plateau[$row][$col];
                if($col ==6){
                    echo '<br>';
                }
            }
        }
        $_SESSION['plateau'] = $plateau;
    } else {
        $colonne = (int)$_POST['colonne'];
        $plateau = $_SESSION['plateau'];
        $count = count($plateau[0]);
        $i=0;

        for($x=$count;$x>=0;$x--){
            if($plateau[$x][$colonne]===1){
                $i++;
            }
        }

        for($j=5;$j>=0;$j--){

            if($plateau[$j][$colonne] === 1){



                $plateau[$j-$i][$colonne] = 1;
                if($plateau[$j][2] == 1  || $plateau[$j][4] == 1){
                    if($plateau[$j][1] == 1  || $plateau[$j][5] == 1){
                        if($plateau[$j][0] == 1  || $plateau[$j][6] == 1){
                            $_SESSION['end'] = true;

                        }
                    }
                }

                break;

            } else {
                $plateau[$j][$colonne] = 1;
                if($plateau[$j][2] == 1  || $plateau[$j][4] == 1){
                    if($plateau[$j][1] == 1  || $plateau[$j][5] == 1){
                        if($plateau[$j][0] == 1  || $plateau[$j][6] == 1){
                            $_SESSION['end'] = true;

                        }
                    }
                }
                break;
            }
        }
        for($row =0; $row<=5;$row++){
            for($col =0; $col<=6; $col++){
                echo $plateau[$row][$col];
                if($col ==6){
                    echo '<br>';
                }
            }
        }
        $_SESSION['plateau'] = $plateau;
    }





}
if(isset($_POST['play'])){
    play();
}

/*
 * Algorithme décision pour l'ordinateur
 *
 * Pour cet algorithme il faut trois fonctions distincts
 *
 * Une fonction qui est capable de lister l'ensembles des coups possibles par rapport aux pions déjà placés
 * Une fonction qui permet de déterminer quel joueur a l'avantage
 * Une fonction qui permet de déterminer le meilleur coup à jouer
 *
 * Fonction générateur de coup : répertorier toutes les colonnes qui ne sont pas totalement remplies
 *
 * Pour déterminer les coups possibles il faut compter les places disponibles dans chaques ligne et chaque colonne.
 * Il faut aussi une fonction pour les diagonales
 *
 * Pour évaluer qui a l'avantage il faut utiliser un sytème de point avec des coefficient ( 1 point pour un pion aligné, 5 pour deux pions,
 *  50 pour trois pions, 1000 pour quatre pions) et faire la différence des points des deux joueurs
 *
 * Afin de déterminer quel est le meilleur coup à jouer nous pouvons utiliser l'algorithme min-max
 *
 * */

?>
<form method="post">
    <label for="colonne">Colonne J1</label>
    <input type="text" id="colonne" name="colonne">


    <input type="submit" value="Jouer" name="play">

    <div>
        <label for="colonnej2">Colonne J2</label>
        <input type="text" id="colonnej2" name="colonnej2">


        <input type="submit" value="Jouer" name="play2">
    </div>
</form>
</body>
</html>
