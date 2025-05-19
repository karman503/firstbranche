<?php
if (isset($_GET['ok'])) {
    $nombre1 = $_GET['nombre1'];
    $nombre2 = $_GET['nombre2'];
    $resultat = $nombre1 + $nombre2;
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resultat</title>
</head>

<body>
    <h1>Resultat</h1>
    <p>
        <?php
        echo $nombre1 . "+" . $nombre2 . "=" . $resultat;
        ?>
    </p>
    <p><a href="page7.php">Autre calcul</a></p>
</body>

</html>