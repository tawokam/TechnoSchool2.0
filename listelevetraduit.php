<?php
require('connect.php');

$classe = $_GET['classe'];
echo '<div class="alert alert-dark bg-secondary text-light" role="alert" style="font-size: 12px;">
Veuillez cliquer sur l\'élève que vous souhaitez traduire au conseil de discipline.
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Matricule</th><th>Nom</th><th>Sexe</th></tr>
  </thead>';
  $line = 1;
$se = "SELECT inscription.id_classe,inscription.matricule,eleves.matricule,eleves.nom_eleve,eleves.sexe_eleve FROM inscription inner join eleves on inscription.matricule=eleves.matricule WHERE inscription.id_classe='$classe' order by eleves.nom_eleve  ASC";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
       $matriculeab = $sele['matricule'];
            echo '<tr  class="bg-light text-dark  linejustabsent" id="'.$matriculeab.'" onclick="formtraduitconseil(this.id,'.$classe.')" style="cursor:pointer"><td>'.$line.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td >'.$sele['sexe_eleve'].'</td></tr>';
    $line++;
    }
}
echo '</table>';
?>