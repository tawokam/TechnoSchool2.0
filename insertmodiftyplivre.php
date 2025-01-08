<?php
require('connect.php');
$idtyp = $_POST['idtyplivre'];
$nomtypmodif = $_POST['nomtypmodif'];
$mo = "UPDATE typelivre SET nom_typelivre='$nomtypmodif' WHERE id_typelivre='$idtyp'";
if($mod = $connec -> query($mo)){
    echo '<div class="alert alert-success bg-success text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
    Modification effectuée avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

?>