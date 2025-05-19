<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste des etudiants</title>
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
                        <li><img src="images/liste.png"><a href="listeEnseignant.php">Liste des enseignats</a></li>
                        <li><img src="images/ajouter.png"><a href="ajouterEnseignant.php">Ajouter un enseignant</a></li>
                        <li><img src="images/supprimer.png"><a href="supprimerEnseignant.php">Supprimer un enseignant</a></li>
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
                    <img src="images/note.png" alt="Note">Examens
                    <input type="checkbox" id="down6">
                        <label for="down6" class="nav-toggle">
                            <img src="images/down-arrow.png" id="down">
                            <img src="images/up-arrow.png" id="up">
                        </label>
                    <ul class="sous-menu">
                        <li><img src="images/liste.png"><a href="listeExamen.php">Liste des examens</a></li>
                        <li><img src="images/ajouter.png"><a href="ajouterExamen.php">Ajouter un examen</a></li>
                        <li><img src="images/supprimer.png"><a href="supprimerExamen.php">Supprimer un examen</a></li>
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
    <!--PHP-->
    <?php 
        $server="localhost";
        $utilisateur="root";
        $motdepasse="";
        $base="universite";
        $sum=mysqli_connect($server,$utilisateur,$motdepasse,$base)
        or die("Impossible de se connecter au server de base de donnees.");
        mysqli_select_db($sum,$base)
        or die("Impossible de trouver la base de donnees");
        $res1=mysqli_query($sum,"SELECT * FROM filiere");
        $res2=mysqli_query($sum,"SELECT numero_etudiant, nom_etudiant, mot_passe_etudiant,sexe_etudiant,adresse_etudiant,
                                 nom_filiere,niveau_etudiant FROM etudiant E, filiere F 
                                 WHERE E.num_filiere=F.num_filiere ORDER BY nom_filiere, niveau_etudiant,nom_etudiant");

        if($_POST)
        {
            $niveau=$_POST['niveau'];
            $filiere=$_POST['filiere'];
            if(!empty($niveau) && !empty($filiere))
            {
                $res2=mysqli_query($sum,"SELECT numero_etudiant, nom_etudiant, mot_passe_etudiant,sexe_etudiant,adresse_etudiant,
                                 nom_filiere,niveau_etudiant FROM etudiant E, filiere F 
                                 WHERE E.num_filiere=F.num_filiere AND E.num_filiere=$filiere AND E.niveau_etudiant=$niveau 
                                 ORDER BY nom_filiere, niveau_etudiant,nom_etudiant");?>
                <section id="corpsliste">
                <form action="" method="POST">
                    <span>
                        Filiere
                        <select name="filiere">
                        <option value="" selected></option>
                            <?php while ($row = mysqli_fetch_array($res1)){?>
                                <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                            <?php }?>
                        </select>
                    </span>
                    <span>
                        Niveau
                        <select name="niveau">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    </span>
                    <input type="submit" value="CHERCHER">
                </form>
                <table>
                    <thead>
                    <tr>
                        <td>Numero</td>
                        <td>Nom</td>
                        <td>Mot de passe</td>
                        <td>Sexe</td>
                        <td>Adresse</td>
                        <td>Filiere</td>
                        <td>Niveau</td>
                    </tr>
                    </thead>
                    <?php while($row = mysqli_fetch_array($res2))
                        {
                            echo "<tr>";
                            echo "<td>".$row[0]."</td>";
                            echo "<td>".$row[1]."</td>";
                            echo "<td>".$row[2]."</td>";
                            echo "<td>".$row[3]."</td>";
                            echo "<td>".$row[4]."</td>";
                            echo "<td>".$row[5]."</td>";
                            echo "<td>".$row[6]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </section>
             <?php }
            else if(!empty($filiere))
            {?>
                <?php $res2=mysqli_query($sum,"SELECT numero_etudiant, nom_etudiant, mot_passe_etudiant,sexe_etudiant,adresse_etudiant,
                                 nom_filiere,niveau_etudiant FROM etudiant E, filiere F 
                                 WHERE E.num_filiere=F.num_filiere AND E.num_filiere=$filiere
                                 ORDER BY nom_filiere, niveau_etudiant,nom_etudiant");?>
                <section id="corpsliste">
                <form action="" method="POST">
                    <span>
                        Filiere
                        <select name="filiere">
                        <option value="" selected></option>
                            <?php while ($row = mysqli_fetch_array($res1)){?>
                                <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                            <?php }?>
                        </select>
                    </span>
                    <span>
                        Niveau
                        <select name="niveau">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    </span>
                    <input type="submit" value="CHERCHER">
                </form>
                <table>
                    <thead>
                    <tr>
                        <td>Numero</td>
                        <td>Nom</td>
                        <td>Mot de passe</td>
                        <td>Sexe</td>
                        <td>Adresse</td>
                        <td>Filiere</td>
                        <td>Niveau</td>
                    </tr>
                    </thead>
                    <?php while($row = mysqli_fetch_array($res2))
                        {
                            echo "<tr>";
                            echo "<td>".$row[0]."</td>";
                            echo "<td>".$row[1]."</td>";
                            echo "<td>".$row[2]."</td>";
                            echo "<td>".$row[3]."</td>";
                            echo "<td>".$row[4]."</td>";
                            echo "<td>".$row[5]."</td>";
                            echo "<td>".$row[6]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </section>
            <?php }
            else if(!empty($niveau))
            {?>
                <?php $res2=mysqli_query($sum,"SELECT numero_etudiant, nom_etudiant, mot_passe_etudiant,sexe_etudiant,adresse_etudiant,
                                 nom_filiere,niveau_etudiant FROM etudiant E, filiere F 
                                 WHERE E.num_filiere=F.num_filiere AND E.niveau_etudiant=$niveau 
                                 ORDER BY nom_filiere, niveau_etudiant,nom_etudiant");?>
                <section id="corpsliste">
                <form action="" method="POST">
                    <span>
                        Filiere
                        <select name="filiere">
                        <option value="" selected></option>
                            <?php while ($row = mysqli_fetch_array($res1)){?>
                                <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                            <?php }?>
                        </select>
                    </span>
                    <span>
                        Niveau
                        <select name="niveau">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    </span>
                    <input type="submit" value="CHERCHER">
                </form>
                <table>
                    <thead>
                    <tr>
                        <td>Numero</td>
                        <td>Nom</td>
                        <td>Mot de passe</td>
                        <td>Sexe</td>
                        <td>Adresse</td>
                        <td>Filiere</td>
                        <td>Niveau</td>
                    </tr>
                    </thead>
                    <?php while($row = mysqli_fetch_array($res2))
                        {
                            echo "<tr>";
                            echo "<td>".$row[0]."</td>";
                            echo "<td>".$row[1]."</td>";
                            echo "<td>".$row[2]."</td>";
                            echo "<td>".$row[3]."</td>";
                            echo "<td>".$row[4]."</td>";
                            echo "<td>".$row[5]."</td>";
                            echo "<td>".$row[6]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </section>
            <?php }
            else
            {?>
                <?php $res2=mysqli_query($sum,"SELECT numero_etudiant, nom_etudiant, mot_passe_etudiant,sexe_etudiant,adresse_etudiant,
                                 nom_filiere,niveau_etudiant FROM etudiant E, filiere F 
                                 WHERE E.num_filiere=F.num_filiere ORDER BY nom_filiere, niveau_etudiant,nom_etudiant"); ?>
                <section id="corpsliste">
                <form action="" method="POST">
                    <span>
                        Filiere
                        <select name="filiere">
                            <option value="" selected></option>
                            <?php while ($row = mysqli_fetch_array($res1)){?>
                                <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                            <?php }?>
                        </select>
                    </span>
                    <span>
                        Niveau
                        <select name="niveau">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    </span>
                    <input type="submit" value="CHERCHER">
                </form>
                <table>
                    <thead>
                    <tr>
                        <td>Numero</td>
                        <td>Nom</td>
                        <td>Mot de passe</td>
                        <td>Sexe</td>
                        <td>Adresse</td>
                        <td>Filiere</td>
                        <td>Niveau</td>
                    </tr>
                    </thead>
                    <?php while($row = mysqli_fetch_array($res2))
                        {
                            echo "<tr>";
                            echo "<td>".$row[0]."</td>";
                            echo "<td>".$row[1]."</td>";
                            echo "<td>".$row[2]."</td>";
                            echo "<td>".$row[3]."</td>";
                            echo "<td>".$row[4]."</td>";
                            echo "<td>".$row[5]."</td>";
                            echo "<td>".$row[6]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </section>

            <?php }
        }
        else
        {?>
            <section id="corpsliste">
                <form action="" method="POST">
                    <span>
                        Filiere
                        <select name="filiere">
                            <option value="" selected></option>
                            <?php while ($row = mysqli_fetch_array($res1)){?>
                                <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                            <?php }?>
                        </select>
                    </span>
                    <span>
                        Niveau
                        <select name="niveau">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    </span>
                    <input type="submit" value="CHERCHER">
                </form>
                <table>
                    <thead>
                    <tr>
                        <td>Numero</td>
                        <td>Nom</td>
                        <td>Mot de passe</td>
                        <td>Sexe</td>
                        <td>Adresse</td>
                        <td>Filiere</td>
                        <td>Niveau</td>
                    </tr>
                    </thead>
                    <?php while($row = mysqli_fetch_array($res2))
                        {
                            echo "<tr>";
                            echo "<td>".$row[0]."</td>";
                            echo "<td>".$row[1]."</td>";
                            echo "<td>".$row[2]."</td>";
                            echo "<td>".$row[3]."</td>";
                            echo "<td>".$row[4]."</td>";
                            echo "<td>".$row[5]."</td>";
                            echo "<td>".$row[6]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </section>
        <?php } ?>
</body>
</html>