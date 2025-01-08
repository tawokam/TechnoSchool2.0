<?php
require('connect.php');
$matricule = $_GET['matricule'];
$idconseil = $_GET['idconseil'];
$su = "DELETE FROM traduitconseil WHERE matricule='$matricule' AND id_conseil='$idconseil'";
if($sup = $connec -> query($su)){}
?>