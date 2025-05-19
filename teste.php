<!DOCTYPE >
3 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
4 <head>
5 < title > <?php echo ’Premiers pas en PHP’; ?> </title>
6 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
7 </head>
8 <body>
9 <h1> Mes premiers pas en PHP </h1>
10 <?php $temps=2; echo ’<p> Je débute depuis ’ ; echo $temps; echo ’ heures... </p>’; ?>
11 <p> Mais cela a l’air intéressant <?php echo ’!’ ?> </p>
12 <?php echo ’
13 <h2> Vive le PHP </h2>
14 <p> Les pages vont pouvoir être dynamiques! </p>
15 ’; ?>
16 <p> Encore quelques paragraphes </p>
17 echo ’<p> Avant dernier paragraphe </p>’;
18 <p> Voilà, c’est terminé! </p>
19 </body>
20 </html>