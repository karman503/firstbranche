<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "base3");

// Vérifie la connexion
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

// Récupère les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];

// Vérifie si tous les champs sont remplis
if (!empty($nom) && !empty($prenom) && !empty($age)) {

    // Requête préparée (sécurisée)
    $stmt = mysqli_prepare($conn, "INSERT INTO etudiant (nom, prenom, age) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssi", $nom, $prenom, $age);

    // Exécution
    if (mysqli_stmt_execute($stmt)) {
        echo " Étudiant ajouté avec succès.";
    } else {
        echo "Erreur lors de l'insertion.";
    }

    mysqli_stmt_close($stmt);
} else {
    echo " Tous les champs doivent être remplis.";
}

// Ferme la connexion
mysqli_close($conn);
