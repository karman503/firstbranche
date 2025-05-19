<!DOCTYPE html>
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
        die("Erreur de connexion" . mysqli_connect_error($conn));
    }
    // $nom = "Ahmed";
    // $prenom = "Dhego";
    // $age = 18;
    // mysqli_query($conn, "insert into etudiants (nom,prenom,age) values('$nom','$prenom',$age)");
    $sql2 = "delete from etudiants where id>16";
    mysqli_query($conn, $sql2);
    $sql = "select * from etudiants";
    $resultat = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($resultat)) {
        echo "id: " . $row["id"] . " Nom: " . $row["nom"] . " Prenom: " . $row["prenom"] . " Age: " . $row["age"] . "<br>";
    }

    mysqli_close($conn);

    ?>
</body>

</html>