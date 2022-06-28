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
            <span class='instructions'>Veuillez insérer vos deux chiffres à calculer et choisir votre opérateur. Appuyer sur le bouton 'égale' pour éffectuer le calcul.</span>
            <span class='resultat'>" .(traiterInput()). "</span>
            <form action='index.php' method='post' class='formulaire-calculette'>
            <fieldset class='boite-input-valeurs'>
                <label class='input-nombre-label'>
                    <input type='text' name='nombre1' class='input-nombre'>
                </label>
                <label class='input-nombre-label'>
                    <input type='text' name='nombre2' class='input-nombre'>
                </label>
            </fieldset>
            <fieldset class='boite-operateur'>
                <label class='operateur'>
                    <input type='radio' name='operateur' checked value='addition' id='addition'>
                </label>
                <label class='operateur'>
                    <input type='radio' name='operateur' value='soustraction' id='soustraction'>
                </label>
                <label class='operateur'>
                    <input type='radio' name='operateur' value='multiplication' id='multiplication'>
                </label>
                <label class='operateur'>
                    <input type='radio' name='operateur' value='division' id='division'>
                </label>
                </fieldset>
                <fieldset class='boite-submit'>
                    <input type='submit' value='=' class='bouton-calculer' name='soumis'>
                </fieldset>
            </form>
            </main>";
        
        function traiterInput() {
            // Voir si la formulaire a été submit
            if (isset($_POST["soumis"])) {
                // Sanitize le input
                $n1 = htmlspecialchars($_POST["nombre1"]);
                $n2 = htmlspecialchars($_POST["nombre2"]);
                // Remplacer virgule en point pour mes amis français.
                $n1 = str_replace(",", ".", $n1);
                $n2 = str_replace(",", ".", $n2);
                // Tester si le string est un chiffre et le transformer en float si c'est le cas
                if (is_numeric($n1) && is_numeric($n2)) {
                    $n1 = floatval($n1);            
                    $n2 = floatval($n2);
                    // Faire des calculs selon l'opérateur choisi
                    return calculer($n1, $n2);
                } else {
                    // L'utilisateur a submit autre chose qu'un integer.
                    return "Merci de saisir une valeur numérique pour nombre 1 et nombre 2.";
                }
            }
        }

        function calculer ($n1, $n2) {
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
                if ($n2 != 0) {
                    return $n1 / $n2;
                    break;
                } else {
                    // L'utilisateur a essayer de diviser par 0. Attention, c'est dangereux ! Fin du monde.
                    return "On ne peut pas diviser par 0.";
                    break;
                }
            }
        }
    ?>
</body>

</html>