<?php
require('connect.php');
$nomatieremodif = $_POST['nomatieremodif'];
$typmatmodif = $_POST['typmatmodif'];
$ident = $_POST['ident'];

if($nomatieremodif == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer le nom de la matière s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($typmatmodif == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez sélectionner le type de matière s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else{

$se = "SELECT *,count(id_matiere) as nbre FROM matieres where nom_matiere='$nomatieremodif'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      $nbre = $sele['nbre'];
      if($nbre < 1){
        $in = "UPDATE matieres SET nom_matiere='$nomatieremodif',id_typmat='$typmatmodif' where id_matiere='$ident'";
        if($ins = $connec -> exec($in)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Modification effectuée avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; 
        }else{
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Problème de connexion. Veuillez recommencer s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; 
}
      }else if($nbre >= 1){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Cette matière a déja été enregistrée<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
      }
    }
}


}
?>