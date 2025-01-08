<?php
try {
    if(require('connect.php')){
        $id = $_GET['id'];
        $se = "SELECT nom_employer, photo_employer FROM employer WHERE id_employer='$id'";
        if($sel = $connec -> query($se)){
            while($sele = $sel -> fetch()){
                echo $sele['nom_employer'];
            }
        }
    }
} catch (Exception $ex) {
    echo 'Erreur Serveur';
}
?>