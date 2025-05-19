<?php

$conn = mysqli_connect("localhost", "root", "", "base3") or die("Erreur de connexion" . mysqli_connect_error($conn));

$Nom = $_GET['nom'];
$Prenom = $_GET['prenom'];
$Age = $_GET['age'];
$sql = "insert into etudiant (Nom,Prenom,Age) values($Nom,$Prenom,$Age)";
mysqli_query($conn, $sql);
