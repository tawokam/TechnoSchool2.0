<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Liste des jours de cours.csv"');
require('connect.php');
echo '"'.utf8_decode('N°').'";"'.utf8_decode('Nom du jour').'"';
  $n = 1;
  $se = "SELECT * FROM jours";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
      
      echo "\n".'"'.utf8_decode($n).'";"'.utf8_decode($sele['nom_jour']).'"';
    $n++;
    }
  }
  ?>
