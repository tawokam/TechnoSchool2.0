<?php
require('connect.php');
$heurdebutperiode = $_POST['heurdebutperiode'];
$heurfinperiode = $_POST['heurfinperiode'];
$typeperiode = $_POST['typeperiode'];
$se = "SELECT *,count(id_periode) as nbre FROM periode where heuredebut='$heurdebutperiode' AND heurefin='$heurfinperiode'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
     $nbre = $sele['nbre'];
     if($nbre >= 1){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Cette période a déjà été enregistrée.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
     }else if($nbre < 1){
        if($typeperiode == 'cours'){
        $in = "INSERT INTO periode values('','$heurdebutperiode','$heurfinperiode','$typeperiode')";
        if($ins = $connec -> exec($in)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Période enregistrée avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; 
        }
    }else if($typeperiode == 'pause'){
        $in = "INSERT INTO periode values('','$heurdebutperiode','$heurfinperiode','$typeperiode')";
        if($ins = $connec -> exec($in)){
            $in2 = "INSERT INTO programme values('','','1000000','','','$heurdebutperiode','$heurfinperiode','','')";
            if($ins2 = $connec -> exec($in2)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Période enregistrée avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; 
            }
        }
    }
     }
    }
}
?>