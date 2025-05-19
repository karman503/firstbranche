<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "base3") or die("Erreur de connexion : " . mysqli_connect_error());

    if ($_POST) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];

        if (!empty($nom) && !empty($prenom) && !empty($age)) {
            $sql = "INSERT INTO etudiant (nom, prenom, age) VALUES ('$nom', '$prenom', '$age')";
            $result = mysqli_query($conn, $sql) or die("Erreur lors de l'insertion : " . mysqli_error($conn));
            if ($result) {
                echo " Données insérées avec succès.";
            } else {
                echo " Erreur lors de l'insertion.";
            }
        } else {
            echo " Veuillez remplir tous les champs.";
        }
    }
    ?>

    <!-- Le formulaire HTML commence ici, hors du PHP -->
    <form action="" method="POST">
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom"><br>
        <label for="prenom">Prenom:</label><br>
        <input type="text" id="prenom" name="prenom"><br>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age"><br><br>
        <input type="submit" value="Envoyer">
    </form>

</body>

</html>