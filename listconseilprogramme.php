<?php
require('connect.php');
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Lieu/Salle</th><th>Date</th><th>Heure</th><th>Numéro du conseil</th></tr>
  </thead>';
  $nbrecons = 1;
  $se = "SELECT * FROM conseil order by date_conseil desc";
  if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo '<tr><td>'.$nbrecons.'</td><td>'.$sele['lieu'].'</td><td>'.$sele['date_conseil'].'</td><td>'.$sele['heure_conseil'].'</td><td>'.$sele['numero'].'</td></tr>';
        $nbrecons++;
    }
  }
  echo '</table>';