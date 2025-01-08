<?php
require('connect.php');
$ident = $_GET['ident'];
$se = "DELETE FROM tabsession where id_session='$ident'";
if($sel = $connec -> query($se)){}

?>