<?php
require('connect.php');
    $se = "SELECT *,count(id_session) as nbre FROM tabsession ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
          $nbre = $sele['nbre'];
          if($nbre < 1){
            echo 'Aucune session enregistré';
          }
          else if($nbre >= 1){
            echo $nbre.' session(s) enregistrée(s)';
          }
        }
    }
?>