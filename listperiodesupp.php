<?php
require('connect.php');
$n = 1;
echo '<div class="alert alert-dark" role="alert" style="font-size:12px">
Cliquez sur effacer de la ligne de la période que vous souhaitez supprimer. 
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th></th><th>N°</th><th> Heure de début</th><th> Heure de fin</th><th>type de période</th></tr>
  </thead>';
$se = "SELECT * FROM periode";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo '<tr><td style="cursor:pointer;color:gray;width:100px" id="'.$sele['id_periode'].'" onclick="supplistperiode(this.id)"><i class="bi bi-trash3-fill text-danger"></i> Effacer</td><td>'.$n.'</td><td>'.$sele['heuredebut'].'</td><td>'.$sele['heurefin'].'</td><td>'.$sele['typeperiode'].'</td></tr>';
        $n++;
    }
}

?>