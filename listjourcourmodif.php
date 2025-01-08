<?php
require('connect.php');
$n = 1;
echo '<div class="alert alert-dark" role="alert" style="font-size:12px">
Cliquez sur modifier si vous souhaitez modifier le nom d\'un jour.
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th></th><th>N°</th><th> Nom du jour</th></tr>
  </thead>';
$se = "SELECT * FROM jours";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo '<tr><td style="cursor:pointer;color:gray;width:100px" id="'.$sele['id_jour'].'" onclick="formmodifjour(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.ucwords($sele['nom_jour']).'</td></tr>';
        $n++;
    }
}

?>