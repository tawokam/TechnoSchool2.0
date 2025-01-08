<?php
require('connect.php');
$nom = $_GET['nom'];
$session = $_GET['session'];
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th colspan=2></th><th>N°</th><th>Matricule</th><th>Nom</th><th>Sexe</th><th>Section</th><th>Classe</th><th>Montant de l\'inscription</th><th>Montant versé</th><th>Reste</th><th>Redoublant</th></tr>
  </thead>';
  $nbr = 1;
  if($nom == ''){
$se = "SELECT inscription.id_inscript,eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,inscription.montinscription,inscription.montverseinscription,inscription.resteinscription,inscription.redouble,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section where inscription.nom_session = '$session'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo '<tr><td style="cursor:pointer;color:gray;width:100px;font-size:12px" id="'.$sele['matricule'].'" onclick="formodifinscription('.$sele['id_inscript'].',this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td style="cursor:pointer;color:green;width:100px;font-size:12px" id="'.$sele['matricule'].'" onclick="affichdetailinscription(this.id)"><i class="bi bi-clipboard-plus-fill text-success"></i> Détails</td><td>'.$nbr.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nom_section'].'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['montinscription'].'</td><td>'.$sele['montverseinscription'].'</td><td>'.$sele['resteinscription'].'</td><td>'.$sele['redouble'].'</td></tr>';
        $nbr++;
    }
}
  }else if($nom != ''){
    $se = "SELECT inscription.id_inscript,eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,inscription.montinscription,inscription.montverseinscription,inscription.resteinscription,inscription.redouble,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section where inscription.nom_session = '$session' AND eleves.nom_eleve LIKE '%$nom%'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo '<tr><td style="cursor:pointer;color:gray;width:100px;font-size:12px" id="'.$sele['matricule'].'" onclick="formodifinscription('.$sele['id_inscript'].',this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td style="cursor:pointer;color:green;width:100px;font-size:12px" id="'.$sele['matricule'].'" onclick="affichdetailinscription(this.id)"><i class="bi bi-clipboard-plus-fill text-success"></i> Détails</td><td>'.$nbr.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nom_section'].'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['montinscription'].'</td><td>'.$sele['montverseinscription'].'</td><td>'.$sele['resteinscription'].'</td><td>'.$sele['redouble'].'</td></tr>';
        $nbr++;
    }
}
  }
echo '</table>';
?>