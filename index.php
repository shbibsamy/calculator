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
    <form action="" class="formulaire-calculette">
        <h1>
            Calculatrice simple en PHP
        </h1>
        <fieldset class="boite-input-valeurs">
            <label for="nombre1" class="input-nombre">
                <span>Nombre 1 :</span>
                <input type="text" name="nombre1" class="input-nombre" id="nombre1">
            </label>
            <label for="nombre2" class="input-nombre">
            <span>Nombre 2 :</span>
                <input type="text" name="nombre2" id="nombre2">
            </label>
        </fieldset>
        <fieldset class="boite-operateur">


        </fieldset>
        <fieldset class="boite-submit">
            <input type="submit" value="Calculer" class="bouton-calculer">
        </fieldset>
        <span class="resultat"></span>
    </form>

    <?php






    echo "<h1></h1>";
    ?>
</body>
</html>