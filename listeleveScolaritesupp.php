<?php
require('connect.php');
$nom = $_GET['nom'];
$session = $_GET['session'];
$classe = $_GET['classe'];
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th></th><th>N°</th><th>Matricule</th><th>Nom</th><th>Sexe</th><th>Section</th><th>Classe</th><th>Montant de la scolarité</th><th>Montant versé</th><th>Reste</th></tr>
  </thead>';
  $nbr = 1;
  if($nom == ''){
    if($classe == ''){
$se = "SELECT scolarite.id_scolarite,eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,scolarite.montscolarite,scolarite.montverse,scolarite.restescolarite,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section,scolarite.matricule FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section inner join scolarite on inscription.matricule=scolarite.matricule where inscription.nom_session = '$session'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        ?>
                  <tr><td style="cursor:pointer;color:gray;width:100px;font-size:12px" id="<?php echo $sele['matricule'];?>" onclick="versementScolaritesupp(this.id,<?php echo $sele['id_scolarite'];?>)"><i class="bi bi-trash3-fill text-danger"></i> Effacer</td><td><?php echo $nbr;?></td><td><?php echo $sele['matricule'];?></td><td><?php echo $sele['nom_eleve'];?></td><td><?php echo $sele['sexe_eleve'];?></td><td><?php echo $sele['nom_section'];?></td><td><?php echo $sele['nom_classe'];?></td><td><?php echo $sele['montscolarite'];?></td><td><?php echo $sele['montverse'];?></td><td><?php echo $sele['restescolarite'];?></td></tr>
        <?php
        $nbr++;
    }
}
}else if($classe != ''){
        $se = "SELECT scolarite.id_scolarite,eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,scolarite.montscolarite,scolarite.montverse,scolarite.restescolarite,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section,scolarite.matricule FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section inner join scolarite on inscription.matricule=scolarite.matricule where inscription.nom_session = '$session' AND inscription.id_classe='$classe'";
        if($sel = $connec -> query($se)){
            while($sele = $sel -> fetch()){
              ?>
                <tr><td style="cursor:pointer;color:gray;width:100px;font-size:12px" id="<?php echo $sele['matricule'];?>" onclick="versementScolaritesupp(this.id,<?php echo $sele['id_scolarite'];?>)"><i class="bi bi-trash3-fill text-danger"></i> Effacer</td><td><?php echo $nbr;?></td><td><?php echo $sele['matricule'];?></td><td><?php echo $sele['nom_eleve'];?></td><td><?php echo $sele['sexe_eleve'];?></td><td><?php echo $sele['nom_section'];?></td><td><?php echo $sele['nom_classe'];?></td><td><?php echo $sele['montscolarite'];?></td><td><?php echo $sele['montverse'];?></td><td><?php echo $sele['restescolarite'];?></td></tr>
             <?php
                $nbr++;
           }
        }
}
}else if($nom != ''){
    if($classe == ''){
    $se = "SELECT scolarite.id_scolarite,eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,scolarite.montscolarite,scolarite.montverse,scolarite.restescolarite,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section,scolarite.matricule FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section inner join scolarite on inscription.matricule=scolarite.matricule where inscription.nom_session = '$session' AND eleves.nom_eleve LIKE '%$nom%'";
    if($sel = $connec -> query($se)){
      while($sele = $sel -> fetch()){
        ?>
        <tr><td style="cursor:pointer;color:gray;width:100px;font-size:12px" id="<?php echo $sele['matricule'];?>" onclick="versementScolaritesupp(this.id,<?php echo $sele['id_scolarite'];?>)"><i class="bi bi-trash3-fill text-danger"></i> Effacer</td><td><?php echo $nbr;?></td><td><?php echo $sele['matricule'];?></td><td><?php echo $sele['nom_eleve'];?></td><td><?php echo $sele['sexe_eleve'];?></td><td><?php echo $sele['nom_section'];?></td><td><?php echo $sele['nom_classe'];?></td><td><?php echo $sele['montscolarite'];?></td><td><?php echo $sele['montverse'];?></td><td><?php echo $sele['restescolarite'];?></td></tr>
        <?php
        $nbr++;
      }
    }
}else if($classe != ''){
    $se = "SELECT scolarite.id_scolarite,eleves.sexe_eleve,inscription.matricule,inscription.id_section,inscription.id_classe,scolarite.montscolarite,scolarite.montverse,scolarite.restescolarite,inscription.nom_session,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe,tabsection.id_section,tabsection.nom_section,scolarite.matricule FROM inscription inner join eleves on inscription.matricule = eleves.matricule inner join classe on inscription.id_classe = classe.id_classe inner join tabsection on inscription.id_section = tabsection.id_section inner join scolarite on inscription.matricule=scolarite.matricule where inscription.nom_session = '$session' AND eleves.nom_eleve LIKE '%$nom%' AND inscription.id_classe='$classe'";
    if($sel = $connec -> query($se)){
      while($sele = $sel -> fetch()){
        ?>
        <tr><td style="cursor:pointer;color:gray;width:100px;font-size:12px" id="<?php echo $sele['matricule'];?>" onclick="versementScolaritesupp(this.id,<?php echo $sele['id_scolarite'];?>)"><i class="bi bi-trash3-fill text-danger"></i> Effacer</td><td><?php echo $nbr;?></td><td><?php echo $sele['matricule'];?></td><td><?php echo $sele['nom_eleve'];?></td><td><?php echo $sele['sexe_eleve'];?></td><td><?php echo $sele['nom_section'];?></td><td><?php echo $sele['nom_classe'];?></td><td><?php echo $sele['montscolarite'];?></td><td><?php echo $sele['montverse'];?></td><td><?php echo $sele['restescolarite'];?></td></tr>
       <?php
        $nbr++;
      }
    }
}
}
echo '</table>';
?>