<?php
require('connect.php');
$sexe = $_GET['sexe'];
$nom = $_GET['nom'];
$n = 1;
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom de l\'élève</th><th>Matricule</th><th>Date de naissance</th><th>Date d\'entré</th><th>Sexe</th><th>Nationalité</th><th>Adresse</th><th>Nom du tutteur</th><th>Téléphone tutteur</th></tr>
  </thead>';
if($sexe == '' && $nom == ''){
    $se = "SELECT * FROM eleves ";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
           
            echo '<tr><td>'.$n.'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['matricule'].'</td><td>'.$sele['datenaiss_eleve'].'</td><td>'.$sele['dateentre_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nationalite_eleve'].'</td><td>'.$sele['adresse_eleve'].'</td><td>'.$sele['nomtitteur'].'</td><td>'.$sele['telephonetitteur'].'</td></tr>';
            $n++;
        }
    }
}else if($sexe != '' && $nom == ''){
    $se = "SELECT * FROM eleves where sexe_eleve='$sexe'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
           
            echo '<tr><td>'.$n.'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['matricule'].'</td><td>'.$sele['datenaiss_eleve'].'</td><td>'.$sele['dateentre_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nationalite_eleve'].'</td><td>'.$sele['adresse_eleve'].'</td><td>'.$sele['nomtitteur'].'</td><td>'.$sele['telephonetitteur'].'</td></tr>';
            $n++;
        }
    }
}else if($sexe == '' && $nom != ''){
    $se = "SELECT * FROM eleves where nom_eleve LIKE '%$nom%'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
           
            echo '<tr><td>'.$n.'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['matricule'].'</td><td>'.$sele['datenaiss_eleve'].'</td><td>'.$sele['dateentre_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nationalite_eleve'].'</td><td>'.$sele['adresse_eleve'].'</td><td>'.$sele['nomtitteur'].'</td><td>'.$sele['telephonetitteur'].'</td></tr>';
            $n++;
        }
    }
}else if($sexe != '' && $nom != ''){
    $se = "SELECT * FROM eleves where nom_eleve LIKE '%$nom%' AND sexe_eleve='$sexe'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
           
            echo '<tr><td>'.$n.'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['matricule'].'</td><td>'.$sele['datenaiss_eleve'].'</td><td>'.$sele['dateentre_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nationalite_eleve'].'</td><td>'.$sele['adresse_eleve'].'</td><td>'.$sele['nomtitteur'].'</td><td>'.$sele['telephonetitteur'].'</td></tr>';
            $n++;
        }
    }
}
echo '</table>';
?>