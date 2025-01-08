<?php
require('connect.php');
$nomeleveinscript = $_POST['nomeleveinscript'];
$matriculeinscript = $_POST['matriculeinscript'];
$sectioninscript = $_POST['sectioninscript'];
$classeinscriptionauto = $_POST['classeinscriptionauto'];
$montapayeinscript = $_POST['montapayeinscript'];
$montverseinscript = $_POST['montverseinscript'];
$redoublantinscript = $_POST['redoublantinscript'];
$dateinscript = $_POST['dateinscript'];
$heureinscript = $_POST['heureinscript'];
$sessionencour = $_POST['sessionencour'];
if($nomeleveinscript == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Le nom de l\'élève que vous souhaitez inscrire est absent.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($matriculeinscript == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Le matricule de l\'élève que vous souhaitez inscrire est absent.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($sectioninscript == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez sélectionner la section de l\'élève.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($classeinscriptionauto == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez sélectionner la classe de l\'élève<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($montapayeinscript == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Le montant à payer est absent.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else if($montverseinscript == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer le montant versé par l\'élève pour l\'inscription. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($dateinscript == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer la date de versement.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else{
 $se = "SELECT *,count(id_inscript) as nbre FROM inscription where matricule='$matriculeinscript' AND nom_session='$sessionencour'";
 if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
     $nbre = $sele['nbre'];
     if($nbre < 1){
        $reste = $montapayeinscript - $montverseinscript;
        if($reste > 0){
            // si redouble '$redoublantinscript','$dateinscript',
        $in = "INSERT INTO inscription VALUES('','$matriculeinscript','$classeinscriptionauto','$montapayeinscript','$montverseinscript','$reste','$sessionencour','non solde')";
        if($ins = $connec ->exec($in)){
            $caisin = "INSERT INTO caissescolarite values('','$montverseinscript','$dateinscript','$heureinscript','$matriculeinscript','$sessionencour')";
            if($caisins = $connec ->exec($caisin)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Inscription enregistrée avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'; 
            }
        }
     }else if($reste == 0){
        $in = "INSERT INTO inscription VALUES('','$matriculeinscript','$sectioninscript','$classeinscriptionauto','$montapayeinscript','$montverseinscript','$reste','$redoublantinscript','$dateinscript','$sessionencour','solde')";
        if($ins = $connec ->exec($in)){
            $caisin = "INSERT INTO caisseinscription values('','$montverseinscript','$dateinscript','$heureinscript','$matriculeinscript','$sessionencour')";
            if($caisins = $connec ->exec($caisin)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Inscription enregistrée avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'; 
            }
        } 
     }else if($reste < 0){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Le montant versé est supérieur au montant à verser.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; 
     }
    }else if($nbre >= 1){
        $semod = "SELECT * FROM inscription where matricule = '$matriculeinscript' AND nom_session = '$sessionencour'";
        if($semodi = $connec -> query($semod)){
            while($semodif = $semodi ->fetch()){
                $montot = $semodif['montinscription'];
                $mondejaerse = $semodif['montverseinscription'];
                $resteaverse = $semodif['resteinscription'];
                //calcule du reste a payer et le montant total payé
                $totverse = $mondejaerse + $montverseinscript;
                $newreste = $montot - $totverse;
                if($newreste > 0){
                    $mo = "UPDATE inscription SET montverse = '$totverse', resteinscription='$newreste' where matricule = '$matriculeinscript' AND nom_session = '$sessionencour'";
                    if($mod = $connec -> query($mo)){
                        $caisin = "INSERT INTO caissescolarite values('','$montverseinscript','$dateinscript','$heureinscript','$matriculeinscript','$sessionencour','','')";
                        if($caisins = $connec ->exec($caisin)){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Inscription enregistrer avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'; 
                        }
                    }
                }else if($newreste == 0){
                    $mo = "UPDATE inscription SET montverse = '$totverse', resteinscription='$newreste', statut='solde' where matricule = '$matriculeinscript' AND nom_session = '$sessionencour' ";
                    if($mod = $connec -> query($mo)){
                        $caisin = "INSERT INTO caissescolarite values('','$montverseinscript','$dateinscript','$heureinscript','$matriculeinscript','$sessionencour')";
                        if($caisins = $connec ->exec($caisin)){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Inscription enregistrer avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'; 
                        }
                    }
                }else if($newreste < 0 ){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Le montant versé est supérieur au montant à verser.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'; 
                }

            }
        }
    }
    }
 }

}
?>