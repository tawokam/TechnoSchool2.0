<?php
require('connect.php');
$ident = $_GET['ident'];
$de = "DELETE FROM tabsection WHERE id_section='$ident'";
if($del = $connec -> query($de)){
    
}

?>