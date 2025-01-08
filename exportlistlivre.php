<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Liste des livres de la bibliotheque.csv"');
require('connect.php');
echo '"'.utf8_decode('N°').'";"'.utf8_decode('Nom du livre').'";"'.utf8_decode('Type de livre').'";"'.utf8_decode('Etagère').'";"'.utf8_decode('Nombre de livre').'";"'.utf8_decode('Nombre emprunté').'";"'.utf8_decode('Nombre en bibliothèque').'"';
  $n = 1;
  $se = "SELECT livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
        $emprunte = $sele['nbrelivre'] - $sele['stock'];
      echo "\n".'"'.utf8_decode($n).'";"'.utf8_decode($sele['nom_livre']).'";"'.utf8_decode($sele['nom_typelivre']).'";"'.utf8_decode($sele['nom_etagere']).'";"'.utf8_decode($sele['nbrelivre']).'";"'.utf8_decode($emprunte).'";"'.utf8_decode($sele['stock']).'"';
    $n++;
    }
  }
  ?>
