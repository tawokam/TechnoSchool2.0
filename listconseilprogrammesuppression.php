<?php
require('connect.php');
echo '<div class="alert alert-dark bg-secondary text-light" role="alert" style="font-size: 12px;">
Si vous souhaitez effacer un conseil, assurez-vous qu\'aucun élève n\'a été programmé à ce conseil disciplinaire.   
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Lieu / Salle</th><th>Date</th><th>Heure</th><th>Numéro</th><th>Action</th></tr>
  </thead>';
  $n = 1;
  $date = date('Y/m/d');
  $session = $_GET['session'];
  $se = "SELECT * FROM conseil where session='$session' AND date_conseil > $date order by date_conseil desc";
  if($sel = $connec->query($se)){
      while($sele = $sel->fetch()){

          echo '<tr><td>'.$n.'</td><td>'.$sele['lieu'].'</td><td>'.$sele['date_conseil'].'</td><td>'.$sele['heure_conseil'].'</td><td>'.$sele['numero'].'</td><td id="'.$sele['id_conseil'].'" onclick="suppconseilprogramme(this.id)" style="cursor:pointer"><i class="bi bi-trash3-fill text-danger"></i> Effacer</td></tr>';
          $n++;
      }
  }
?>