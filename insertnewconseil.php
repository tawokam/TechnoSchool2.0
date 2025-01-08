<?php
require('connect.php');
$session = $_POST['session'];
$lieu = $_POST['lieu'];
$heurconseil = $_POST['heurconseil'];
$date = $_POST['date'];
$se = "SELECT *,count(id_conseil) as nbrec FROM conseil WHERE date_conseil='$date'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
      $nbrec = $sele['nbrec'];
      if($nbrec < 1){
        $ma = "SELECT *,MAX(numero) as maxnum FROM conseil";
        if($max = $connec -> query($ma)){
            while($maxi = $max -> fetch()){
                $maximum = $maxi['maxnum']+1;
                $in = "INSERT INTO conseil VALUES('','$lieu','$date','$heurconseil','$session','$maximum')";
                if($ins = $connec -> exec($in)){
                }
            }
        }
      }else if($nbrec >= 1){
        echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" style="font-size:12px" role="alert">
          Un conseil de discipline a déjà été programmé à cette date.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
      }
    }
}

?>