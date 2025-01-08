<?php
require('connect.php');
$idconseil = $_GET['idconseil'];
$se = "SELECT *,count(id_conseil) as nbret FROM traduitconseil WHERE id_conseil='$idconseil'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      $nbret = $sele['nbret'];
      if($nbret < 1){
        $de = "DELETE FROM conseil WHERE id_conseil='$idconseil'";
        if($del = $connec -> query($de)){}
      }else if($nbret >= 1){

      }
    }
}

?>