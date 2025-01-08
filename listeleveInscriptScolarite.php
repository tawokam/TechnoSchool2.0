<?php
require('connect.php');
$nom = $_GET['nom'];
$session = $_GET['session'];
$classe = $_GET['classe'];
echo '<div class="alert" role="alert" style="font-size:14px;background:rgb(204, 209, 220);">
Cliquez sur l\'élève pour lequel vous souhaitez effectuer le versement afin d\'avoir accès au formulaire de versement scolaire.
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Matricule</th><th>Nom</th><th>Classe</th><th>Sexe</th><th>Nationalité</th><th>Adresse</th></tr>
  </thead>';
$n = 1;
if($nom == ''){
    if($classe == ''){
    $se = "SELECT inscription.resteinscription,inscription.etatinscription,inscription.nom_session,inscription.id_classe,classe.id_classe,classe.nom_classe,eleves.matricule,eleves.nom_eleve,eleves.nationalite_eleve,eleves.adresse_eleve,eleves.sexe_eleve FROM inscription inner join classe on inscription.id_classe=classe.id_classe inner join eleves on inscription.matricule=eleves.matricule where inscription.nom_session='$session' AND etatinscription='solde' AND resteinscription=0";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
  
            echo '<tr id="'.$sele['matricule'].'" onclick="formverseScolarite(this.id)" style="cursor:pointer"><td>'.$n.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nationalite_eleve'].'</td><td>'.$sele['adresse_eleve'].'</td></tr>';
            $n++;
        }
    }
}else if($classe != ''){
    $se = "SELECT inscription.resteinscription,inscription.etatinscription,inscription.nom_session,inscription.id_classe,classe.id_classe,classe.nom_classe,eleves.matricule,eleves.nom_eleve,eleves.nationalite_eleve,eleves.adresse_eleve,eleves.sexe_eleve FROM inscription inner join classe on inscription.id_classe=classe.id_classe inner join eleves on inscription.matricule=eleves.matricule where inscription.nom_session='$session' AND etatinscription='solde' AND resteinscription=0 AND inscription.id_classe='$classe'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
  
            echo '<tr id="'.$sele['matricule'].'" onclick="formverseScolarite(this.id)" style="cursor:pointer"><td>'.$n.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nationalite_eleve'].'</td><td>'.$sele['adresse_eleve'].'</td></tr>';
            $n++;
        }
    }
}
}
else if($nom != ''){
    if($classe == ''){
    $se = "SELECT inscription.resteinscription,inscription.etatinscription,inscription.nom_session,inscription.id_classe,classe.id_classe,classe.nom_classe,eleves.matricule,eleves.nom_eleve,eleves.nationalite_eleve,eleves.adresse_eleve,eleves.sexe_eleve FROM inscription inner join classe on inscription.id_classe=classe.id_classe inner join eleves on inscription.matricule=eleves.matricule where inscription.nom_session='$session' AND etatinscription='solde' AND resteinscription=0 AND nom_eleve LIKE '%$nom%'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
  
            echo '<tr id="'.$sele['matricule'].'" onclick="formverseScolarite(this.id)" style="cursor:pointer"><td>'.$n.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nationalite_eleve'].'</td><td>'.$sele['adresse_eleve'].'</td></tr>';
            $n++;
        }
    }
}else if($classe != ''){
    $se = "SELECT inscription.resteinscription,inscription.etatinscription,inscription.nom_session,inscription.id_classe,classe.id_classe,classe.nom_classe,eleves.matricule,eleves.nom_eleve,eleves.nationalite_eleve,eleves.adresse_eleve,eleves.sexe_eleve FROM inscription inner join classe on inscription.id_classe=classe.id_classe inner join eleves on inscription.matricule=eleves.matricule where inscription.nom_session='$session' AND etatinscription='solde' AND resteinscription=0 AND nom_eleve LIKE '%$nom%' AND inscription.id_classe='$classe'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
  
            echo '<tr id="'.$sele['matricule'].'" onclick="formverseScolarite(this.id)" style="cursor:pointer"><td>'.$n.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nationalite_eleve'].'</td><td>'.$sele['adresse_eleve'].'</td></tr>';
            $n++;
        }
    }
}
}
?>