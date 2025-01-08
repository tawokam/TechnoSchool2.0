<?php
require('connect.php');
$ident = $_GET['ident'];

$de = "DELETE FROM jours where id_jour='$ident'";
if($del = $connec -> query($de))
{

}

?>