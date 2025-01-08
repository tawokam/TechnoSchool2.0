<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes élèves</title>
    <link href="assets/img/logo.jfif" rel="icon">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <style>
        #spinner{display:none}
    </style>
</head>
<body>
<div style="color:#0d6efd;border-bottom:1px solid #0d6efd">
        <i class="bi bi-arrow-left-short" style="font-size:40px; margin-left:20px; vertical-align:middle;cursor:pointer" onclick="window.history.go(-1)"></i>&nbsp;&nbsp;  <strong style="font-size:20px;vertical-align:middle">Notes des élèves</strong> 
</div>
<?php
require('connect.php');
$classe = $_GET['classe'];
$id = $_GET['id'];

// recupere la session active
$ss = "SELECT * FROM tabsession WHERE statut='Activer'";
if($sess = $connec -> query($ss)){
    if($sess -> rowCount() == 0){
        echo 'Problème de configuration. La session en cours n\'a pas été configurée.';
    }else{
        while($sessions = $sess -> fetch()){
            $session = $sessions['nom_session'];
        }
    }

}
$nomc = '';
$c = "SELECT * FROM classe where id_classe='$classe'";
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
                    $ma = "SELECT programme.id_classe,programme.id_matiere,matieres.id_matiere,matieres.nom_matiere,classe.id_classe FROM programme inner join classe on programme.id_classe=classe.id_classe inner join matieres on programme.id_matiere=matieres.id_matiere WHERE programme.id_classe='$classe' AND programme.id_employer='$id' group by programme.id_matiere";
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
               $el = "SELECT inscription.id_inscript,inscription.matricule,eleves.matricule,eleves.nom_eleve,inscription.id_classe,classe.id_classe FROM inscription inner join eleves on inscription.matricule=eleves.matricule inner join classe on inscription.id_classe=classe.id_classe where classe.id_classe='$classe'";
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
                <div style="text-align:center"><button type="button" id="<?php echo $classe;?>" onclick="insertnoteclasse(this.id,'1')" class="btn btn-primary">Enregistrer les notes</div></button>
                <?php
                 echo '<br/><div id="resultinsertnote"></div>';
               }else if($nb == 0){
                echo '<div class="alert alert-dark bg-danger text-light" role="alert" style="font-size: 12px;">
Aucun n\'élève n\'a été inscript dans cette classe
</div>';
               }
               echo '</div></div>';
?>  
  <!-- Programmation du spinner qui s'affiche pendant le chargement-->
  <div id="spinner" style="text-align:center;position:fixed;top:48%;left:47%;width: 100px;padding:10px;background:white;border-radius: 10px;" >
  <div class="spinner-border m-10 text-primary" style="width: 3rem; height: 3rem;" role="status" >

  </div>
</div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/js/script.js" async></script>  
</body>
</html>
