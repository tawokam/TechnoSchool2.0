<?php
require('connect.php');
echo '<div class="alert alert-dark bg-secondary text-light" role="alert" style="font-size: 12px;">
Veuillez cliquer sur modifier de la ligne concernée pour valider la modification.
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Lieu / Salle</th><th>Date</th><th>Heure</th><th>Action</th></tr>
  </thead>';
  $n = 1;
  $session = $_GET['session'];
  $se = "SELECT * FROM conseil where session='$session' order by date_conseil desc";
  if($sel = $connec->query($se)){
      while($sele = $sel->fetch()){

          echo '<tr ><td>'.$n.'</td><td><input type="text" value="'.$sele['lieu'].'" class="form-control" style="border:0px" id="lieumodifdiscipline"></td><td><input type="date" value="'.$sele['date_conseil'].'" class="form-control" style="border:0px" id="datemodifdiscipline"></td><td><input type="time" value="'.$sele['heure_conseil'].'" class="form-control" style="border:0px" id="heuremodifdiscipline"></td><td  id="'.$sele['id_conseil'].'" style="cursor:pointer" onclick="insertmodifconseilprogramme(this.id)"> <i class="bi bi-pencil-fill text-warning"></i> Modifier</td></tr>';
          $n++;
      }
  }
?>