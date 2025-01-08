<body onload="nbreheurecours()">
<?php
require('connect.php');
$ident = $_GET['ident'];
$em = "SELECT * FROM employer where id_employer='$ident'";
if($emp = $connec -> query($em)){
    while($empl = $emp -> fetch()){

?>

<div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Programmation de cours de Mr/Mme <span style="font-weight:bold;font-size:20px"><?php echo $empl['nom_employer'] ?></span></h5>

              <form class="row g-3">
                <div class="col-md-6">
                  <label for="nomprofprogramme" class="form-label">Nom de l'enseignant</label>
                  <input type="text" class="form-control" id="nomeprofprogramme" value="<?php echo $empl['nom_employer'] ?>" readonly>
                </div>
                <div class="col-md-6">
                  <label for="matiereprogramme" class="form-label">Matière</label>
                  <?php
                  echo '<select class="form-select" id="matiereprogramme">';
                    $ma = "SELECT * FROM matieres order by nom_matiere asc";
                    if($mat = $connec -> query($ma)){
                        while($mati = $mat -> fetch()){
                        echo '<option value="'.$mati['id_matiere'].'">'.$mati['nom_matiere'].'</option>';
                        }
                    }
                    echo '</select>';
                  ?>

                </div>
                <div class="col-md-6">
                    <label for="classeprogramme" class="form-label">Nom de la classe</label>
                <?php 
    
                  echo '<select class="form-select" id="classeprogramme">';
                    $cl = "SELECT * FROM classe order by nom_classe desc";
                    if($cla = $connec -> query($cl)){
                        while($clas = $cla -> fetch()){
                        echo '<option value="'.$clas['id_classe'].'">'.$clas['nom_classe'].'</option>';
                        }
                    }
                    echo '</select>';
                  ?>
                </div>
                <div class="col-md-6">
                  <label for="jourprogramme" class="form-label">Jour du cours</label>
                <?php 
                  echo '<select class="form-select" id="jourprogramme">';
                  $jr = "SELECT * FROM jours order by id_jour asc";
                  if($jor = $connec -> query($jr)){
                      while($jour = $jor -> fetch()){
                      echo '<option value="'.$jour['nom_jour'].'">'.$jour['nom_jour'].'</option>';
                      }
                  }
                  echo '</select>';
      ?>

                </div>
                <div class="col-md-6">
                  <label for="heuredeubutprogram" class="form-label">Heure de début du cours</label>
                  <?php 
                  echo '<select class="form-select" id="heuredeubutprogram" onchange="affichheurefinprogram()"><option value="">Selectionnez l\'heure de début du cours</option>';
                  $hd = "SELECT * FROM periode where typeperiode <> 'pause' order by id_periode asc";
                  if($hed = $connec -> query($hd)){
                      while($heud = $hed -> fetch()){
                      echo '<option value="'.$heud['heuredebut'].'">'.$heud['heuredebut'].'</option>';
                      }
                  }
                  echo '</select>';
                ?>  
                </div>
                <div class="col-md-6">
                  <label for="heurefinprogram" class="form-label">Heure de fin du cours</label>
                  <input type="text" class="form-control" id="heurefinprogram" readonly>
                </div>
                  <div class="col-md-12">
                  <label for="paieheurprogram" class="form-label">Paie par heure(uniquement pour les vacataires)</label>
                  <input type="number" class="form-control" id="paieheurprogram" >
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertprogramprof(<?php echo $ident; ?>)">Ajouter a l'emploi de temps</button>
                </div><br/>
                <div id="resultinsertprogram">

                </div>

            </div>
          </div>

        </div>
<?php
        
    }
}
?>
</body>