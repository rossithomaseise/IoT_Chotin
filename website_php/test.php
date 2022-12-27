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
