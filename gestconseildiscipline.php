<?php
require('connect.php');
$session = $_GET['session'];
echo '<div class="card" style="width:100%;">
<div class="card-body">
  <h5 class="card-title">Nouveau conseil de discipline</h5>
';
echo '<form class="row g-3">
<div class="col-md-4">
<label for="lieuconseil" class="form-label">Lieu/Salle du conseil</label>
<input type="text" class="form-control" id="lieuconseil" style="border:0.5px solid gray">
</div>
<div class="col-md-3">
<label for="dateconseil" class="form-label">Date du conseil</label>
<input type="date" class="form-control" id="dateconseil" style="border:0.5px solid gray">
</div>
<div class="col-md-3">
<label for="heurconseil" class="form-label">Heure du conseil</label>
<input type="time" class="form-control" id="heurconseil" style="border:0.5px solid gray">
</div>
<div class="col-md-2">
<label for="btn" class="form-label" style="visibility:hidden">lorem10</label><br>
<button type="button" class="btn btn-primary" onclick="insertnewconseil()">Enregistrer</button>
</div></form>
';
echo '<br/><div id="resultinsertconseil"></div>';
echo '<h5 class="card-title">Liste des conseil de discipline programmé</h5>';
echo '<div id="zoneaffichconseil">';
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
  echo '</table></div>';
echo '</div></div>';
?>