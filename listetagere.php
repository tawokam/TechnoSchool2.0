<?php
require('connect.php');
$n = 1;

?>
<div class="card" style="width:100%;">
<div class="card-body">

  <h5 class="card-title">Liste des étagères</h5>
  <?php
  echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
  <thead class="table-primary">
    <tr><th>N°</th><th> Nom de létagère</th><th>Nombre de livre</th></tr>
    </thead>';
$se = "SELECT * FROM etageres";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo '<tr><td>'.$n.'</td><td>'.$sele['nom_etagere'].'</td><td></td></tr>';
        $n++;
    }
}
echo '</table>'
?>