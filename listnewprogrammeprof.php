<?php
require('connect.php');
$nomprof = $_GET['nomprof'];
$n = 1;
echo '<div class="alert alert-dark" role="alert" style="font-size:12px">
Veuillez cliquer sur le professeur que vous souhaitez programmer pour ouvrir le formulaire de programmation des enseignants.
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom du professeur</th><th>Sexe</th><th>Diplome</th><th>Spécialité</th><th>Quartier</th><th>Fonction</th></tr>
  </thead>';
  if($nomprof == ''){
$se = "SELECT fonction.id_fonction,fonction.enseignement,fonction.nom_fonction,employer.id_employer,employer.nom_employer,employer.sexe_employer,employer.grandiplome,employer.specialitediplome,employer.quartier_employer,employer.id_fonction FROM employer inner join fonction on employer.id_fonction=fonction.id_fonction where fonction.enseignement='OUI'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){     
        echo '<tr id="'.$sele['id_employer'].'" style="cursor:pointer" onclick="formprogrammeprof(this.id)"><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['grandiplome'].'</td><td>'.$sele['specialitediplome'].'</td><td>'.$sele['quartier_employer'].'</td><td>'.$sele['nom_fonction'].'</td></tr>';
        $n++;
    }
}
  }else if($nomprof != ''){
    $se = "SELECT fonction.id_fonction,fonction.enseignement,fonction.nom_fonction,employer.id_employer,employer.nom_employer,employer.sexe_employer,employer.grandiplome,employer.specialitediplome,employer.quartier_employer,employer.id_fonction FROM employer inner join fonction on employer.id_fonction=fonction.id_fonction where fonction.enseignement='OUI' AND employer.nom_employer LIKE '%$nomprof%'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){     
        echo '<tr id="'.$sele['id_employer'].'" style="cursor:pointer" onclick="formprogrammeprof(this.id)"><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['grandiplome'].'</td><td>'.$sele['specialitediplome'].'</td><td>'.$sele['quartier_employer'].'</td><td>'.$sele['nom_fonction'].'</td></tr>';
        $n++;
    }
}
  }
?>