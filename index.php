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
    echo "<header>
            <h1>
                Calculatrice simple en PHP
            </h1>
        </header>
        <main>
            <form action='index.php' method='post' class='formulaire-calculette'>

            <fieldset class='boite-input-valeurs'>
                <label class='input-nombre-label'>
                    <span>Nombre 1 :</span>
                    <input type='text' name='nombre1' class='input-nombre'>
                </label>
                <label class='input-nombre-label'>
                    <span>Nombre 2 :</span>
                    <input type='text' name='nombre2' class='input-nombre'>
                </label>
            </fieldset>
            <fieldset class='boite-operateur'>
                <label class='operateur'>
                    <span>+</span>
                    <input type='radio' name='operateur' checked value='addition'>
                </label>
                <label class='operateur'>
                    <span>-</span>
                    <input type='radio' name='operateur' value='soustraction'>
                </label>
                <label class='operateur'>
                    <span>*</span>
                    <input type='radio' name='operateur' value='multiplication'>
                </label>
                <label class='operateur'>
                    <span>/</span>
                    <input type='radio' name='operateur' value='division'>
                </label>
                </fieldset>
                <fieldset class='boite-submit'>
                    <input type='submit' value='Calculer' class='bouton-calculer' name='soumis'>
                </fieldset>
            </form>";
        echo "<span class='resultat'>" .(calculer()). "</span></main>";
        
        function calculer() {
            // Voir si la formulaire a été submit
            if (isset($_POST["soumis"])) {
                $n1 = $_POST["nombre1"];
                $n2 = $_POST["nombre2"];
                $n1 = str_replace(",", ".", $n1);
                $n2 = str_replace(",", ".", $n2);
                // Tester si le string est un integer et le transformer en integer si c'est le cas
                if (is_numeric($n1) && is_numeric($n2)) {
                    $n1 = floatval($n1);            
                    $n2 = floatval($n2);
                    // Si c'est un integer, faire des calculs selon l'opérateur choisi
                    switch ($_POST["operateur"]) {
                        case "addition":
                            return $n1 + $n2;
                            break;
                        case "soustraction":
                            return $n1 - $n2;
                            break;
                        case "multiplication":
                            return $n1 * $n2;
                            break;
                        case "division":
                            if ($n2 !== 0) {
                                return $n1 / $n2;
                                break;
                            } else {
                                // L'utilisateur a essayer de diviser par 0. Attention, c'est dangereux !
                                return "On ne peut pas diviser par 0.";
                                break;
                            }
                    }
                } else {
                    // L'utilisateur a submit autre chose qu'un integer.
                    return "Merci de saisir une valeur numérique pour nombre 1 et nombre 2.";
                }
            }
        }
    ?>
</body>

</html>