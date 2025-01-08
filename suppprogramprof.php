<?php
require('connect.php');
$identprogram = $_POST['identprogram'];


$de = "DELETE FROM programme WHERE id_programme = '$identprogram'";
if($del = $connec -> query($de)){}

?>