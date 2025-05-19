<?php
// // $conn = mysqli_connect("localhost", "root", "", "ma_base") or die("Erreur de connexion à la base de données" . mysqli_connect_error());
// // $nom = $_POST['nom'];
// // $prenom = $_POST['prenom'];
// // $age = $_POST['age'];
// // $sql = mysqli_query($conn, "INSERT INTO etudiants (nom, prenom, age) VALUES ('$nom', '$prenom', '$age')") or die("Erreur d'insertion dans la base de données" . mysqli_error($conn));
// // // echo "Nom   : " . $nom . "<br>";
// // // echo "Prénom: " . $prenom . "<br>";
// // // echo "Age   : " . $age . "<br>";
// // // echo "<br>";
// // // $sql2 = "delete from etudiants";
// // $result = mysqli_query($conn, "select * from etudiants") or die("Erreur de sélection dans la base de données" . mysqli_error($conn));
// // if ($result) {
// //     echo "<table border='1'>";
// //     echo "<tr><th>id</th><th>Nom</th><th>Prénom</th><th>Age</th></tr>";
// //     while ($row = mysqli_fetch_assoc($result)) {
// //         echo "<tr>";
// //         echo "<td>" . $row['id'] . "</td>";
// //         echo "<td>" . $row['nom'] . "</td>";
// //         echo "<td>" . $row['prenom'] . "</td>";
// //         echo "<td>" . $row['age'] . "</td>";
// //         echo "</tr>";
// //     }
// //     echo "</table>";
// // } else {
// //     echo "Erreur de sélection dans la base de données" . mysqli_error($conn);
// // }
// // //suppression d'un enregistrement
// // if (isset($_POST['id'])) {
// //     $sql = "DELETE FROM etudiants WHERE id=" . $_POST['id'];
// //     if (mysqli_query($conn, $sql)) {
// //         echo "L'enregistrement a été supprimé avec succès.";
// //     } else {
// //         echo "Erreur de suppression dans la base de données" . mysqli_error($conn);
// //     }
// // } else {
// //     echo "Aucun ID fourni pour la suppression.";
// // }

// // Modification d'un enregistrement
// if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age'])) {
//     $id = $_POST['id'];
//     $nom = $_POST['nom'];
//     $prenom = $_POST['prenom'];
//     $age = $_POST['age'];
//     $sql = "UPDATE etudiants SET nom='$nom', prenom='$prenom', age='$age' WHERE id=$id";
//     if (mysqli_query($conn, $sql)) {
//         echo "L'enregistrement a été mis à jour avec succès.";
//     } else {
//         echo "Erreur de mise à jour dans la base de données" . mysqli_error($conn);
//     }
// } else {
//     echo "Aucun ID ou données fournies pour la mise à jour.";
// }

// // Affichage de tous les enregistrements
$result = mysqli_query($conn, "SELECT * FROM etudiants") or die("Erreur de sélection dans la base de données" . mysqli_error($conn));
if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>id</th><th>Nom</th><th>Prénom</th><th>Age</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['prenom'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Erreur de sélection dans la base de données" . mysqli_error($conn);
}
mysqli_close($conn);
