<?php
require('connect.php');
$nomclasse = $_POST['nomclasse'];
$montscolarite = $_POST['montscolarite'];
$montinscription = $_POST['montinscription'];
$sectionclasse = $_POST['sectionclasse'];
$ident = $_POST['ident'];

if($nomclasse == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer le nom de la classe s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($montscolarite == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer le montant de la scolarité s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($montinscription == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer le montant de l\'inscription s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($sectionclasse == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez selectionner la section s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else{

$se = "SELECT *,count(id_classe) as nbre FROM classe where nom_classe='$nomclasse' AND id_classe <> $ident";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      $nbre = $sele['nbre'];
      if($nbre < 1){
        $in = "UPDATE classe SET nom_classe='$nomclasse',montscolarite='$montscolarite',montinscription='$montinscription',id_section='$sectionclasse' where id_classe='$ident'";
        if($ins = $connec -> query($in)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Modification effectuée avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; 
        }else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Problème de connexion. Veuillez recommencer s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; 
}
      }else if($nbre >= 1){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Cette classe a déja été enregistrée<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
      }
    }
}


}
?>