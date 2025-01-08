<?php
require('connect.php');
    $se = "SELECT *,count(id_section) as nbre FROM tabsection ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
          $nbre = $sele['nbre'];
          if($nbre < 1){
            echo 'Aucune section enregistré';
          }
          else if($nbre >= 1){
            echo $nbre.' section(s) enregistrée(s)';
          }
        }
    }
?>