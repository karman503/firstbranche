<!DOCTYPE html>
<html>

<head>
    <title>tp2</title>
</head>

<body>
    <table>
        <form method="POST">
            <tr>
                <td> Nom de l'etudiant :</td>
                <td>
                    <select name="nommod">
                        <option value="ali">omar
                        </option>
                        <option value="KADAR">kadar</option>
                        <option value="sigad">sigad</option>
                    </select>
            </tr>
            <tr>
                <td><input type="submit" value="recherche"></td>
            </tr>
        </form>
    </table>
    <?php
    //Connexion
    $serveur = "localhost";
    $user = "root";
    $password = "";
    $base = "pro";
    $connexion = mysql_pconnect($serveur, $user, $password)
        or die("impossible de se connecter");
    mysql_select_db($base)
        or die("Base donne introuvable");
    //Recuperation
    $b = $_POST["nommod"];
    //Creation de requetes
    $R6 = mysql_query("SELECT M.nommod , N.controle_continu ,N.controle_final
, AVG( N.controle_continu * 0.4 + N.controle_final * 0.6 )
FROM etudiant E,note N,Module M 
Where N.numetu=E.numetu
and N.codemod=M.codemod
and e.nometu='$b'");
    echo "<table border=2><tr><td>nom de 
module</td><td>controle_continu</td><td>controle_final</td><td>Moyenne<
/td></tr>";
    while ($col = mysql_fetch_row($R6)) {
        $a = $col[0];
        $b = $col[1];
        $c = $col[2];
        $d = $col[3];
        echo "<tr> <td>$a</td><td>$b</td><td>$c</td><td>$d</td></tr>";
    }
    echo "</table>";
    ?>
</body>

</html>