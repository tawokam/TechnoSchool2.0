<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Liste des élèves enregistrer.csv"');
require('connect.php');
echo '"'.utf8_decode('N°').'";"'.utf8_decode('Nom de l\'élève').'";"'.utf8_decode('Matricule').'";"'.utf8_decode('Date de naissance').'";"'.utf8_decode('Date d\'entré').'";"'.utf8_decode('Sxe').'";"'.utf8_decode('Nationalité').'";"'.utf8_decode('Adresse').'";"'.utf8_decode('Nom du tutteur').'";"'.utf8_decode('Téléphone du tutteur').'"';
  $n = 1;
  $se = "SELECT * FROM eleves";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
      
      echo "\n".'"'.utf8_decode($n).'";"'.utf8_decode($sele['nom_eleve']).'";"'.utf8_decode($sele['matricule']).'";"'.utf8_decode($sele['datenaiss_eleve']).'";"'.utf8_decode($sele['dateentre_eleve']).'";"'.utf8_decode($sele['sexe_eleve']).'";"'.utf8_decode($sele['nationalite_eleve']).'";"'.utf8_decode($sele['adresse_eleve']).'";"'.utf8_decode($sele['nomtitteur']).'";"'.utf8_decode($sele['telephonetitteur']).'"';
    $n++;
    }
  }
  ?>
