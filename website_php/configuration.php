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

  <p>Page Configuration </p>

  <?php

    if(isset($_POST['button1'])){
      echo "seeeeeeeeeeex";
    }
    if(isset($_POST['button2'])){
      echo "naaaaaaaaaaaaaaaan";
    }
  ?>
  <form method="post">
    <input type="submit" name="button1" value="Ajouter un Capteur Température"/>
    <input type="submit" name="button2" value="Ajouter un Capteur Poids"/>
  </form>

</main>

<?php include('includes/footer_style.php'); ?>

</body>

</html>
