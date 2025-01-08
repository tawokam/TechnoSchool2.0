<?php
require('connect.php');
$nomtype = $_POST['nomtype'];
$se = "SELECT *,count(id_typelivre) as nbre FROM typelivre WHERE nom_typelivre='$nomtype'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
   $nbre = $sele['nbre'];
   if($nbre < 1){
     $in = "INSERT INTO typelivre VALUES('','$nomtype')";
     if($ins = $connec -> query($in)){
        echo '<div class="alert alert-success bg-success alert-dismissible fade show text-light" role="alert" style="font-size:14px">
        Le type de livre a été enregistré avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
     }
   }else if($nbre >= 1){
    echo '<div class="alert alert-danger bg-danger alert-dismissible fade show text-light" role="alert" style="font-size:14px">
    Ce type de livre a déjà été créé <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
   }
    }
}

?>