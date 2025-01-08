<?php
require('connect.php');
$matricule = $_POST['matricule'];
$session = $_POST['session'];
$montverse = $_POST['montverse'];
$date = $_POST['date'];
$heure = $_POST['heure'];
if($montverse < 0 ){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Versement rejeté. Le montant versé est négatif.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else{
//verification de l'existence d'un versement precedent de l'élève pour la session encour
$se = "SELECT *,count(id_scolarite) as existe FROM scolarite where nom_session = '$session' AND matricule = '$matricule'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
     $verifi = $sele['existe'];
     $montantscol = $sele['montscolarite'];
     $avancescol = $sele['montverse'];
    if($verifi < 1){
        $monscol = 0;
        $re = "SELECT inscription.nom_session,inscription.matricule,inscription.id_classe,classe.id_classe,classe.montscolarite FROM inscription inner join classe on inscription.id_classe = classe.id_classe where inscription.nom_session='$session' AND inscription.matricule='$matricule'";
          if($rec = $connec -> query($re)){
            while($rect = $rec -> fetch()){
                $monscol = $rect['montscolarite'];
            }
          }
          $rest = $monscol - $montverse;
          if($rest == 0){
          $in = "INSERT INTO scolarite values('','$monscol','$montverse','$rest','$matricule','$session','solde')";
          if($ins = $connec -> exec($in)){
            $inca = "INSERT INTO caissescolarite values('','$montverse','$date','$heure','$matricule','$session')";
            if($incai = $connec -> exec($inca)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Versement enregistrer avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';  
            }
          }
          }else if($rest > 0){
            $in = "INSERT INTO scolarite values('','$monscol','$montverse','$rest','$matricule','$session','non solde')";
            if($ins = $connec -> exec($in)){
                $inca = "INSERT INTO caissescolarite values('','$montverse','$date','$heure','$matricule','$session')";
                if($incai = $connec -> exec($inca)){
                     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                     Versement enregistrer avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';  
                }
            }
          }else if($rest < 0){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">          
Le montant versé est supérieur au montant à verser. Versement rejeté.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
    }else if($verifi >=1){
        
        $newverse = $avancescol + $montverse;
        $newrest = $montantscol - $newverse;
        if($newrest == 0){
        $mo = "UPDATE scolarite SET montverse='$newverse', restescolarite='$newrest', etatscolarite='solde' where nom_session='$session' AND matricule='$matricule'";
        if($mod = $connec -> query($mo)){
            $inca = "INSERT INTO caissescolarite values('','$montverse','$date','$heure','$matricule','$session')";
            if($incai = $connec -> exec($inca)){
                 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 Versement enregistrer avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';  
            }
        }
        }else if($newrest > 0 ){
            $mo = "UPDATE scolarite SET montverse='$newverse', restescolarite='$newrest', etatscolarite='non solde' where nom_session='$session' AND matricule='$matricule'";
            if($mod = $connec -> query($mo)){
                $inca = "INSERT INTO caissescolarite values('','$montverse','$date','$heure','$matricule','$session')";
                if($incai = $connec -> exec($inca)){
                     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                     Versement enregistrer avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';  
                }
            }
        }else if($newrest < 0){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Le montant versé est supérieur au montant à verser. Versement rejeté.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }


    }
}
}
?>