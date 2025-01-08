<?php
require('connect.php');
$ident = $_POST['ident'];
$nomsessionmodif = $_POST['nomsessionmodif'];
$mo = "UPDATE tabsession SET nom_session='$nomsessionmodif' where id_session='$ident'";
if($mod = $connec -> query($mo)){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Modification effectuée avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';      

}

?>