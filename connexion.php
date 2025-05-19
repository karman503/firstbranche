<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Calculateur</title>
</head>

<body>
    <h1>Calculateur</h1>

    <form method="post" action="">
        <label for="valeur1">Valeur A :</label><br>
        <input type="number" name="valeur1" id="valeur1" required><br><br>

        <label for="operateur">Opération :</label><br>
        <select name="operateur" id="operateur" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">×</option>
            <option value="/">÷</option>
        </select><br><br>

        <label for="valeur2">Valeur B :</label><br>
        <input type="number" name="valeur2" id="valeur2" required><br><br>

        <input type="submit" name="calculer" value="Envoyer">
    </form>

    <?php
    if (isset($_POST['calculer'])) {
        $a = $_POST['valeur1'];
        $b = $_POST['valeur2'];
        $op = $_POST['operateur'];

        if (!is_numeric($a) || !is_numeric($b)) {
            echo "<p>Veuillez entrer des valeurs numériques valides.</p>";
        } else {
            switch ($op) {
                case '+':
                    $resultat = $a + $b;
                    break;
                case '-':
                    $resultat = $a - $b;
                    break;
                case '*':
                    $resultat = $a * $b;
                    break;
                case '/':
                    if ($b == 0) {
                        $resultat = "Erreur : division par zéro";
                    } else {
                        $resultat = $a / $b;
                    }
                    break;
                default:
                    $resultat = "Opérateur invalide";
            }

            echo "<h2>Résultat :</h2>";
            echo "<p>$a $op $b = <strong>$resultat</strong></p>";
        }
    }
    ?>
</body>

</html>