<?php
require('connect.php');
$matricule = $_POST['matricule'];
$ident = $_POST['ident'];
$classe = $_POST['classe'];
$section = $_POST['section'];
$session = $_POST['session'];

if($section == ''){
    if($classe == ''){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Veuillez selectionnez la section et la nouvelle classe de l\'élève s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if($classe != ''){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Veuillez selectionnez la section de l\'élève s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}else if($section != ''){
    if($classe == ''){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Veuillez selectionnez la classe de l\'élève s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if($classe != ''){
        $montinscript = 0;
        $montverse = 0;
        //recuperation du montant d'inscription pour la nouvelle classe
     $nc = "SELECT * FROM classe where id_classe='$classe'";
     if($nec = $connec -> query($nc)){
        while($newc = $nec -> fetch()){
            $montinscript = $newc['montinscription'];
        }
     }
        //recuperation du montant versé pour inscription dans l'ancien classe
      $ni = "SELECT * FROM inscription where id_inscript='$ident'";
      if($nei = $connec -> query($ni)){
         while($newi = $nei -> fetch()){
            $montverse = $newi['montverseinscription'];
         }
      }
      $diff = $montinscript - $montverse;
      if($diff == 0){
        $insc = "UPDATE inscription SET montinscription='$montinscript', resteinscription='$diff', etatinscription='solde',id_section='$section', id_classe='$classe' where id_inscript = '$ident'";
        if($inscr = $connec -> query($insc)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Modification éffectuer avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
      }else if($diff >= 1){
        $insc = "UPDATE inscription SET montinscription='$montinscript', resteinscription='$diff', etatinscription='non solde',id_section='$section', id_classe='$classe' where id_inscript = '$ident'";
        if($inscr = $connec -> query($insc)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Modification éffectuer avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
      }else if($diff < 0){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Le montant versé par l\'élève pour l\'inscription est supperieur au montant de l\'inscription de sa nouvelle classe. Veillez supprimer quelque versement et réessayer <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    }
}
?>