<?php
require('connect.php');
$nomlivre = htmlspecialchars($_POST['nomlivre']);
$typlivre = htmlspecialchars($_POST['typlivre']);
$etagere = htmlspecialchars($_POST['etagere']);
$qte = htmlspecialchars($_POST['qte']);
if($nomlivre == ''){
    echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
    Veuillez entrer le nom du livre <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else if($typlivre == ''){
    echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
    Veuillez sélectionner le type de livre <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else if($etagere == ''){
    echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
    Veuillez selectionnez l\'étagère où le livre est classé.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else if($qte == ''){
    echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
    Veuillez entrer la quantité<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else{
  $se = "SELECT *,count(id_livre) as nbre FROM livres WHERE nom_livre='$nomlivre' AND id_etagere='$etagere'";
  if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      $nbre = $sele['nbre'];
      if($nbre < 1){
         $in = "INSERT INTO livres VALUES('','$nomlivre','$typlivre','$etagere','$qte','$qte')";
         if($ins = $connec -> exec($in)){
            echo '<div class="alert alert-success bg-success text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
             Livre(s) enregistré(s) avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
         }
      }else if($nbre >= 1){
        echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" role="alert" style="font-size:12px;">
        Ce livre a déjà été enregistré sur cet étagère. Si vous souhaitez modifier la quantité de livre, veuillez cliquer sur le boutton livre ensuite sur modifier le livre<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    }
  }
}
?>