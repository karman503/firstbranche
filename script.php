<!DOCTYPE html>
<html>

<head>
    <title>Test PHP</title>
</head>

<body>


    <!-- Formulaire HTML -->
    <form action="script.php" method="POST">
        <label for="nombre1">Nombre 1 :</label>
        <input type="number" id="nombre1" name="nombre1" required><br><br>

        <label for="nombre2">Nombre 2 :</label>
        <input type="number" id="nombre2" name="nombre2" required><br><br>

        <input type="submit" value="Ajouter">
    </form>


    <?php
    // Vérifie si les données ont été envoyées via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupère les valeurs des champs du formulaire
        $nombre1 = $_POST['nombre1'];
        $nombre2 = $_POST['nombre2'];

        // Effectue l'addition
        $somme = $nombre1 + $nombre2;

        // Affiche le résultat
        echo "La somme de $nombre1 et $nombre2 est : $somme";
    } else {
        // Si on accède à la page sans avoir soumis le formulaire
        echo "Aucune donnée n'a été envoyée.";
    }
    ?>






</body>

</html>