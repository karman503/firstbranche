<?php
$conn = mysqli_connect("localhost", "root", "", "base1");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$nom = $_POST['nom'];
$mdp = $_POST['mdp'];
$sql = "insert into etudiant (nom,mdp) values ('$nom','$mdp')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Etudant " . $nom . "enregistre avec succes";
} else {
    echo "Erreur de requete d'insertion" . mysqli_error();
}



mysqli_close($conn);
