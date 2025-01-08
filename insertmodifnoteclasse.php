<?php
require('connect.php');
$coefnote = $_POST['coefinsertmodif'];
$nbreligneeleve = $_POST['nbrelignmodif'];
$session = $_POST['session'];
$classe = $_POST['classe'];
$matierenotmodif = $_POST['matierenotmodif'];
$sequencenotmodif = $_POST['sequencenotmodif'];
$date = date('Y/m/d');
if($coefnote == ''){
    echo '<div class="alert alert-danger bg-danger alert-dismissible fade show text-light" role="alert" style="font-size:12px;">
      Veuillez entrez le coéficient s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else{


        $sivali = 1;
          // Recuperation des notes de chaque eleve et insertion dans la base de donnees
        for($not = 1; $not < $nbreligneeleve; $not++){
            $notes = 'note'.$not;
            $notes = $_POST['notes'.$not];
            $newnote = $notes;
            $newmatri = $_POST['matricule'.$not];;
            $in = "UPDATE evaluation SET coef='$coefnote', note='$newnote' WHERE matricule='$newmatri' AND id_matiere='$matierenotmodif' AND id_classe='$classe' AND sequence='$sequencenotmodif'";
            if($ins = $connec -> query($in)){
             $sivali = 2;
            }
        }
        if($sivali == 2){
            echo '<div class="alert alert-success bg-success text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
            Notes et/ou coéficient modifier avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }else if($sivali == 1){
            echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
            Un problème est survenu. Veuillez réessayer s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

    }

?>