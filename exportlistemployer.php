<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Liste des employés.csv"');
require('connect.php');
echo '"'.utf8_decode('N°').'";"'.utf8_decode('Nom de l\'employer').'";"'.utf8_decode('Téléphone 1').'";"'.utf8_decode('Téléphone 2').'";"'.utf8_decode('Sexe').'";"'.utf8_decode('Adresse mail').'";"'.utf8_decode('Quartier').'";"'.utf8_decode('Fonction').'";"'.utf8_decode('Date de naissance').'";"'.utf8_decode('Récruté en').'";"'.utf8_decode('Plus geand diplome').'";"'.utf8_decode('Spécialité').'";"'.utf8_decode('CV').'";"'.utf8_decode('Numéro d\'urgence').'";"'.utf8_decode('Salaire').'"';
  $n = 1;
  $se = "SELECT fonction.id_fonction,fonction.nom_fonction,employer.nom_employer,employer.telephone1_employer,employer.telephone2_employer,employer.sexe_employer,employer.adresseMail_employer,employer.quartier_employer,employer.id_fonction,employer.datenaiss_employer,employer.travaildepuis,employer.grandiplome,employer.specialitediplome,employer.cv_employer,employer.numerourgence,employer.salaireemployer FROM fonction inner join employer on fonction.id_fonction=employer.id_fonction";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
      
      echo "\n".'"'.utf8_decode($n).'";"'.utf8_decode($sele['nom_employer']).'";"'.utf8_decode($sele['telephone1_employer']).'";"'.utf8_decode($sele['telephone2_employer']).'";"'.utf8_decode($sele['sexe_employer']).'";"'.utf8_decode($sele['adresseMail_employer']).'";"'.utf8_decode($sele['quartier_employer']).'";"'.utf8_decode($sele['nom_fonction']).'";"'.utf8_decode($sele['datenaiss_employer']).'";"'.utf8_decode($sele['travaildepuis']).'";"'.utf8_decode($sele['grandiplome']).'";"'.utf8_decode($sele['specialitediplome']).'";"'.utf8_decode($sele['cv_employer']).'";"'.utf8_decode($sele['numerourgence']).'";"'.utf8_decode($sele['salaireemployer']).'"';
    $n++;
    }
  }
  ?>
