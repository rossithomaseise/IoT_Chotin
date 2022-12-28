<?php

$db = new SQLite3('../logement.db');

$stm = $db->prepare('SELECT * FROM Mesure ORDER BY id DESC LIMIT 10');
$res = $stm->execute();
while($row = $res->fetchArray()){
	echo "$row[0] $row[1] $row[2] </br>";
}

