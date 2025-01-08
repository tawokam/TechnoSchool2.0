<?php
require('connect.php');
$n = 1;
echo '<div class="alert alert-dark bg-secondary text-light" role="alert" style="font-size:12px">
Veuillez cliquer sur exporter sur la ligne du professeur que vous souhaitez exporter l\'emploi de temps
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom du professeur</th><th>Sexe</th><th>Diplome</th><th>Spécialité</th><th>Exportation</th></tr>
  </thead>';

$se = "SELECT fonction.id_fonction,fonction.enseignement,fonction.nom_fonction,employer.id_employer,employer.nom_employer,employer.sexe_employer,employer.grandiplome,employer.specialitediplome,employer.quartier_employer,employer.id_fonction FROM employer inner join fonction on employer.id_fonction=fonction.id_fonction where fonction.enseignement='OUI'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){     
        echo '<tr ><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['grandiplome'].'</td><td>'.$sele['specialitediplome'].'</td><td><a href="exporteemploiprof.php?ident='.$sele['id_employer'].'" style="text-decoration:none"><i class="bi bi-download fw-bold text-success "> Exporter (Excel)</a></td></tr>';
        $n++;
    }
}
  
?>