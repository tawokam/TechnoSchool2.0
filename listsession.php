<?php
require('connect.php');

$n = 1;
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom de la session</th></tr>
  </thead>';

    $se = "SELECT * FROM tabsession ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
           
            echo '<tr><td>'.$n.'</td><td>'.$sele['nom_session'].'</td></tr>';
            $n++;
        }
    }
?>