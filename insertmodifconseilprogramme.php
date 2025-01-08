<?php
require('connect.php');
$lieu = $_POST['lieu'];
$date = $_POST['date'];
$heure = $_POST['heure'];
$idconseil = $_POST['idconseil'];
$up = "UPDATE conseil SET lieu='$lieu',date_conseil='$date',heure_conseil='$heure' WHERE id_conseil='$idconseil'";
if($upd = $connec -> query($up)){}
?>