<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Supprimer un filiere</title>
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
        <!---- PHP------>
        <?php 
        $server="localhost";
        $utilisateur="root";
        $motdepasse="";
        $base="universite";
        $sum=mysqli_connect($server,$utilisateur,$motdepasse,$base)
        or die("Impossible de se connecter au server de base de donnees.");
        mysqli_select_db($sum,$base)
        or die("Impossible de trouver la base de donnees");
        $res=mysqli_query($sum,"select * from filiere");
        if($_POST)
        {
            $numero=$_POST['numero'];
            $nom=$_POST['nom'];
            if(!empty($numero) || !empty($nom))
            {
                if(!empty($nom))
                {
                    $resultat=mysqli_query($sum,"DELETE FROM filiere WHERE num_filiere=$nom");
                }
                else if(!empty($numero))
                {
                    $resultat=mysqli_query($sum,"DELETE FROM filiere WHERE num_filiere=$numero");
                }
                if($resultat==0)
                {
                    echo '
                    <div class="alert">
                        <input type="checkbox" id="btn-alert">
                        <div>
                            <img src="images/erreur.png">
                            <h3>UNE ERREUR S\'EST PRODUIT</h3>
                            <h3>VEUILEZ RESSAYER ULTERIEUREMENT.</h3>
                            <label for="btn-alert"><a href="supprimerFiliere.php">FERMER</a></label>
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
                            <h3>Le filiere  est supprimé avec succes de la base</h3>
                            <h3>Merci</h3>
                            <label for="btn-alert"><a href="supprimerFiliere.php">FERMER</a></label>
                        </div>
                    </div>
                    ';
                }
            }
            else
            {
                echo '
                    <div class="alert">
                        <input type="checkbox" id="btn-alert">
                        <div>
                            <img src="images/erreur.png">
                            <h3>UNE ERREUR S\'EST PRODUIT</h3>
                            <h3>VEUILEZ REMPLIR UNE DE DEUX CHAMPS .</h3>
                            <label for="btn-alert"><a href="supprimerFiliere.php">FERMER</a></label>
                        </div>
                    </div>
                    ';
            }
        }
    ?>
    <!--FORMULAIRE--->
    <section id="corps">
        <form action="" method="POST">
            <h2>Supprimer un filiere</h2>
            <small>VEUILEZ ENTRER SOIT LE NUMERO DU FILIERE, SOIT LE NOM DU FILIERE</small>
            <span>Numéro: </span>
            <span>Nom: </span>
            <input type="number" name="numero" placeholder="exemple: 4321">
            <select name="nom">
                <option value=""></option>
                <?php while ($row = mysqli_fetch_array($res)){?>
                    <option value="<?php echo"$row[0]";?>"><?php echo"$row[1]";?></option>
                <?php }?>
            </select>
            <div id="button">
                <input type="submit" value="Supprimer" id="submit-btn">
            </div>
        </form>
    </section>
</body>
</html>