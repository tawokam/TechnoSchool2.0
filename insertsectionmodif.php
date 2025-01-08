<?php
require('connect.php');
$ident = $_POST['ident'];
$nomsectionmodif = $_POST['nomsectionmodif'];
$mo = "UPDATE tabsection SET nom_section='$nomsectionmodif' where id_section='$ident'";
if($mod = $connec -> query($mo)){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Modification effectuée avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';      

}

?>