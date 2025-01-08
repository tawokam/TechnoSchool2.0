<?php
require('connect.php');
$ident =$_GET['ident'];
$su = "DELETE FROM classe where id_classe='$ident'";
if($sup = $connec -> query($su)){}