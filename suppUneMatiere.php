<?php
require('connect.php');
$ident =$_GET['ident'];
$su = "DELETE FROM matieres where id_matiere='$ident'";
if($sup = $connec -> query($su)){}