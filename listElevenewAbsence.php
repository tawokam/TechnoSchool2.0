
<?php
require('connect.php');
$classe = $_GET['classe'];
$session = $_GET['session'];
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Matricule</th><th>Nom</th><th>Sexe</th><th>Classe</th></tr>
  </thead>';
  $nbr = 1;

$se = "SELECT inscription.id_inscript,eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,inscription.montinscription,inscription.montverseinscription,inscription.resteinscription,inscription.redouble,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section where inscription.nom_session = '$session' order by eleves.nom_eleve, eleves.prenom_eleve";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        $mat = $sele['matricule'];
        ?>
        <tr id="<?php echo $mat?>" onclick="formNewAbs(this.id)" style="cursor:pointer"><?php echo '<td>'.$nbr.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nom_classe'].'</td></tr>';
        $nbr++;
    }
}
  
echo '</table>';
?>

<div class="card" id="formnewAb" style="position :absolute;width:350px;box-shadow:0.5px 0.5px 5px 5px rgba(128, 128, 128, 0.459);left:calc((100% - 350px)/2);cursor:pointer">
            <div class="card-body">
              <div style="text-align:right"><i class="bi bi-x" style="font-size:30px" onclick="document.getElementById('formnewAb').style.display='none'"></i></div>
              <h5 class="card-title" style="padding-top:0px">Enregistrer l'absence de élève (<span id="matr"></span>)</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
              <input type="hidden" class="form-control" id="class" value="<?php echo $classe;?>" style="border:0.5px solid gray">
              <input type="hidden" class="form-control" id="elev" style="border:0.5px solid gray">
                <div class="col-md-12">
                  <label for="nbreTime" class="form-label">Nombre d'heure</label>
                  <input type="number" class="form-control" id="nbreTime" style="border:0.5px solid gray">
                </div>
               
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertnewAbsence()">Enregistrer</button>
                </div><br/>
                <div id="resultinsertabs">

                </div>

            </div>
          </div>

        </div>