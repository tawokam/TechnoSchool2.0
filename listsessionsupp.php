<?php
require('connect.php');

$su = "DELETE FROM tabsession where selecte='check'";
if($sup = $connec -> query($su)){}
$n = 1;
echo '<div class="alert alert-dark" role="alert" id="comptsession" style="font-size:14px">
Après suppression d\'une session, toutes les informations (inscription, scolarité, etc.) rattachées à cette session seront perdues et ne pourront plus être récupérées.
</div><br/>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th colspan=2></th><th>N°</th><th> Nom de la session</th></tr>
  </thead>';
    $se = "SELECT * FROM tabsession ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
           
            echo '<tr id="ligne'.$sele['id_session'].'"><td style="width:20px"><input class="form-check-input" id="'.$sele['id_session'].'" onchange="listsessionselectsupp(this.id)" style="border:1px solid blue" type="checkbox"></td><td style="cursor:pointer;color:gray;width:100px" id="'.$sele['id_session'].'" onclick="supplignsession(this.id)"><i class="bi bi-trash3-fill text-danger"></i> Effacer</td><td>'.$n.'</td><td>'.$sele['nom_session'].'</td></tr>';
            $n++;
        }
    }
?>