<?php
require('connect.php');
$ident = $_GET['ident'];
$de = "DELETE FROM employer WHERE id_employer='$ident'";
if($del = $connec->query($de)){
    
}