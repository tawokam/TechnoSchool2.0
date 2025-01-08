<?php
require('connect.php');
$ident = $_GET['ident'];
$de = "DELETE FROM fonction WHERE id_fonction = '$ident'";
if($del = $connec->query($de)){
    
}

?>