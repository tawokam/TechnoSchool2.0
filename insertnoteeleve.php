<?php

require('connect.php');
$connec -> beginTransaction();

try {
    
$seqnote = $_POST['seqnote'];
$matierenote = $_POST['matierenote'];
$coefnote = $_POST['coefnote'];
$nbreligneeleve = $_POST['nbreligneeleve'];
$session = $_POST['session'];
$ident = $_POST['ident'];
$date = date('Y/m/d');

if($coefnote == ''){
    echo '<div class="alert alert-danger bg-danger alert-dismissible fade show text-light" role="alert" style="font-size:12px;">
     Veuillez entrer le coefficient, s\'il vous plaît.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else if($matierenote == ''){
    echo '<div class="alert alert-danger bg-danger alert-dismissible fade show text-light" role="alert" style="font-size:12px;">
    Aucune matière n\'a été programmée dans cette classe.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}else{

 if($session == '')
{
   // recupere la session active
    $ss = "SELECT * FROM tabsession WHERE statut='Activer'";
    if($sess = $connec -> query($ss)){
        if($sess -> rowCount() == 0){
            echo 'Problème de configuration. La session en cours n\'a pas été configurée.';
        }else{
            while($sessions = $sess -> fetch()){
                $session = $sessions['nom_session'];
            }
        }

    }
}
   
// Verifie si les eleves de cette classe on deja des notes a cet matiere et dans cette sequence
$se = "SELECT *,count(id_evaluation) as nbreeval FROM evaluation WHERE id_classe='$ident' AND sequence='$seqnote' AND id_matiere='$matierenote' AND session='$session'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
       $nbreeval = $sele['nbreeval'];
       if($nbreeval < 1){
        $sivali = 1;
          // Recuperation des notes de chaque eleve et insertion dans la base de donnees
        for($not = 1; $not < $nbreligneeleve; $not++){
            $notes = 'note'.$not;
            $notes = $_POST['notes'.$not];
            $newnote = $notes;
            $newmatri = $_POST['matricule'.$not];;
            $in = "INSERT INTO evaluation VALUES ('','$newmatri','$ident','$seqnote','$newnote','$matierenote','$coefnote','$date','$session')";
            if($ins = $connec -> exec($in)){
             $sivali = 2;
            }
        }
        if($sivali == 2){
            echo '<div class="alert alert-success bg-success text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
            Notes enregistrées avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
       }else if($nbreeval >= 1){
        echo '<div class="alert alert-danger text-light bg-danger alert-dismissible fade show" role="alert" style="font-size:12px;">
        Les notes ont déjà été enregistrées.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
       }
    }
}
}
$connec -> commit();
} catch (Exception $ex) {
    $connec -> rollback();
    echo '<div class="alert alert-danger text-light bg-danger alert-dismissible fade show" role="alert" style="font-size:12px;">
        Une erreur est survenue. veuillez réesayer svp<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

?>