<?php
require('connect.php');
$ident =$_GET['ident'];
$su = "DELETE FROM eleves where id_eleve='$ident'";
if($sup = $connec -> query($su)){}