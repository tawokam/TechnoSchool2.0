<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Liste des fonctions.csv"');
require('connect.php');
echo '"'.utf8_decode('N°').'";"'.utf8_decode('Nom de la fonction').'";"'.utf8_decode('Inscription').'";"'.utf8_decode('Scolarité').'";"'.utf8_decode('Gestion enseignents').'";"'.utf8_decode('Discipline des élèves').'";"'.utf8_decode('Enseignement').'";"'.utf8_decode('Autres').'"';
  $n = 1;
  $se = "SELECT * FROM fonction ";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
      
      echo "\n".'"'.utf8_decode($n).'";"'.utf8_decode($sele['nom_fonction']).'";"'.utf8_decode($sele['inscription']).'";"'.utf8_decode($sele['scolarite']).'";"'.utf8_decode($sele['gest_enseignent']).'";"'.utf8_decode($sele['discipline_eleves']).'";"'.utf8_decode($sele['enseignement']).'";"'.utf8_decode($sele['autres']).'"';
    $n++;
    }
  }
  ?>
