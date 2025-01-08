<?php
require('connect.php');
$matricule = $_POST['matricul'];
$classe = $_POST['classe'];
$session = $_POST['session'];
$time = $_POST['time'];
$date = date('Y/m/d');

$se = "SELECT * FROM matieres limit 1";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        $mat = $sele['id_matiere'];
    }
}
$mo = "INSERT INTO absence value('','','','$date','$matricule','$classe','$mat','non justifier','$session','$time')";
if($mod = $connec -> exec($mo)){
   echo 'Absence enregistrer';
}else{echo 'une erreur est survenue ';}

?>