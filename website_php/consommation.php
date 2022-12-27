<!-- https://developers.google.com/chart/interactive/docs/gallery/columnchart?hl=fr -->
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Logement Eco-Responsable : Consommation</title>
  <?php include('includes/header.php'); ?>

  <?php

  $db = new SQLite3('../logement.db');
  $stm = $db->prepare('SELECT * FROM Facture');
  $res = $stm->execute();

  $consommation_internet = array();
  $consommation_electricite = array();
  $consommation_gaz = array();
  $consommation_eau = array();
  $index = 0;

  while ($row = $res->fetchArray()){
    if($index == 0){
      $index = $index + 1;
      $consommation_internet[] = $row[4];
    }
    elseif($index == 1){
      $index = $index + 1;
      $consommation_electricite[] = $row[4];
    }
    elseif($index == 2){
      $index = $index + 1;
      $consommation_gaz[] = $row[4];
    }
    elseif($index == 3){
      $index = 0;
      $consommation_eau[] = $row[4];
    }
  }
  ?>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    var consommation_internet = <?php echo json_encode($consommation_internet, JSON_HEX_TAG); ?>;
    var consommation_electricite = <?php echo json_encode($consommation_electricite, JSON_HEX_TAG); ?>;
    var consommation_gaz = <?php echo json_encode($consommation_gaz, JSON_HEX_TAG); ?>;
    var consommation_eau = <?php echo json_encode($consommation_eau, JSON_HEX_TAG); ?>;

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Mois', 'Internet (GB)', 'Electricité (kWh)', 'Gaz (kWh)','Eau (l)'],
        ['Janvier', consommation_internet[0], consommation_electricite[0], consommation_gaz[0],consommation_eau[0]],
        ['Fevrier', consommation_internet[1], consommation_electricite[1], consommation_gaz[1],consommation_eau[1]],
        ['Mars', consommation_internet[2], consommation_electricite[2], consommation_gaz[2],consommation_eau[2]],
        ['Avril', consommation_internet[3], consommation_electricite[3], consommation_gaz[3],consommation_eau[3]],
        ['Mai', consommation_internet[4], consommation_electricite[4], consommation_gaz[4],consommation_eau[4]],
        ['Juin', consommation_internet[5], consommation_electricite[5], consommation_gaz[5],consommation_eau[5]],
        ['Juillet', consommation_internet[6], consommation_electricite[6], consommation_gaz[6],consommation_eau[6]],
        ['Août', consommation_internet[7], consommation_electricite[7], consommation_gaz[7],consommation_eau[7]],
        ['Septembre', consommation_internet[8], consommation_electricite[8], consommation_gaz[8],consommation_eau[8]],
        ['Octobre', consommation_internet[9], consommation_electricite[9], consommation_gaz[9],consommation_eau[9]],
        ['Novembre', consommation_internet[10], consommation_electricite[10], consommation_gaz[10],consommation_eau[10]],
        ['Décembre', consommation_internet[11], consommation_electricite[11], consommation_gaz[11],consommation_eau[11]]
      ]);
      var options = {
        chart: {
          title: 'Consommation du logement sur l\'année 2022',
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
