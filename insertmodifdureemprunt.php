<?php
require('connect.php');
$dureemprunt = $_POST['dureemprunt'];
$mo = "UPDATE dureemprunt SET duree_emprunt='$dureemprunt'";
if($mod = $connec -> query($mo)){
    echo '<div class="alert alert-success bg-success alert-dismissible fade show text-light" role="alert" style="font-size:12px;">
    La durée d\'emprunt a été modifié avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>