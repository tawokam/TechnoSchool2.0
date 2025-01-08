<?php
require('connect.php');
echo '<div class="card" style="width:100%;">
<div class="card-body">
  <h5 class="card-title">Liste des types de livre pour modification</h5>';
  echo '  <div class="alert alert-info bg-info text-light" role="alert" style="font-size: 12px;">
  Veuillez cliquez sur le type de livre que vous souhaitez modifier pour accéder au formulaire de modification
</div>';
  $n = 1;
  echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
  <thead class="table-primary">
    <tr><th>N°</th><th> Nom du type de livre</th></tr>
    </thead>';
    $se = "SELECT * FROM typelivre";
    if($sel = $connec -> query($se)){
       while($sele = $sel -> fetch()){
        echo '<tr style="cursor:pointer" class="linejustabsent" id="'.$sele['id_typelivre'].'" onclick="formmodiftyplivre(this.id)"><td>'.$n.'</td><td>'.$sele['nom_typelivre'].'</td></tr>';
        $n++;
       }
    }
  echo '</div></div>';
?>