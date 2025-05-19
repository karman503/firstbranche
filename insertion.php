<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $conn = mysqli_connect("localhost", "root", "", "ma_base");
    if (!$conn) {
        die("Echec de connexion !" . mysqli_connect_error());
    }
    $sql2 = "delete from etudiants where id >16";
    mysqli_query($conn, $sql2);
    $resultat = mysqli_query($conn, "select * from etudiants");
    while ($row = mysqli_fetch_assoc($resultat)) {
        echo "ID: " . $row["id"] . " - Nom: " . $row["nom"] . " -Prenom: " . $row["prenom"] . " - Age: " . $row["age"] . "<br>";
    }

    ?>

</body>

</html>