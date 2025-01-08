<?php
require('connect.php');
$heuredeubutprogram = $_POST['heuredeubutprogram'];
$heurefinprogram = $_POST['heurefinprogram'];
if($heurefinprogram == '' && $heuredeubutprogram == ''){

}else if($heurefinprogram != '' && $heuredeubutprogram == ''){
    
}else if($heurefinprogram == '' && $heuredeubutprogram != ''){
    
}else if($heurefinprogram != '' && $heuredeubutprogram != ''){
    $debut = strtotime($heuredeubutprogram);
    $fin = strtotime($heurefinprogram);
    $temps = $fin - $debut;
    $heure = round(($temps/60)/60,2);
    echo $heure;
}
?>