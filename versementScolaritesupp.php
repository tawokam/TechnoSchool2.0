<?php
require('connect.php');
$matricule = $_POST['matricule'];
$ident = $_POST['ident'];
$session = $_POST['session'];
$s = "DELETE FROM caissescolarite where nom_session='$session' AND matricule='$matricule'";
if($su = $connec -> query($s)){
    $ssc = "DELETE FROM scolarite where id_scolarite='$ident' AND matricule='$matricule' AND nom_session='$session'";
    if($scol = $connec -> query($ssc)){}

}


?>