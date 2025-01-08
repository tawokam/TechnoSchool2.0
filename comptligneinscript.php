<?php
require('connect.php');
$session = $_GET['session'];
$se = "SELECT eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,inscription.montinscription,inscription.montverseinscription,inscription.resteinscription,inscription.redouble,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section,inscription.id_inscript,count(id_inscript) as nbres FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section where inscription.nom_session = '$session'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
     
      $nb = $sele['nbres'];
      if($nb >=1){
        echo $nb.' Élève(s) inscrit(s) pour la session.'.$session;      
    }else if($nb < 1){
   echo 'Aucun élève inscrit pour la session '.$session;
    }
    
    }}
?>