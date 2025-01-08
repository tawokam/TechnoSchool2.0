<?php
require('connect.php');
$ident = $_GET['ident'];
$de = "DELETE FROM typematiere WHERE id_typmat='$ident'";
if($del = $connec -> query($de)){
    
}

?>