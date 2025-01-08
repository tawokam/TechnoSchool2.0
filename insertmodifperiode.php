<?php
require('connect.php');
$ident = $_POST['ident'];
$heurdebutperiodemodif = $_POST['heurdebutperiodemodif'];
$heurfinperiodemodif = $_POST['heurfinperiodemodif'];
$typeperiodemodif = $_POST['typeperiodemodif'];

//verification si la ligne selectionnez est de type pause pour le modifier dans la table programme
$typ = '';
$hpd = '';
$hpf = '';
$ve = "SELECT * FROM periode where id_periode='$ident'";
if($ver = $connec -> query($ve)){
  while($veri = $ver -> fetch()){
    $typ = $veri['typeperiode'];
    $hpd = $veri['heuredebut'];
    $hpf = $veri['heurefin'];
  }
}
$identprog = 0;
$p = "SELECT * FROM programme where heuredebut='$hpd' AND heurefin='$hpf'";
if($pr = $connec -> query($p)){
  while($pro = $pr -> fetch()){
    $identprog = $pro['id_programme'];
  }
}
if($typeperiodemodif == 'pause' && $typ == 'pause'){
  $mp = "UPDATE programme SET heuredebut='$heurdebutperiodemodif', heurefin='$heurfinperiodemodif' where id_matiere='1000000' AND id_programme='$identprog'";
  if($mop = $connec -> query($mp)){}
}else if($typeperiodemodif == 'pause' && $typ == 'cours'){
  $inp = "INSERT INTO programme values('','','1000000','','','$heurdebutperiodemodif','$heurfinperiodemodif','','')";
  if($insp = $connec -> exec($inp)){}
}else if($typeperiodemodif == 'cours' && $typ == 'pause'){
  $mp = "DELETE from programme where id_matiere='1000000' AND id_programme='$identprog'";
  if($mop = $connec -> query($mp)){}
}else if($typeperiodemodif == 'cours' && $typ == 'cours'){

}
$se = "SELECT *,count(id_periode) as nbre FROM periode where heuredebut='$heurdebutperiodemodif' AND heurefin='$heurfinperiodemodif' AND id_periode <> $ident";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      $nbre = $sele['nbre'];
      if($nbre >= 1){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Cette période a déjà été enregistrée.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }else if($nbre < 1){ 
        $mo = "UPDATE periode SET heuredebut='$heurdebutperiodemodif', heurefin='$heurfinperiodemodif', typeperiode='$typeperiodemodif' where id_periode='$ident'";
        if($mod = $connec -> query($mo)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Modification effectuée avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
      }
    }
}
?>