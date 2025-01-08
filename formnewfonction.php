<?php
require('connect.php');
?>
<br/>
<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom de la fonction</th><th>Inscription</th><th>Scolarité</th><th>Gestion enseignents</th><th>Discipline des élèves</th><th>Enseignement</th><th>Autres</th></tr>
  </thead>
  <?php
  $n = 1;
  $se = "SELECT * FROM fonction ";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
      
      echo '<tr><td>'.$n.'</td><td>'.ucwords($sele['nom_fonction']).'</td><td>'.$sele['inscription'].'</td><td>'.$sele['scolarite'].'</td><td>'.$sele['gest_enseignent'].'</td><td>'.$sele['discipline_eleves'].'</td><td>'.$sele['enseignement'].'</td><td>'.$sele['autres'].'</td></tr>';
    $n++;
    }
  }
  ?>
</table>

<?php

?>