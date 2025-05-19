<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $conn = mysqli_connect("localhost", "root", "") or die("Erreur de connexion" . mysqli_connect_error());
    mysqli_select_db($conn, "base3") or die("Erreur de slection de la base de donne" . mysqli_error($conn));

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];

    if (!empty($nom) && !empty($prenom) && !empty($age)) {
        $sql = "INSERT INTO etudiant (nom, prenom, age) VALUES ('$nom', '$prenom', '$age')";
        if (mysqli_query($conn, $sql)) {
            echo "Enregistrement réussi";
        } else {
            echo "Erreur: " . mysqli_error($conn);
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
    ?>
    <form action="" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="nom"><br><br>
        <label for="prenom">Prenom:</label><br>
        <input type="text" id="prenom" name="prenom"><br><br>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>