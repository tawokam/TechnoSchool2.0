<?php
require('connect.php');
$n = 1;
echo '<div class="alert alert-dark" role="alert" style="font-size:12px">
Liste des périodes de cours pour la programmation des professeurs.
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th> Heure de début</th><th> Heure de fin</th><th>type de période</th></tr>
  </thead>';
$se = "SELECT * FROM periode";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo '<tr><td>'.$n.'</td><td>'.$sele['heuredebut'].'</td><td>'.$sele['heurefin'].'</td><td>'.$sele['typeperiode'].'</td></tr>';
        $n++;
    }
}

?>