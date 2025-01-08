<?php
require('connect.php');
$sequence = $_GET['sequence'];
$matiere = $_GET['matiere'];
$classenote = $_GET['classenote'];
$session = $_GET['session'];

echo '<input type="hidden" value="'.$matiere.'" id="matierenotmodif">';
echo '<input type="hidden" value="'.$sequence.'" id="sequencenotmodif">';

$co = "SELECT evaluation.session,evaluation.matricule,evaluation.id_classe,evaluation.sequence,evaluation.note,evaluation.id_matiere,evaluation.coef,evaluation.session,eleves.matricule,eleves.nom_eleve FROM evaluation inner join eleves on evaluation.matricule=eleves.matricule where evaluation.sequence='$sequence' AND evaluation.id_matiere='$matiere' AND evaluation.id_classe='$classenote' AND evaluation.session='$session' group by evaluation.coef";
if($coe = $connec -> query($co)){
    while($coef = $coe -> fetch()){
        echo ' <form class="row g-3">
        <div class="col-md-12">
        <label for="coefinsertmodif" class="form-label">Coéficient</label>
        <input type="number" value="'.$coef['coef'].'" class="form-control" id="coefinsertmodif">
        </div></form><br>
        ';
    }
}
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Matricule</th><th>Nom</th><th>Note / 20</th></tr>
  </thead>';
  $nbr = 1;
  $lignepresent = 1;
$se = "SELECT evaluation.session,evaluation.matricule,evaluation.id_classe,evaluation.sequence,evaluation.note,evaluation.id_matiere,evaluation.coef,evaluation.session,eleves.matricule,eleves.nom_eleve FROM evaluation inner join eleves on evaluation.matricule=eleves.matricule where evaluation.sequence='$sequence' AND evaluation.id_matiere='$matiere' AND evaluation.id_classe='$classenote' AND evaluation.session='$session'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        ?>
        <input type="hidden" value="<?php echo $sele['matricule'] ?>" id="matriinsertmodif<?php echo $nbr; ?>">
        <tr ><td><?php echo $nbr;?></td><td><?php echo $sele['matricule'];?></td><td><?php echo $sele['nom_eleve'];?></td><td style="width: 20%"><input type="number" style="border:0px" value="<?php echo $sele['note'];?>" id="noteinsertmodif<?php echo $nbr;?>" class="form-control"></td></tr>
<?php
$nbr++;
$lignepresent = 2;
    }
}
echo '</table><br>';
echo '<input type="hidden" value="'.$nbr.'" id="nbrelignmodif">';
if( $lignepresent == 1){
    echo '<div class="alert alert-danger text-light bg-danger alert-dismissible fade show" role="alert" style="font-size:12px;">
    Aucune notes enregistrer pour cette matière et dans cette sequence<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else if( $lignepresent == 2){
echo '<div style="text-align:center"><button onclick="insertmodifnoteclasse(this.id)" class="btn btn-primary  btnnoload" id="'.$classenote.'">Enregistrer les modifications</button></div>';
}

echo '<br><div id="resultinsertmodifnotes"></div>';
?>