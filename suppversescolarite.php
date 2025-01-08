<?php
require('connect.php');
$ident = $_POST['ident'];
$matricule = $_POST['matricule'];
$session = $_POST['session'];

$somont = 0;
$montscol = 0;
$de = "DELETE FROM caissescolarite where id_caissescolarite='$ident'";
if($del = $connec -> query($de)){
  $s = "SELECT *,sum(montverse) as newmontant FROM caissescolarite where nom_session='$session' AND matricule='$matricule'";
   if($so = $connec -> query($s)){
    while($sos = $so -> fetch()){
        $somont = $sos['newmontant'];
    }
   }
  $se = "SELECT * FROM scolarite where nom_session='$session' AND matricule='$matricule'";
   if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        $montscol = $sele['montscolarite'];
    }
   }
   $rest = $montscol - $somont;
   if($rest == 0){
    $mo = "UPDATE scolarite SET montverse='$somont', restescolarite='$rest',etatscolarite='solde' where nom_session='$session' AND matricule='$matricule'";
    if($mod = $connec -> query($mo)){}
   }else if($rest > 0){
    $mo = "UPDATE scolarite SET montverse='$somont', restescolarite='$rest',etatscolarite='non solde' where nom_session='$session' AND matricule='$matricule'";
    if($mod = $connec -> query($mo)){}    
   }else if($rest < 0){
    echo 'Code source erroné';
   }

}