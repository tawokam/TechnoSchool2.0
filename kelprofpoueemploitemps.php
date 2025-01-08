<?php
require('connect.php');
$n = 1;
echo '<div class="alert alert-dark" role="alert" style="font-size:12px">
Veuillez cliquer sur un enseignant pour avoir son emploi du temps 
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Nom du professeur</th><th>Sexe</th><th>Téléphone</th><th>Fonction</th></tr>
  </thead>';
$se = "SELECT employer.id_employer,employer.nom_employer,employer.sexe_employer,employer.telephone1_employer,employer.id_fonction,fonction.id_fonction,fonction.enseignement,fonction.nom_fonction FROM employer inner join fonction on employer.id_fonction=fonction.id_fonction WHERE fonction.enseignement='OUI'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){     
        echo '<tr id="'.$sele['id_employer'].'" style="cursor:pointer" onclick="emploitempsprof(this.id)"><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['telephone1_employer'].'</td><td>'.$sele['nom_fonction'].'</td></tr>';
        $n++;
    }
}
echo '</table>';

  
?>