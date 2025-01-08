<?php
require('connect.php');
$nom = $_GET['nom'];
$session = $_GET['session'];
$classe = $_GET['classe'];
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Matricule</th><th>Nom</th><th>Sexe</th><th>Section</th><th>Classe</th><th>Montant de la scolarité</th><th>Montant versé</th><th>Reste</th></tr>
  </thead>';
$nbr = 1;
if($nom == ''){
    if($classe == ''){
          $se = "SELECT eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,scolarite.montscolarite,scolarite.montverse,scolarite.restescolarite,scolarite.matricule,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section inner join scolarite on inscription.matricule=scolarite.matricule where inscription.nom_session = '$session'";
          if($sel = $connec -> query($se)){
              while($sele = $sel -> fetch()){
                  echo '<tr ><td>'.$nbr.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nom_section'].'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['montscolarite'].'</td><td>'.$sele['montverse'].'</td><td>'.$sele['restescolarite'].'</td></tr>';
                  $nbr++;
              }
          }
    }else if($classe != ''){
        $se = "SELECT eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,scolarite.montscolarite,scolarite.montverse,scolarite.restescolarite,scolarite.matricule,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section inner join scolarite on inscription.matricule=scolarite.matricule where inscription.nom_session = '$session' AND inscription.id_classe='$classe'";
        if($sel = $connec -> query($se)){
            while($sele = $sel -> fetch()){
                echo '<tr ><td>'.$nbr.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nom_section'].'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['montscolarite'].'</td><td>'.$sele['montverse'].'</td><td>'.$sele['restescolarite'].'</td></tr>';
                $nbr++;
            }
        }
    }
}else if($nom != ''){
    if($classe == ''){
        $se = "SELECT eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,scolarite.montscolarite,scolarite.montverse,scolarite.restescolarite,scolarite.matricule,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section inner join scolarite on inscription.matricule=scolarite.matricule where inscription.nom_session = '$session' AND eleves.nom_eleve LIKE '%$nom%'";
        if($sel = $connec -> query($se)){
            while($sele = $sel -> fetch()){
                echo '<tr ><td>'.$nbr.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nom_section'].'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['montscolarite'].'</td><td>'.$sele['montverse'].'</td><td>'.$sele['restescolarite'].'</td></tr>';
                $nbr++;
            }
        }
  }else if($classe != ''){
      $se = "SELECT eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,scolarite.montscolarite,scolarite.montverse,scolarite.restescolarite,scolarite.matricule,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section inner join scolarite on inscription.matricule=scolarite.matricule where inscription.nom_session = '$session' AND inscription.id_classe='$classe' AND eleves.nom_eleve LIKE '%$nom%'";
      if($sel = $connec -> query($se)){
          while($sele = $sel -> fetch()){
              echo '<tr ><td>'.$nbr.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['sexe_eleve'].'</td><td>'.$sele['nom_section'].'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['montscolarite'].'</td><td>'.$sele['montverse'].'</td><td>'.$sele['restescolarite'].'</td></tr>';
              $nbr++;
          }
      }
  }
}
echo '</table>';

?>