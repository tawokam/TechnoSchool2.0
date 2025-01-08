<?php
require('connect.php');
$ident = $_GET['ident'];
$ve = "SELECT * FROM eleves where id_eleve='$ident'";
if($ver = $connec -> query($ve)){
    while($vere = $ver -> fetch()){
        $check = $vere['selecte'];
        if($check == ''){
            $se = "UPDATE eleves SET selecte='check' where id_eleve='$ident'";
            if($sel = $connec->query($se)){
                echo 'oui';
            }
        }else if($check != ''){
            $se = "UPDATE eleves SET selecte='' where id_eleve='$ident'";
            if($sel = $connec->query($se)){
                echo 'non';
            }
        }
    }
}

?>