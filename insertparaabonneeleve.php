<?php
require('connect.php');
$choix = $_POST['choix'];
$tiers = $_POST['tiers'];
$montabon = 0;
if($choix == 'payant'){
    $montabon = $_POST['montabon'];
}
$se = "SELECT *,count(id_abonne) as nbreabonne FROM abonnement WHERE tiers='$tiers'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      $nbre = $sele['nbreabonne'];
      if($nbre < 1){
          $in = "INSERT INTO abonnement VALUES('','$tiers','$choix','$montabon')";
          if($ins = $connec -> query($in)){
            echo '<div class="alert alert-success bg-success alert-dismissible fade show text-light" role="alert" style="font-size:12px;">
            L\'Abonnement '; if($tiers == 'eleves'){ echo 'des élèves';}else if($tiers == 'personnel'){echo 'du personnel';} echo ' à la bibliothèque a été paramétré avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
          }
      }else if($nbre >= 1){
        echo '<div class="alert alert-danger bg-danger alert-dismissible fade show text-light" role="alert" style="font-size:12px;">
         L\'Abonnement '; if($tiers == 'eleves'){ echo 'des élèves';}else if($tiers == 'personnel'){echo 'du personnel';} echo ' à la bibliothèque a déjà été paramétré. Si vous souhaitez le modifier, cliquez sur le bouton abonnement, puis sur modifier et suivez la procédure. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
    }
}
?>