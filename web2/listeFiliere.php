<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste des filieres</title>
</head>
<body>
    <aside>
        <div class="user-img"></div>
        <h2>Directeur</h2>
        <nav>
            <ul>
                <li>
                        <img src="images/accueil.png" alt="Accueil"><a href="accueil.html">Accueil</a>
                </li>
                <li>
                    <img src="images/etudiant.png" alt="Etudiant">Etudiants
                    <input type="checkbox" id="down1">
                        <label for="down1" class="nav-toggle">
                            <img src="images/down-arrow.png" id="down">
                            <img src="images/up-arrow.png" id="up">
                        </label>
                    <ul class="sous-menu">
                        <li><img src="images/liste.png"><a href="listeEtudiants.php">Liste des etudiants</a></li>
                        <li><img src="images/ajouter.png"><a href="ajouterEtudiants.php">Ajouter un etudiant</a></li>
                        <li><img src="images/supprimer.png"><a href="supprimerEtudiants.php">Supprimer un etudiant</a></li>
                    </ul>
                </li>
                <li>
                    <img src="images/Enseignant.png" alt="Enseignant">Enseignant
                    <input type="checkbox" id="down2">
                        <label for="down2" class="nav-toggle">
                            <img src="images/down-arrow.png" id="down">
                            <img src="images/up-arrow.png" id="up">
                        </label>
                    <ul class="sous-menu">
                        <li><img src="images/liste.png"><a href="listeEnseignant.php">Liste des enseignants</a></li>
                        <li><img src="images/ajouter.png"><a href="ajouterEnseignant.php">Ajouter un enseignant</a></li>
                        <li><img src="images/supprimer.png"><a href="supprimerEnseignant.php" id="petit">Supprimer un enseignant</a></li>
                        <li><img src="images/enseigner.png"><a href="ajouterEnseigner.php">Enseigner un module</a></li>
                    </ul>
                <li>
                    <img src="images/Filiere.png" alt="Filiere">Filière
                    <input type="checkbox" id="down3">
                        <label for="down3" class="nav-toggle">
                            <img src="images/down-arrow.png" id="down">
                            <img src="images/up-arrow.png" id="up">
                        </label>
                    <ul class="sous-menu">
                        <li><img src="images/liste.png"><a href="listeFiliere.php">Liste des filieres</a></li>
                        <li><img src="images/ajouter.png"><a href="ajouterFiliere.php">Ajouter un filière</a></li>
                        <li><img src="images/supprimer.png"><a href="supprimerFiliere.php">Supprimer un filière</a></li>
                    </ul>
                <li><span><img src="images/module.png" alt="Module">Module
                    <input type="checkbox" id="down4">
                        <label for="down4" class="nav-toggle">
                            <img src="images/down-arrow.png" id="down">
                            <img src="images/up-arrow.png" id="up">
                        </label>
                    <ul class="sous-menu">
                        <li><img src="images/liste.png"><a href="listeModule.php">Liste des module</a></li>
                        <li><img src="images/ajouter.png"><a href="ajouterModule.php">Ajouter un module</a></li>
                        <li><img src="images/supprimer.png"><a href="supprimerModule.php">Supprimer un module</a></li>
                    </ul>
                </li>
                <li>
                    <img src="images/note.png" alt="Note">Notes
                    <input type="checkbox" id="down5">
                        <label for="down5" class="nav-toggle">
                            <img src="images/down-arrow.png" id="down">
                            <img src="images/up-arrow.png" id="up">
                        </label>
                    <ul class="sous-menu">
                        <li><img src="images/liste.png"><a href="listeNote.php">Liste des notes</a></li>
                        <li><img src="images/ajouter.png"><a href="ajouterNote.php">Ajouter une note</a></li>
                        <li><img src="images/supprimer.png"><a href="supprimerNote.php">Supprimer une note</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- php ---->
    <?php
        $server="localhost";
        $utilisateur="root";
        $motdepasse="";
        $base="universite";
        $sum=mysqli_connect($server,$utilisateur,$motdepasse,$base);
        $res=mysqli_query($sum,"SELECT * FROM filiere");
    ?>
    <section id="corpsliste">
        <h1 classe="titre_liste">Liste des filieres</h1>
                <table>
                    <thead>
                    <tr>
                        <td>Numero du filiere</td>
                        <td>Nom du filiere</td>
                    </tr>
                    </thead>
                    <?php while($row = mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                            echo "<td>".$row[0]."</td>";
                            echo "<td>".$row[1]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
    </section>
</body>
</html>