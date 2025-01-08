<?php
require('connect.php');
    $se = "SELECT *,count(id_typmat) as nbre FROM typematiere ";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
          $nbre = $sele['nbre'];
          if($nbre < 1){
            echo 'Aucun type de matières enregistré';
          }
          else if($nbre >= 1){
            echo $nbre.' type(s) de matière enregistré(s)';
          }
        }
    }
?>