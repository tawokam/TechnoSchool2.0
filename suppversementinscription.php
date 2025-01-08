<?php
require('connect.php');
$matricule = $_POST['matricule'];
$ident = $_POST['ident'];
$session = $_POST['session'];
$montota = 0;

$mo = "DELETE FROM caisseinscription where id_caisseinscript='$ident'";
if($mod = $connec -> query($mo)){
    $se = "SELECT * FROM caisseinscription where nom_session='$session' AND matricule='$matricule'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
            $montota += $sele['montverse'];
        }
    }
}
$in = "SELECT * FROM inscription where nom_session='$session' AND matricule='$matricule'";
if($ins = $connec -> query($in)){
    while($insc = $ins -> fetch()){
        $montav = $insc['montinscription'];
       $rest = $montav - $montota;
       $mis = "UPDATE inscription SET montverseinscription='$montota', resteinscription='$rest' where matricule='$matricule' AND nom_session='$session'";
       if($misa = $connec -> query($mis)){

       }
    }
}
?>