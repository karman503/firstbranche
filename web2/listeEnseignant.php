<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste des enseignants</title>
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
    <?php 
            $server="localhost";
            $utilisateur="root";
            $motdepasse="";
            $base="universite";
            $sum=mysqli_connect($server,$utilisateur,$motdepasse,$base);
            $res=mysqli_query($sum,"select * from enseignant");
            $res1=mysqli_query($sum,"select distinct(grade_enseignant) from enseignant");
            $res2=mysqli_query($sum,"select * from module");
            if($_POST)
            {
                $grade=$_POST['grade'];
                $module=$_POST['module'];
                if(!empty($module) && !empty($grade))
                {
                    $res=mysqli_query($sum,"SELECT E.* FROM enseignant E, enseigner EN where grade_enseignant='$grade'
                    AND E.numero_enseignant=EN.numero_enseignant and code_module=$module");?>
                    <section id="corpsliste">
                        <form action="" method="POST">
                                <span>
                                    Grade
                                    <select name="grade">
                                        <option value=""></option>
                                        <?php while ($row = mysqli_fetch_array($res1)){?>
                                            <option value="<?php echo"$row[0]";?>"><?php echo"$row[0]";?></option>
                                        <?php }?>
                                    </select>
                                </span>
                                <span>
                                        Module
                                        <select name="module">
                                            <option value=""></option>
                                            <?php while ($row = mysqli_fetch_array($res2)){?>
                                                <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                                            <?php }?>
                                        </select>
                                </span>
                                <input type="submit" value="CHERCHER">
                        </form>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Numero</td>
                                        <td>Nom</td>
                                        <td>Sexe</td>
                                        <td>Email</td>
                                        <td>Tel mobile</td>
                                        <td>Tel fixe</td>
                                        <td>Adresse</td>
                                        <td>Grade</td>
                                    </tr>
                                </thead>
                                <?php while($row = mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo "<td>".$row[0]."</td>";
                                        echo "<td>".$row[1]."</td>";
                                        echo "<td>".$row[2]."</td>";
                                        echo "<td>".$row[3]."</td>";
                                        echo "<td>".$row[4]."</td>";
                                        echo "<td>".$row[5]."</td>";
                                        echo "<td>".$row[6]."</td>";
                                        echo "<td>".$row[7]."</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </table>
                        </section>
                <?php }
                else if(!empty($grade))
                {
                    $res=mysqli_query($sum,"SELECT * FROM enseignant where grade_enseignant='$grade'");?>
                        <section id="corpsliste">
                        <form action="" method="POST">
                                <span>
                                    Grade
                                    <select name="grade">
                                        <option value=""></option>
                                        <?php while ($row = mysqli_fetch_array($res1)){?>
                                            <option value="<?php echo"$row[0]";?>"><?php echo"$row[0]";?></option>
                                        <?php }?>
                                    </select>
                                </span>
                                <span>
                                        Module
                                        <select name="module">
                                            <option value=""></option>
                                            <?php while ($row = mysqli_fetch_array($res2)){?>
                                                <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                                            <?php }?>
                                        </select>
                                </span>
                                <input type="submit" value="CHERCHER">
                        </form>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Numero</td>
                                        <td>Nom</td>
                                        <td>Sexe</td>
                                        <td>Email</td>
                                        <td>Tel mobile</td>
                                        <td>Tel fixe</td>
                                        <td>Adresse</td>
                                        <td>Grade</td>
                                    </tr>
                                </thead>
                                <?php while($row = mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo "<td>".$row[0]."</td>";
                                        echo "<td>".$row[1]."</td>";
                                        echo "<td>".$row[2]."</td>";
                                        echo "<td>".$row[3]."</td>";
                                        echo "<td>".$row[4]."</td>";
                                        echo "<td>".$row[5]."</td>";
                                        echo "<td>".$row[6]."</td>";
                                        echo "<td>".$row[7]."</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </table>
                        </section>
                <?php }
                else if(!empty($module))
                {
                    $res=mysqli_query($sum,"SELECT E.* FROM enseignant E, enseigner EN where 
                    E.numero_enseignant=EN.numero_enseignant and code_module=$module");?>
                    <section id="corpsliste">
                        <form action="" method="POST">
                                <span>
                                    Grade
                                    <select name="grade">
                                        <option value=""></option>
                                        <?php while ($row = mysqli_fetch_array($res1)){?>
                                            <option value="<?php echo"$row[0]";?>"><?php echo"$row[0]";?></option>
                                        <?php }?>
                                    </select>
                                </span>
                                <span>
                                        Module
                                        <select name="module">
                                            <option value=""></option>
                                            <?php while ($row = mysqli_fetch_array($res2)){?>
                                                <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                                            <?php }?>
                                        </select>
                                </span>
                                <input type="submit" value="CHERCHER">
                        </form>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Numero</td>
                                        <td>Nom</td>
                                        <td>Sexe</td>
                                        <td>Email</td>
                                        <td>Tel mobile</td>
                                        <td>Tel fixe</td>
                                        <td>Adresse</td>
                                        <td>Grade</td>
                                    </tr>
                                </thead>
                                <?php while($row = mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo "<td>".$row[0]."</td>";
                                        echo "<td>".$row[1]."</td>";
                                        echo "<td>".$row[2]."</td>";
                                        echo "<td>".$row[3]."</td>";
                                        echo "<td>".$row[4]."</td>";
                                        echo "<td>".$row[5]."</td>";
                                        echo "<td>".$row[6]."</td>";
                                        echo "<td>".$row[7]."</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </table>
                    </section>
                <?php }
                else 
                { $res=mysqli_query($sum,"SELECT * FROM enseignant");?>
                        <section id="corpsliste">
                        <form action="" method="POST">
                                <span>
                                    Grade
                                    <select name="grade">
                                        <option value=""></option>
                                        <?php while ($row = mysqli_fetch_array($res1)){?>
                                            <option value="<?php echo"$row[0]";?>"><?php echo"$row[0]";?></option>
                                        <?php }?>
                                    </select>
                                </span>
                                <span>
                                        Module
                                        <select name="module">
                                            <option value=""></option>
                                            <?php while ($row = mysqli_fetch_array($res2)){?>
                                                <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                                            <?php }?>
                                        </select>
                                </span>
                                <input type="submit" value="CHERCHER">
                        </form>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Numero</td>
                                        <td>Nom</td>
                                        <td>Sexe</td>
                                        <td>Email</td>
                                        <td>Tel mobile</td>
                                        <td>Tel fixe</td>
                                        <td>Adresse</td>
                                        <td>Grade</td>
                                    </tr>
                                </thead>
                                <?php while($row = mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo "<td>".$row[0]."</td>";
                                        echo "<td>".$row[1]."</td>";
                                        echo "<td>".$row[2]."</td>";
                                        echo "<td>".$row[3]."</td>";
                                        echo "<td>".$row[4]."</td>";
                                        echo "<td>".$row[5]."</td>";
                                        echo "<td>".$row[6]."</td>";
                                        echo "<td>".$row[7]."</td>";
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
                    Grade
                    <select name="grade">
                        <option value=""></option>
                        <?php while ($row = mysqli_fetch_array($res1)){?>
                            <option value="<?php echo"$row[0]";?>"><?php echo"$row[0]";?></option>
                        <?php }?>
                    </select>
                </span>
                <span>
                        Module
                        <select name="module">
                            <option value=""></option>
                            <?php while ($row = mysqli_fetch_array($res2)){?>
                                <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                            <?php }?>
                        </select>
                </span>
                <input type="submit" value="CHERCHER">
        </form>
        <table>
            <thead>
                <tr>
                    <td>Numero</td>
                    <td>Nom</td>
                    <td>Sexe</td>
                    <td>Email</td>
                    <td>Tel mobile</td>
                    <td>Tel fixe</td>
                    <td>Adresse</td>
                    <td>Grade</td>
                </tr>
            </thead>
            <?php while($row = mysqli_fetch_array($res))
                {
                    echo "<tr>";
                    echo "<td>".$row[0]."</td>";
                    echo "<td>".$row[1]."</td>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "<td>".$row[4]."</td>";
                    echo "<td>".$row[5]."</td>";
                    echo "<td>".$row[6]."</td>";
                    echo "<td>".$row[7]."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </section>
            <?php }
    ?>
</body>
</html>