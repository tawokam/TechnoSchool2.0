<?php
require('connect.php');
$ident = $_POST['ident'];
//------------Affiche la classe ----------------//
$cl = "SELECT classe.id_classe,classe.id_section,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section=tabsection.id_section where classe.id_classe = '$ident'";
if($cla = $connec -> query($cl)){
    while($clas = $cla -> fetch()){

        echo '<div class="alert alert-success" role="alert" style="font-size:15px">
        Liste des enseignants programmés dans la classe de <strong>'.$clas['nom_classe'].'</strong> pour une suppression
        </div>';
    }
}
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:12px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Heure de debut</th><th>Heure de fin</th><th>Jours</th><th>Professeur</th><th>Matière</th><th>Suppression</th>
  </thead>';
$n = 1;
  $se = "SELECT programme.id_programme,programme.heuredebut,programme.heurefin,programme.jour,programme.id_employer,programme.id_matiere,programme.id_classe,matieres.id_matiere,matieres.nom_matiere,employer.id_employer,employer.nom_employer FROM programme inner join matieres on programme.id_matiere=matieres.id_matiere inner join employer on programme.id_employer=employer.id_employer where programme.id_classe='$ident'";
  if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        $identprogram = $sele['id_programme'];
        ?>
    <tr style="text-align: center;"><td><?php echo $n;?></td>
    <td>
  <?php echo $sele['heuredebut'];?>
    </td>
    <td>
    <?php echo $sele['heurefin'];?>
</td>
    <td>
    <?php echo $sele['jour'];?>
    </td>
    <td>
    <?php echo $sele['nom_employer'];?>

    </td>
    <td>
    <?php echo $sele['nom_matiere'];?>
    </td>
    <td class="text-danger fw-bold" style="cursor:pointer" onclick="suppprogramprof(<?php echo $ident;?>,<?php echo $identprogram;?>)">
    <i class="bi bi-trash-fill text-danger"></i> Supprimer
    </td>
</tr>

      <?php
      $n ++;
    }
  }

  ?>