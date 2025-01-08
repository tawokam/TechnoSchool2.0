<?php
require('connect.php');
$classe = $_GET['classe'];
$nome = '';
$cl = "SELECT * FROM classe where id_classe='$classe'";
if($cla = $connec -> query($cl)){
    while($clas = $cla -> fetch()){
        $nome = $clas['nom_classe'];
    }
}
echo '<div class="card" style="width:100%;">
<div class="card-body">
  <h5 class="card-title">Fiche d\'appel de la classe de <span style="font-weight:bold;font-size:20px">'. $nome.'</span></h5>
';
echo '<form class="row g-3">
<div class="col-md-6">
  <label for="heuredebutabsence" class="form-label">Heure de debut de la période </label>
  <select id="heuredebutabsence" class="form-select" onchange="finperiodeabsence('.$classe.')">
  <option value="">Séléctionnez la période</option>
  ';
$pe = "SELECT * FROM periode where typeperiode='cours'";
if($per = $connec -> query($pe)){
    while($peri = $per -> fetch()){
        echo ' <option value="'.$peri['heuredebut'].'">'.$peri['heuredebut'].'</option>';
    }
}
echo '</select></div>';
echo '<div class="col-md-6"><label for="heurefinabsence" class="form-label">Heure de fin de la période</label><input type="text" class="form-control" readonly id="heurefinabsence"></div>';
echo '<div id="resultinsertappel"></div>';
echo '<div id="zoneficheappel">
<div class="alert alert-success bg-success text-light" role="alert" style="font-size: 12px;">
  Veuillez sélectionner une période pour avoir la fiche d\'appel.
</div>
</div>';
echo '</form>';
?>