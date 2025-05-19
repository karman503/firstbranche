<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ACCEUIL</title>
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
                        <li><img src="images/enseigner.png"><a href="ajouterEnseigner.php">Enseigner un module</a></li>
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
        $res1=mysqli_query($sum,"SELECT * FROM module");
        $res2=mysqli_query($sum,"SELECT * FROM enseignant"); 
        if($_POST)
        {
            $enseignant=$_POST['enseignant'];
            $module=$_POST['module'];
            $resultat = mysqli_query($sum,"INSERT INTO enseigner values($module,$enseignant)");
      if($resultat==0)
      {
        echo '
        <div class="alert">
            <input type="checkbox" id="btn-alert">
            <div>
                <img src="images/erreur.png">
                <h3>UNE ERREUR S\'EST PRODUIT</h3>
                <h3>VEUILEZ RESSAYER ULTERIEUREMENT.</h3>
                <label for="btn-alert"><a href="ajouterEnseigner.php">FERMER</a></label>
            </div>
        </div>
        ';
      }
      else
      {
        echo '
        <div class="alert">
            <input type="checkbox" id="btn-alert">
            <div>
                <img src="images/ok.png">
                <h3>La relation "enseigner" est ajouté avec succes dans la base</h3>
                <h3>Merci</h3>
                <label for="btn-alert"><a href="ajouterEnseigner.php">FERMER</a></label>
            </div>
        </div>
        ';
      }
        }
    ?>
    <section id="corps">
        <form action="" method="POST">
            <h2>Enseigner un module</h2>
            <span>Enseignant: </span>
            <span>Module enseigner: </span>
            <select name="enseignant">
                <option value=""></option>
                <?php while ($row = mysqli_fetch_array($res2)){?>
                    <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                <?php }?>
            </select>
            <select name="module">
                <option value=""></option>
                <?php while ($row = mysqli_fetch_array($res1)){?>
                    <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                <?php }?>
            </select>
            <div id="button">
                <input type="submit" value="Ajouter" id="submit-btn">
            </div>
        </form>
    </section>
</body>
</html>