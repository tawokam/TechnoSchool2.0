<?php
require('connect.php');
$idabsent = $_GET['idabsent'];
$mo = "UPDATE absence SET etat='justifier' WHERE id_absence='$idabsent'";
if($mod = $connec -> query($mo)){

}
?>