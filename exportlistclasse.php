<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Liste des classes.csv"');
require('connect.php');
echo '"'.utf8_decode('N°').'";"'.utf8_decode('Nom de la classe').'";"'.utf8_decode('Montant scolarité').'";"'.utf8_decode('Montant inscription').'";"'.utf8_decode('section').'"';
  $n = 1;
  $se = "SELECT classe.id_section,classe.nom_classe,classe.montscolarite,classe.montinscription,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section = tabsection.id_section";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
      
      echo "\n".'"'.utf8_decode($n).'";"'.utf8_decode($sele['nom_classe']).'";"'.utf8_decode($sele['montscolarite']).'";"'.utf8_decode($sele['montinscription']).'";"'.utf8_decode($sele['nom_section']).'"';
    $n++;
    }
  }
  ?>
