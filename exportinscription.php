<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Liste des élèves inscript.csv"');
require('connect.php');
echo '"'.utf8_decode('N°').'";"'.utf8_decode('Matricule').'";"'.utf8_decode('Nom').'";"'.utf8_decode('Sexe').'";"'.utf8_decode('Section').'";"'.utf8_decode('Classe').'";"'.utf8_decode('Montant de l\'inscription').'";"'.utf8_decode('Montant versé').'";"'.utf8_decode('Reste').'";';
  $n = 1;
$session = $_GET['session'];
  $se = "SELECT eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,inscription.montinscription,inscription.montverseinscription,inscription.resteinscription,inscription.redouble,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section where inscription.nom_session = '$session'";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
      
      echo "\n".'"'.utf8_decode($n).'";"'.utf8_decode($sele['matricule']).'";"'.utf8_decode($sele['nom_eleve']).'";"'.utf8_decode($sele['sexe_eleve']).'";"'.utf8_decode($sele['nom_section']).'";"'.utf8_decode($sele['nom_classe']).'";"'.utf8_decode($sele['montinscription']).'";"'.utf8_decode($sele['montverseinscription']).'";"'.utf8_decode($sele['resteinscription']).'"';
    $n++;
    }
  }
  ?>
