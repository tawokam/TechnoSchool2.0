<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Liste des matières.csv"');
require('connect.php');
echo '"'.utf8_decode('N°').'";"'.utf8_decode('Nom de la matière').'";"'.utf8_decode('Type de matière').'"';
  $n = 1;
  $se = "SELECT typematiere.id_typmat,typematiere.nom_typmat,matieres.id_typmat,matieres.nom_matiere,matieres.id_matiere FROM matieres inner join typematiere on matieres.id_typmat=typematiere.id_typmat ";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
      
      echo "\n".'"'.utf8_decode($n).'";"'.utf8_decode($sele['nom_matiere']).'";"'.utf8_decode($sele['nom_typmat']).'"';
    $n++;
    }
  }
  ?>
