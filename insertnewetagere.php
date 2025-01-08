<?php
require('connect.php');
$nometagere = $_POST['nometagere'];

$se = "SELECT *,count(id_etagere) as nbre FROM etageres WHERE nom_etagere='$nometagere'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
       $nbre = $sele['nbre'];
       if($nbre < 1){
         $in = "INSERT INTO etageres values('','$nometagere')";
         if($ins = $connec -> query($in)){
            echo '<div class="alert alert-success bg-success text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
            L\'étagère a été créée avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; 
         }
       }else if($nbre >= 1){
        echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
        Cet étagère a déjà été créée<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
       }
    }
}

?>