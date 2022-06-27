<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Leaning PHP by making a calculator.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Calculette Basique</title>
</head>

<body>


    <?php
        $n1;
        $n2;
        $resultat= "";
        $messageErreur = "";
        // Voir si la formulaire a été submit
        if (isset($_POST["soumis"])) {
            // Tester si le string est un integer et le transformer en integer si c'est le cas
            if (is_numeric($_POST["nombre1"]) && is_numeric($_POST["nombre2"])) {
                $n1 = intval($_POST["nombre1"]);            
                $n2 = intval($_POST["nombre2"]);
                // Si c'est un integer, faire des calculs selon l'opérateur choisi
                switch ($_POST["operateur"]) {
                    case "addition":
                        $resultat = $n1 + $n2;
                        break;
                    case "soustraction":
                        $resultat = $n1 - $n2;
                        break;
                    case "multiplication":
                        $resultat = $n1 * $n2;
                        break;
                    case "division":
                        if ($n2 !== 0) {
                            $resultat = $n1 / $n2;
                            break;
                        } else {
                            // L'utilisateur a essayer de diviser par 0. Attention, c'est dangereux !
                            $messageErreur = "On ne peut pas diviser par 0.";
                            break;
                        }
                        $messageErreur = "";
                }
            } else {
                // L'utilisateur a submit autre chose qu'un integer.
                $messageErreur = "Merci de saisir une valeur numérique pour nombre 1 et nombre 2.";
            }
        }

        echo "<form action='index.php' method='post' class='formulaire-calculette'>
                <h1>
                    Calculatrice simple en PHP
                </h1>
                <fieldset class='boite-input-valeurs'>
                    <label class='input-nombre'>
                        <span>Nombre 1 :</span>
                        <input type='text' name='nombre1' class='input-nombre' value='0'>
                    </label>
                    <label class='input-nombre'>
                        <span>Nombre 2 :</span>
                        <input type='text' name='nombre2' class='input-nombre' value='0'>
                    </label>
                </fieldset>
                <fieldset class='boite-operateur'>
                    <label class='operateur'>
                        <span>Addition</span>
                        <input type='radio' name='operateur' checked value='addition'>
                    </label>
                    <label class='operateur'>
                        <span>Soustraction</span>
                        <input type='radio' name='operateur' value='soustraction'>
                    </label>
                    <label class='operateur'>
                        <span>Multiplication</span>
                        <input type='radio' name='operateur' value='multiplication'>
                    </label>
                    <label class='operateur'>
                        <span>Division</span>
                        <input type='radio' name='operateur' value='division'>
                    </label>
                </fieldset>
                <fieldset class='boite-submit'>
                    <input type='submit' value='Calculer' class='bouton-calculer' name='soumis'>
                    <span class='resultat'>
                    $resultat
                    $messageErreur
                    </span>
                </fieldset>
            </form>";
    ?>
</body>

</html>