<?php
require('connect.php');
$nomatiere = ucwords($_POST['nomatiere']);
$typmatmatiere = $_POST['typmatmatiere'];

if($nomatiere == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer le nom de la matière s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($typmatmatiere == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez selectionner le type de matière s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else{

$se = "SELECT *,count(id_matiere) as nbre FROM matieres where nom_matiere='$nomatiere'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      $nbre = $sele['nbre'];
      if($nbre < 1){
        $in = "INSERT INTO matieres values('','$nomatiere','$typmatmatiere','')";
        if($ins = $connec -> exec($in)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Nouvelle matière enregistrée avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'; 
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