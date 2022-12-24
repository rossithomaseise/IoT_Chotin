<?php

$db = new SQLite3('../logement.db');

$stm = $db->prepare('SELECT * FROM Facture');
$res = $stm->execute();

while ($row = $res->fetchArray()) {
    echo "$row[0] $row[1] $row[2] $row[3] $row[4]<br>";
}
