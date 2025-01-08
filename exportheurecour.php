<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Liste des périodes.csv"');
require('connect.php');
echo '"'.utf8_decode('N°').'";"'.utf8_decode('Heure de debut').'";"'.utf8_decode('Heure de fin').'";"'.utf8_decode('Type de période').'"';
  $n = 1;
  $se = "SELECT * FROM periode";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
      
      echo "\n".'"'.utf8_decode($n).'";"'.utf8_decode($sele['heuredebut']).'";"'.utf8_decode($sele['heurefin']).'";"'.utf8_decode($sele['typeperiode']).'"';
    $n++;
    }
  }
  ?>
