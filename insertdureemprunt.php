<?php
require('connect.php');
$dureemprunt = $_POST['dureemprunt'];
$se = "SELECT *,count(id_duree) as nbre FROM dureemprunt";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        $nbre = $sele['nbre'];
        if($nbre < 1){
            $in = "INSERT INTO dureemprunt VALUES('','$dureemprunt')";
            if($ins = $connec -> query($in)){ 
                echo '<div class="alert alert-success bg-success text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
                La durée d\'emprunt a été enregistrée avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }else if($nbre >= 1){
            echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
            La durée d\'emprunt a déjà été enregistrée<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
}


?>
