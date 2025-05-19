<?php

$conn = mysqli_connect("localhost", "root", "") or die("Erreur de connexion" . mysqli_connect_error());
mysqli_select_db($conn, "base3") or die("Erreur de slection de la base de donne" . mysqli_error($conn));

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$age = $_POST["age"];

$sql = "select * from etudiant ";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo $row["nom"] . " " . $row["prenom"] . " " . $row["age"] . "<br>";
}
