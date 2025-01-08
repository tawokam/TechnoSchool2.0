<?php
require('connect.php');
$ident = $_POST['ident'];
$nomjour = $_POST['nomjour'];
$se = "SELECT *,count(id_jour) as nbre FROM jours where nom_jour='$nomjour' AND id_jour !='$ident'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      $nbre = $sele['nbre'];
      if($nbre >= 1){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Echec d\'enregistrement</strong>. Ce nom a déja été enregistré
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }else if($nbre < 1){
        $mo = "UPDATE jours SET nom_jour='$nomjour' where id_jour='$ident'";
        if($mod = $connec -> query($mo)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Modification effectuer avec succès
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
      }
    }
}
?>