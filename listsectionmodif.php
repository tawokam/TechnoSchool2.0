<?php
require('connect.php');
$n = 1;
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th></th><th>N°</th><th> Nom de la section</th></tr>
  </thead>';
    $se = "SELECT * FROM tabsection ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
           
            echo '<tr ><td style="cursor:pointer;color:gray;width:100px" id="'.$sele['id_section'].'" onclick="formsectionmodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.$sele['nom_section'].'</td></tr>';
            $n++;
        }
    }
?>