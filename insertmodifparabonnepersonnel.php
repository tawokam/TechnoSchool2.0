<?php
require('connect.php');
$choixmodif = $_POST['choixmodif'];
$montmodif = 0;
if($choixmodif == 'payant'){
    $montmodif = $_POST['montmodif'];
}
$mo = "UPDATE abonnement SET typeabonne='$choixmodif', montabonne='$montmodif' WHERE tiers='personnel'";
if($mod = $connec -> query($mo)){
    echo '<div class="alert alert-success bg-success text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
    Paramètre d\'abonnement modifier avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>