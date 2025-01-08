<?php
require('connect.php');
$etagere = $_GET['etagere'];
$idetagere = $_GET['idetagere'];
$up = "UPDATE etageres SET nom_etagere='$etagere' where id_etagere='$idetagere'";
if($upd = $connec -> query(($up))){}
?>