<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Liste des types de matière.csv"');
require('connect.php');
echo '"'.utf8_decode('N°').'";"'.utf8_decode('Nom du type de matière').'"';
  $n = 1;
  $se = "SELECT * FROM typematiere ";
  if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      
      echo "\n".'"'.utf8_decode($n).'";"'.utf8_decode($sele['nom_typmat']).'"';
    $n++;
    }
  }
  ?>
