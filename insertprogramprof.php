<?php
require('connect.php');
$ident = $_POST['ident'];
$matiereprogramme = $_POST['matiereprogramme'];
$classeprogramme = $_POST['classeprogramme'];
$jourprogramme = $_POST['jourprogramme'];
$heuredeubutprogram =  $_POST['heuredeubutprogram'];
$heurefinprogram =  $_POST['heurefinprogram'];
$paieheurprogram = $_POST['paieheurprogram'];
$session = $_POST['session'];

 if($heuredeubutprogram == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Echec. Veuillez entrer l\'heure de début du cours<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';  
}else if($heurefinprogram == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Echec. Veuillez entrer l\'heure de fin du cours<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';  
}
else{
    $sitablevide = 0;
    $co = "SELECT *,count(id_programme) as nbreprog FROM programme ";
    if($com = $connec -> query($co)){
        while($comp = $com -> fetch()){
            $nbre = $comp['nbreprog'];
            if($nbre < 1){
              $sitablevide = 2;
            }else if($nbre >=1){
                $sitablevide = 1;
            }
        }
    }
    /* Verifie si l'enseignent quont souhaite programmé a un jour x et a une periode y
     n,est pas deja programmé dans une autre classe a ce jour x et a cette periode y */
     $verifisiprofoccupe = 0;
     $ve = "SELECT *,count(id_programme) as nbreemplo FROM programme where jour='$jourprogramme' AND heuredebut='$heuredeubutprogram' AND heurefin='$heurefinprogram' AND id_employer='$ident' AND nom_session='$session'";
     if($ver = $connec -> query($ve)){
        while($veri = $ver -> fetch()){
           $sioccuppe = $veri['nbreemplo'];
           if($sioccuppe < 1){
             $verifisiprofoccupe = 10;
           }else if($sioccuppe >= 1){
              $verifisiprofoccupe = 11;
           }
        }
     }
     if($verifisiprofoccupe == 11){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Échec. L\'enseignant a déjà été programmé ce jour et à cette période dans une autre classe.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
     }else{
    if($sitablevide == 1){
    $sivalide = 0;
    $se = "SELECT * FROM programme WHERE nom_session='$session'";
    if($sel = $connec -> query($se)){
        $sivalide = 1;
        while($sele = $sel -> fetch()){
            $debuth = $sele['heuredebut'];
            $finh = $sele['heurefin'];
            $jour = $sele['jour'];
            $classe = $sele['id_classe'];
            if($heuredeubutprogram == $debuth && $heurefinprogram == $finh && $jourprogramme == $jour && $classe == $classeprogramme){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Échec. La période choisie appartient déjà à un autre enseignant.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'; 
                $sivalide = 2;
                exit();
            }else{
                $sivalide = 1;
                
            }
        }
    }else{echo 'echec1';}
    if($sivalide == 1){
        $in = "INSERT INTO programme VALUES('','$classeprogramme','$matiereprogramme','$ident','$jourprogramme','$heuredeubutprogram','$heurefinprogram','$paieheurprogram','$session')";
        if($ins = $connec -> exec($in)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            L\'enseignant a été programmé avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }else{echo 'echec2';}
    }else{echo 'echec3';}
}else if($sitablevide == 2){
    $in = "INSERT INTO programme VALUES('','$classeprogramme','$matiereprogramme','$ident','$jourprogramme','$heuredeubutprogram','$heurefinprogram','$paieheurprogram','$session')";
    if($ins = $connec -> exec($in)){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        L\'enseignant a été programmé avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else{echo 'echec2';}
}
}
}
?>