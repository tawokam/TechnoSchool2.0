<?php
require('connect.php');
$nomjour = $_POST['nomjourcour'];
if($nomjour == ''){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Echec d\'enregistrement</strong>. Veuillez entrez le nom du jour
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}else{
$se = "SELECT *,count(id_jour) as nbre FROM jours where nom_jour='$nomjour'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
         $nbre = $sele['nbre'];
         if($nbre >= 1){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Echec d\'enregistrement</strong>. Ce jour de cour a déja été enregistrer
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
         }else if($nbre < 1){
            $in = "INSERT INTO jours VALUES('','$nomjour')";
            if($ins = $connec -> exec($in)){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 Nouveau jour enregistré aec succès
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
         }
    }
}
}
?>