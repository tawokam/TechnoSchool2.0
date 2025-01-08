<?php
require('connect.php');
$ident = $_POST['ident'];
$montverse = $_POST['montverse'];
$matricule = $_POST['matricule'];
$session = $_POST['session'];
$montotal = 0;
$montscolarite = 0;
//somme des versement pour la session encour
$s = "SELECT *,sum(montverse) as montottal FROM caissescolarite where nom_session='$session' AND matricule='$matricule' AND id_caissescolarite <> '$ident'";
if($sr = $connec -> query($s)){
    while($sri = $sr -> fetch()){
        $montotal = $sri['montottal'];
    }
}
$se = "SELECT * FROM scolarite where nom_session='$session' AND matricule='$matricule'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        $montscolarite = $sele['montscolarite'];
    }
}
$somverse = $montotal + $montverse;
$rest = $montscolarite - $somverse;
    if($rest == 0){
        $mo = "UPDATE caissescolarite SET montverse='$montverse' WHERE id_caissescolarite='$ident'";
        if($mod = $connec -> query($mo)){
            $mosc = "UPDATE scolarite SET montverse='$somverse', restescolarite='$rest', etatscolarite='solde' where matricule='$matricule' AND nom_session='$session'";
            if($modsc = $connec -> query($mosc)){}
        }
    }else if($rest > 0){
        $mo = "UPDATE caissescolarite SET montverse='$montverse' WHERE id_caissescolarite='$ident'";
        if($mod = $connec -> query($mo)){
        $mosc = "UPDATE scolarite SET montverse='$somverse', restescolarite='$rest', etatscolarite='non solde' where matricule='$matricule' AND nom_session='$session'";
        if($modsc = $connec -> query($mosc)){}
        }
    }else if($rest < 0){
        
    }

?>