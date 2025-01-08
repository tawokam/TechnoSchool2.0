<?php
require('connect.php');
$classe = $_GET['classe'];
$nbrecl = 1;
$tab = array();
$ma = "SELECT classe.nom_classe FROM  classe where id_classe='$classe'";
if($mat = $connec -> query($ma)){
    while($mati = $mat -> fetch()){
   $nomclass = $mati['nom_classe'];
    }
}

?>

<div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Liste des notes de la classe de <span style="font-weight: bold;font-size:18px"><?php echo $nomclass; ?></span></h5>

              <form class="row g-3">
              <div class="col-md-6">
                <input type="hidden" value="<?php echo $classe ?>" id="classenote">
                  <label for="seqnote" class="form-label">Séquences</label>
                    <select class="form-select" id="seqnotemodif" onchange="choixseqmqtiereListeNote()">
                    <option value="sequence 1">Séquence 1</option>
                    <option value="sequence 2">Séquence 2</option>
                    <option value="sequence 3">Séquence 3</option>
                    <option value="sequence 4">Séquence 4</option>
                    <option value="sequence 5">Séquence 5</option>
                    <option value="sequence 6">Séquence 6</option>
                        }
                    }
                    </select>
                </div>
                <div class="col-md-6">
                <label for="matierenote" class="form-label">Matières</label>
                  <?php
                  echo '<select class="form-select" id="matierenotemodif" onchange="choixseqmqtiereListeNote()">';
                  echo '<option value="">Selectionnez une matière</option>';
                    $ma = "SELECT programme.id_classe,programme.id_matiere,matieres.id_matiere,matieres.nom_matiere,classe.id_classe FROM programme inner join classe on programme.id_classe=classe.id_classe inner join matieres on programme.id_matiere=matieres.id_matiere WHERE programme.id_classe='$classe' group by programme.id_matiere";
                    if($mat = $connec -> query($ma)){
                        while($mati = $mat -> fetch()){
                        echo '<option value="'.$mati['id_matiere'].'">'.$mati['nom_matiere'].'</option>';
                        }
                    }
                    echo '</select>';
                  ?>
                </div>
              <div id="zonenotemodif">
            <div class="alert alert-primary text-light bg-primary alert-dismissible fade show" role="alert" style="font-size:12px;">
                Séléctionnez une matière s'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>

              </div>
              </form>
            </div>
</div>
<?php
$se = "SELECT eleves.matricule,eleves.nom_eleve,matieres.id_matiere,matieres.nom_matiere,evaluation.note,evaluation.id_matiere,evaluation.matricule FROM evaluation inner join eleves on evaluation.matricule=eleves.matricule inner join matieres on evaluation.id_matiere=matieres.id_matiere";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        //echo 'fofof';
    }
}
?>