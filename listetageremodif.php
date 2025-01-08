<?php
require('connect.php');
$n = 1;

?>
<div class="card" style="width:100%;">
<div class="card-body">

  <h5 class="card-title">Modification des étagères</h5>
  <?php
  echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
  <thead class="table-primary">
    <tr><th>N°</th><th> Nom de l\'étagère</th><th>Action</th></tr>
    </thead>';
$se = "SELECT * FROM etageres";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo '<tr><td>'.$n.'</td><td><input type="text" value="'.$sele['nom_etagere'].'" class="form-control" style="border:0px" id="nometageremodif'.$sele['id_etagere'].'"></td><td style="cursor:pointer" id="'.$sele['id_etagere'].'" onclick="insertetageremodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Valider la modification</td></tr>';
        $n++;
    }
}
echo '</table>'
?>