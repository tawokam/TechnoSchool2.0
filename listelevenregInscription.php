<?php
require('connect.php');
$nom = $_GET['nom'];
echo '<div class="alert" role="alert" style="font-size:14px;background:rgb(204, 209, 220);">
Cliquez sur l\'élève pour avoir accès au formulaire d\'inscription
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Matricule</th><th>Nom</th><th>Sexe</th><th>Nationalité</th><th>Adresse</th></tr>
  </thead>';
$n = 1;
if($nom == ''){
    $se = "SELECT * FROM eleves";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
  
            echo '<tr id="'.$sele['id_eleve'].'" onclick="formInscription(this.id)" style="cursor:pointer"><td>'.$n.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].' '.$sele['prenom_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nationalite_eleve'].'</td><td>'.$sele['adresse_eleve'].'</td></tr>';
            $n++;
        }
    }
}
else if($nom != ''){
    $se = "SELECT * FROM eleves where nom_eleve LIKE '%$nom%'  OR prenom_eleve LIKE '%$nom%'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
  
            echo '<tr id="'.$sele['id_eleve'].'" onclick="formInscription(this.id)" style="cursor:pointer"><td>'.$n.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].' '.$sele['prenom_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nationalite_eleve'].'</td><td>'.$sele['adresse_eleve'].'</td></tr>';
            $n++;
        }
    }
}
?>