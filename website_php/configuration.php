<!DOCTYPE html>

<html lang="en">

<head>
  <title>Logement Eco-Responsable : Configuration</title>
  <?php include('includes/header.php'); ?>
</head>

<body class="fixed-sn mdb-skin-custom">
  
  <?php include('includes/navigation.php'); ?>

<main class="">

  <?php include('includes/main_style.php'); ?>  

  </br>

  <section id="configuration">

  <h4>Vous trouverez ici toutes les informations concernant votre logement </h4>
  </br>

  <?php

  $db = new SQLite3('../logement.db');
  $stm = $db->prepare('SELECT * FROM Logement');
  $res = $stm->execute();

  $row = $res->fetchArray() 
  ?>
  <p> <?php echo "Maison n° $row[0] : numéro de téléphone = $row[1], IP = $row[2], date d'insertion du logement = $row[3]"; ?> </p>
  <?php
  $stm = $db->prepare('SELECT * FROM Adresse WHERE id = ?');
  $stm->bindValue(1,$row[4],SQLITE3_INTEGER);
  $res = $stm->execute();
  $row = $res->fetchArray();

  $stm = $db->prepare('SELECT * FROM Ville WHERE Code = ?');
  $stm->bindValue(1,$row[4],SQLITE3_INTEGER);
  $res = $stm->execute();
  $row_Ville = $res->fetchArray();

  ?>
  <p> <?php echo "Adresse : $row[1] $row[2] $row[3] $row[4] $row_Ville[1]"; ?> </p>

  <?php
  $stm = $db->prepare('SELECT * FROM Piece');
  $res = $stm->execute();
  while ($row = $res->fetchArray()): ?>
    <p> <?php echo "Piece n° $row[0] ( $row[1] ) : coordonnées = [$row[2],$row[3],$row[4]]"; ?> </p>
  <?php endwhile; ?>


  <?php

    if(isset($_POST['button1']) && isset($_POST['subject']) && isset($_POST['subject0']) ){
      $db = new SQLite3('../logement.db');
      $stm = $db->prepare('SELECT Port_serveur FROM Capteur ORDER BY id DESC');
      $res = $stm->execute();
      $row = $res->fetchArray();
      $port = $row[0] + 1;
      $id_capteur = 0;
      $id_piece = 0;
      if($_POST['subject0'] == "capteur_temperature"){
        $id_capteur = 1;
      }
      if($_POST['subject0'] == "capteur_poids"){
        $id_capteur = 4;
      }
      if($_POST['subject0'] == "capteur_humidite"){
        $id_capteur = 2;
      }
      if($_POST['subject0'] == "capteur_ensoleillement"){
        $id_capteur = 3;
      }

      if($_POST['subject'] == "salle_de_bain"){
        $id_piece = 1;
      }
      if($_POST['subject'] == "toilettes"){
        $id_piece = 2;
      }
      if($_POST['subject'] == "cuisine"){
        $id_piece = 3;
      }
      if($_POST['subject'] == "salon"){
        $id_piece = 4;
      }

      $stm = $db->prepare('INSERT INTO Capteur (Ref_Commerciale, Port_Serveur, Id_Type) VALUES ("XXXXXXXXXX", ?, ?)');
      $stm->bindValue(1,$port,SQLITE3_INTEGER);
      $stm->bindValue(2,$id_capteur,SQLITE3_INTEGER);
      $res = $stm->execute();

      $stm = $db->prepare('INSERT INTO Piece_Possede_Capteur (id_piece, id_capteur) VALUES (?, ?)');
      $stm->bindValue(1,$id_piece,SQLITE3_INTEGER);
      $stm->bindValue(2,$id_capteur,SQLITE3_INTEGER);
      $res = $stm->execute();      
    }
  ?>

  <h4>Configurez les capteurs de votre maison </h4>

  <form method="post"> 
    <label>Veuillez choisir le type de capteur</label>
    </br>
    <input type = "radio" name = "subject0" value = "capteur_temperature"> Capteur Température
    <input type = "radio" name = "subject0" value = "capteur_poids"> Capteur Poids
    <input type = "radio" name = "subject0" value = "capteur_humidite"> Capteur Humidité
    <input type = "radio" name = "subject0" value = "capteur_ensoleillement"> Capteur Ensoleillement
    </br> </br>
    <label>Veuillez choisir la pièce</label>
    </br>
    <input type = "radio" name = "subject" value = "salle_de_bain"> Salle de bain
    <input type = "radio" name = "subject" value = "toilettes"> Toilettes 
    <input type = "radio" name = "subject" value = "cuisine"> Cuisine 
    <input type = "radio" name = "subject" value = "salon"> Salon
    </br> </br>
    <input type="submit" name="button1" value="Envoyer la requête"/>
  </form>
    
  </form>
</section>
</main>

<?php include('includes/footer_style.php'); ?>

</body>

</html>
