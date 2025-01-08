<?php
require('connect.php');
$nomfonction = ucwords($_POST['nomfonction']);
$checkinscription = $_POST['checkinscription'];
$checkscolarite = $_POST['checkscolarite'];
$checkgestprof = $_POST['checkgestprof'];
$checkdisciplineleve = $_POST['checkdisciplineleve'];
$checkautre = $_POST['checkautre'];
$ident = $_POST['ident'];
$checkenseignent = $_POST['checkenseignent'];
if($nomfonction == ''){

}else if($checkenseignent == 'false' && $checkinscription == 'false' && $checkscolarite == 'false' && $checkgestprof == 'false' && $checkdisciplineleve == 'false' && $checkautre == 'false'){
   
}else{
    $checkinscriptionverif = '';
    $checkscolariteverif = '';
    $checkgestprofverif = '';
    $checkdisciplineleveverif = '';
    $checkautreveverif = '';
    $checkprofverif = '';
    if($checkinscription == 'false'){
        $checkinscriptionverif = 'NON';
    }else if($checkinscription == 'true'){
        $checkinscriptionverif = 'OUI';
    }
    if($checkenseignent == 'false'){
        $checkprofverif = 'NON';
    }else if($checkenseignent == 'true'){
        $checkprofverif = 'OUI';
    }
    if($checkscolarite == 'false'){
        $checkscolariteverif = 'NON';
    }else if($checkscolarite == 'true'){
        $checkscolariteverif = 'OUI';
    }
    if($checkgestprof == 'false'){
        $checkgestprofverif = 'NON';
    }else if($checkgestprof == 'true'){
        $checkgestprofverif = 'OUI';
    }
    if($checkdisciplineleve == 'false'){
        $checkdisciplineleveverif = 'NON';
    }else if($checkdisciplineleve == 'true'){
        $checkdisciplineleveverif = 'OUI';
    }
    if($checkautre == 'false'){
        $checkautreveverif = 'NON';
    }else if($checkautre == 'true'){
        $checkautreveverif = 'OUI';
    }

            $in = "UPDATE fonction SET nom_fonction='$nomfonction',inscription='$checkinscriptionverif',scolarite='$checkscolariteverif',gest_enseignent='$checkgestprofverif',discipline_eleves='$checkdisciplineleveverif',enseignement='$checkprofverif',autres='$checkautreveverif' where id_fonction='$ident'";
            if($ins = $connec->query($in)){
                   echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Enregistrement reussi</strong>. Nouvelle fonction enregistrer<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Echec d\'enregistrement</strong>. Une erreur est survenue lors de la creation de la nouvelle fonction
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }

        }
   
?>