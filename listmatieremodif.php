<?php
require('connect.php');
$search = $_GET['search'];
$n = 1;
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th></th><th>N°</th><th> Nom de la matiere</th><th>Type de matière</th></tr>
  </thead>';
  if($search == ''){
  $se = "SELECT typematiere.id_typmat,typematiere.nom_typmat,matieres.id_typmat,matieres.nom_matiere,matieres.id_matiere FROM matieres inner join typematiere on matieres.id_typmat=typematiere.id_typmat ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
           
            echo '<tr ><td style="cursor:pointer;color:gray;width:100px" id="'.$sele['id_matiere'].'" onclick="formmatieremodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.$sele['nom_matiere'].'</td><td>'.$sele['nom_typmat'].'</td></tr>';
            $n++;
        }
    }
}
 else if($search != ''){
  $se = "SELECT typematiere.id_typmat,typematiere.nom_typmat,matieres.id_typmat,matieres.nom_matiere,matieres.id_matiere FROM matieres inner join typematiere on matieres.id_typmat=typematiere.id_typmat where matieres.id_typmat='$search'";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
           
            echo '<tr ><td style="cursor:pointer;color:gray;width:100px" id="'.$sele['id_matiere'].'" onclick="formmatieremodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.$sele['nom_matiere'].'</td><td>'.$sele['nom_typmat'].'</td></tr>';
            $n++;
        }
    }
}
?>