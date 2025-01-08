<?php
require('connect.php');
$nomfonction = ucwords($_POST['nomfonction']);
$checkinscription = $_POST['checkinscription'];
$checkscolarite = $_POST['checkscolarite'];
$checkgestprof = $_POST['checkgestprof'];
$checkdisciplineleve = $_POST['checkdisciplineleve'];
$checkautre = $_POST['checkautre'];
$checkenseignent = $_POST['checkenseignent'];
if($nomfonction == ''){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Nom de la fonction absent.</strong> veuillez entrer le nom de la fonction s\'il vous plait
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}else if($checkenseignent == 'false' && $checkinscription == 'false' && $checkscolarite == 'false' && $checkgestprof == 'false' && $checkdisciplineleve == 'false' && $checkautre == 'false'){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Aucune Responsabilté ?</strong> Cochez \'Autres\' si la ou les responsabilité(s) de cette fonction ne figurent pas dans la liste des responsabilités.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}else{
    $checkinscriptionverif = '';
    $checkscolariteverif = '';
    $checkgestprofverif = '';
    $checkdisciplineleveverif = '';
    $checkautreveverif = '';
    $checkenseignentverif = '';
    if($checkinscription == 'false'){
        $checkinscriptionverif = 'NON';
    }else if($checkinscription == 'true'){
        $checkinscriptionverif = 'OUI';
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
    if($checkenseignent == 'false'){
        $checkenseignentverift = 'NON';
    }else if($checkenseignent == 'true'){
        $checkenseignentverift = 'OUI';
    }
    $se = "SELECT *,count(id_fonction) as nbref FROM fonction where nom_fonction = '$nomfonction'";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
          $nbrefon = $sele['nbref'];
          if($nbrefon < 1){
            $in = "INSERT INTO fonction VALUES('','$nomfonction','$checkinscriptionverif','$checkscolariteverif','$checkgestprofverif','$checkdisciplineleveverif','$checkenseignentverift','$checkautreveverif')";
            if($ins = $connec->exec($in)){
                   echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Enregistrement reussi</strong>. Nouvelle fonction enregistré<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Echec d\'enregistrement</strong>. Une erreur est survenue lors de la creation de la nouvelle fonction
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
          }else if($nbrefon >= 1){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Echec d\'enregistrement</strong>. la fonction '.$nomfonction.' a déja été enregistrée
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          }
        }
    }

}
?>