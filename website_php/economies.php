<!-- https://developers.google.com/chart/interactive/docs/gallery/columnchart?hl=fr -->
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Logement Eco-Responsable : Economies</title>
  <?php include('includes/header.php'); ?>

  <?php

  $db = new SQLite3('../logement.db');
  $stm = $db->prepare('SELECT * FROM Facture');
  $res = $stm->execute();

  $montant_internet = array();
  $montant_electricite = array();
  $montant_gaz = array();
  $montant_eau = array();
  $index = 0;

  while ($row = $res->fetchArray()){
    if($index == 0){
      $index = $index + 1;
      $montant_internet[] = $row[3];
    }
    elseif($index == 1){
      $index = $index + 1;
      $montant_electricite[] = $row[3];
    }
    elseif($index == 2){
      $index = $index + 1;
      $montant_gaz[] = $row[3];
    }
    elseif($index == 3){
      $index = 0;
      $montant_eau[] = $row[3];
    }
  }
  ?>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    var montant_internet = <?php echo json_encode($montant_internet, JSON_HEX_TAG); ?>;
    var montant_electricite = <?php echo json_encode($montant_electricite, JSON_HEX_TAG); ?>;
    var montant_gaz = <?php echo json_encode($montant_gaz, JSON_HEX_TAG); ?>;
    var montant_eau = <?php echo json_encode($montant_eau, JSON_HEX_TAG); ?>;

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Mois', 'Internet', 'Electricité', 'Gaz','Eau'],
        ['Janvier', montant_internet[0], montant_electricite[0], montant_gaz[0],montant_eau[0]],
        ['Fevrier', montant_internet[1], montant_electricite[1], montant_gaz[1],montant_eau[1]],
        ['Mars', montant_internet[2], montant_electricite[2], montant_gaz[2],montant_eau[2]],
        ['Avril', montant_internet[3], montant_electricite[3], montant_gaz[3],montant_eau[3]],
        ['Mai', montant_internet[4], montant_electricite[4], montant_gaz[4],montant_eau[4]],
        ['Juin', montant_internet[5], montant_electricite[5], montant_gaz[5],montant_eau[5]],
        ['Juillet', montant_internet[6], montant_electricite[6], montant_gaz[6],montant_eau[6]],
        ['Août', montant_internet[7], montant_electricite[7], montant_gaz[7],montant_eau[7]],
        ['Septembre', montant_internet[8], montant_electricite[8], montant_gaz[8],montant_eau[8]],
        ['Octobre', montant_internet[9], montant_electricite[9], montant_gaz[9],montant_eau[9]],
        ['Novembre', montant_internet[10], montant_electricite[10], montant_gaz[10],montant_eau[10]],
        ['Décembre', montant_internet[11], montant_electricite[11], montant_gaz[11],montant_eau[11]]
      ]);
      var options = {
        chart: {
          title: 'Montant des factures du logement sur l\'année 2022',
        }
      };
      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>
</head>

<body class="fixed-sn mdb-skin-custom">
  <?php include('includes/navigation.php'); ?>

<main class="">

  <?php include('includes/main_style.php'); ?>  

  </br>

  <div  id="columnchart_material" alt="Max-width 100%" style="height: 500px;"></div>

</main>

<?php include('includes/footer_style.php'); ?>

</body>

</html>
