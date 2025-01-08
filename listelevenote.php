<?php
require('connect.php');
$idclasse = $_GET['idclasse'];
$session = $_GET['session'];
$nomc = '';
$c = "SELECT * FROM classe where id_classe='$idclasse'";
if($cl = $connec -> query($c)){
    while($cli = $cl -> fetch()){
        $nomc = ucwords($cli['nom_classe']);
    }
}
?>
<div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Attribution des notes d'évaluations dans la classe de <span style="font-weight:bold;font-size:20px"><?php echo $nomc; ?></span></h5>

              <form class="row g-3">
              <div class="col-md-4">
                  <label for="seqnote" class="form-label">Séquence</label>
                    <select class="form-select" id="seqnote">
                    <option value="sequence 1">Séquence 1</option>
                    <option value="sequence 2">Séquence 2</option>
                    <option value="sequence 3">Séquence 3</option>
                    <option value="sequence 4">Séquence 4</option>
                    <option value="sequence 5">Séquence 5</option>
                    <option value="sequence 6">Séquence 6</option>
                    </select>
                </div>
                <div class="col-md-4">
                  <label for="matierenote" class="form-label">Matière</label>
                  <?php
                  echo '<select class="form-select" id="matierenote">';
                    $ma = "SELECT programme.id_classe,programme.id_matiere,matieres.id_matiere,matieres.nom_matiere,classe.id_classe FROM programme inner join classe on programme.id_classe=classe.id_classe inner join matieres on programme.id_matiere=matieres.id_matiere WHERE programme.id_classe='$idclasse' group by programme.id_matiere";
                    if($mat = $connec -> query($ma)){
                        while($mati = $mat -> fetch()){
                        echo '<option value="'.$mati['id_matiere'].'">'.$mati['nom_matiere'].'</option>';
                        }
                    }
                    echo '</select>';
                  ?>

                </div>
                <div class="col-md-4">
                  <label for="coefnote" class="form-label">Coéficient</label>
                  <input type="number" class="form-control" id="coefnote" >
               </div>

              </form>
<br/><table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Matricule</th><th>Nom de l'élève</th><th>Note / 20</th></tr>
  </thead>
               <?php 
               $nbreel = 1;
               $nb = 0;
               $el = "SELECT inscription.id_inscript,inscription.matricule,eleves.matricule,eleves.nom_eleve,inscription.id_classe,classe.id_classe FROM inscription inner join eleves on inscription.matricule=eleves.matricule inner join classe on inscription.id_classe=classe.id_classe where classe.id_classe='$idclasse'";
               if($ele = $connec -> query($el)){
                while($elev = $ele -> fetch()){
                  $matricule = $elev['matricule'];
                      $nb = 1;
                    $ideleve = $elev['matricule'];
                    echo '<input type="hidden" value="'.$matricule.'" id="mat'.$nbreel.'">';
           echo '<tr ><td>'.$nbreel.'</td><td>'.$matricule.'</td><td>'.$elev['nom_eleve'].'</td><td style="padding:6px 0px;width:20%"><input type="number" class="form-control" id="note'.$nbreel.'"  placeholder="Note / 20" style="border:0px"></td></tr>';
           $nbreel++;       
        }
               }
            
               echo '</table>';
               echo '<input type="hidden" value="'.$nbreel.'" id="nbreligneeleve">';
               if($nb == 1){
                ?>
                <div style="text-align:center"><button type="button" id="<?php echo $idclasse; ?>" onclick="insertnoteclasse(this.id,'0')" class="btn btn-primary">Enregistrer les notes</div></button>
                <?php
                 echo '<br/><div id="resultinsertnote"></div>';
               }else if($nb == 0){
                echo '<div class="alert alert-dark bg-danger text-light" role="alert" style="font-size: 12px;">
Aucun n\'élève n\'a été inscript dans cette classe
</div>';
               }
               echo '</div></div>';
?>