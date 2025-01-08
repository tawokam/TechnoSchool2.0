<?php
require('connect.php');
$nomtypmatmodif = $_POST['nomtypmatmodif'];
$ident = $_POST['ident'];

if($nomtypmatmodif == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer le nom du type de matière s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else{

$se = "SELECT *,count(id_typmat) as nbre FROM typematiere where nom_typmat='$nomtypmatmodif' AND id_typmat <> '$ident'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      $nbre = $sele['nbre'];
      if($nbre < 1){
        $in = "UPDATE typematiere SET nom_typmat='$nomtypmatmodif' where id_typmat='$ident'";
        if($ins = $connec -> query($in)){
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
        Ce type de matière a déja été enregistré<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
      }
    }
}


}
?>