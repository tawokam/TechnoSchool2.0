<?php
require('connect.php');
$nomlivre = htmlspecialchars($_POST['nomlivre']);
$typlivre = htmlspecialchars($_POST['typlivre']);
$etagere = htmlspecialchars($_POST['etagere']);
$qte = htmlspecialchars($_POST['qte']);
$idlivre = htmlspecialchars($_POST['idlivre']);
if($nomlivre == ''){
    echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
    Veuillez entrer le nom du livre <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else if($qte == ''){
    echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
    Veuillez entrer la quantité<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else{
  $se = "SELECT *,count(id_livre) as nbre FROM livres WHERE nom_livre='$nomlivre' AND id_etagere='$etagere' AND id_livre <> '$idlivre'";
  if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      $nbre = $sele['nbre'];
      if($nbre < 1){
         $mod = "UPDATE livres SET nom_livre='$nomlivre',id_typelivre='$typlivre',id_etagere='$etagere',nbrelivre='$qte' WHERE id_livre='$idlivre'";
         if($modi = $connec -> query($mod)){
            echo '<div class="alert alert-success bg-success text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
             Modification effectuée avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
         }
      }else if($nbre >= 1){
        echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
        Ce livre a déjà été enregistré sur cet étagère.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    }
  }
}
?>