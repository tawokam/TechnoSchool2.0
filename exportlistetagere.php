<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Liste des étagères.csv"');
require('connect.php');
echo '"'.utf8_decode('N°').'";"'.utf8_decode('Nom de l\'étagère').'"';
  $n = 1;
  $se = "SELECT * FROM etageres ";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
      
      echo "\n".'"'.utf8_decode($n).'";"'.utf8_decode($sele['nom_etagere']).'"';
    $n++;
    }
  }
  ?>
