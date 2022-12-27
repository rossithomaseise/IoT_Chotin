<!DOCTYPE html>

<html lang="en">

<head>
  <title>Logement Eco-Responsable : Capteurs</title>
  <?php include('includes/header.php'); ?>
</head>

<body class="fixed-sn mdb-skin-custom">
  
  <?php include('includes/navigation.php'); ?>

<main class="">

  <?php include('includes/main_style.php'); ?>

</br>

<section id="capteurs">

<h4>Vous trouverez ici toutes les informations concernant les capteurs </h4>

<?php

$db = new SQLite3('../logement.db');

$stm = $db->prepare('SELECT * FROM Capteur');
$res = $stm->execute();



while ($row = $res->fetchArray()): ?>
  <?php
  // On récupère l'identifiant de la pièce associée au capteur
  $stm_Piece_Capteur = $db->prepare('SELECT id_piece FROM Piece_Possede_Capteur WHERE id_capteur = ?');
  $stm_Piece_Capteur->bindValue(1,$row[0],SQLITE3_INTEGER);
  $res_Piece_Capteur = $stm_Piece_Capteur->execute();
  $row_Piece_Capteur = $res_Piece_Capteur->fetchArray();
  # on récupère le nom de la pièce associée au capteur
  $stm_Piece = $db->prepare('SELECT Nom FROM Piece WHERE id = ?');
  $stm_Piece->bindValue(1,$row_Piece_Capteur[0]);
  $res_Piece = $stm_Piece->execute();
  $row_Piece = $res_Piece->fetchArray();
  ?>

  <p> <?php echo "Capteur n° {$row[0]} (type {$row[4]}, pièce $row_Piece[0]) : référence = {$row[1]}, port serveur = {$row[2]} et date insertion = {$row[3]}\n"; ?> </p>
<?php endwhile; ?>

<h4>Type de capteurs : </h4>
<?php
$stm = $db->prepare('SELECT * FROM Type_Capteur');
$res = $stm->execute();

while ($row = $res->fetchArray()): ?>
  <p> <?php echo "$row[0] : Unité = $row[1] et plage = [$row[2],$row[3]]"; ?> </p>
<?php endwhile; ?>


</section>

</main>

<?php include('includes/footer_style.php'); ?>

</body>

</html>
