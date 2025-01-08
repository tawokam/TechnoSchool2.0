<?php
require('connect.php');
$ident = $_GET['ident'];
$matricule = $_GET['matricule'];
$session = $_GET['session'];

$de = "DELETE FROM caisseinscription where nom_session='$session' AND matricule='$matricule'";
if($del = $connec -> query($de)){
    $su = "DELETE FROM inscription where id_inscript='$ident'";
    if($sup = $connec -> query($su)){

    }
}
?>