<?php
require('connect.php');
echo '<div class="alert alert-dark bg-secondary text-light" role="alert" style="font-size: 12px;">
Veuillez sélectionner un conseil de discipline pour accéder à la liste des élèves traduits à ce conseil de discipline.
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Lieu / Salle</th><th>Date</th><th>Heure</th><th>Numéro</th></tr>
  </thead>';
  $n = 1;
  $session = $_GET['session'];
  $se = "SELECT * FROM conseil where session='$session' order by date_conseil desc";
  if($sel = $connec->query($se)){
      while($sele = $sel->fetch()){

          echo '<tr id="'.$sele['id_conseil'].'" onclick="listeleveconseilx(this.id)" style="cursor:pointer" class="linejustabsent"><td>'.$n.'</td><td>'.$sele['lieu'].'</td><td>'.$sele['date_conseil'].'</td><td>'.$sele['heure_conseil'].'</td><td>'.$sele['numero'].'</td></tr>';
          $n++;
      }
  }
?>