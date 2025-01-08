<?php
require('connect.php');
$ident = $_GET['ident'];
$ve = "SELECT * FROM matieres where id_matiere='$ident'";
if($ver = $connec->query($ve)){
    while($vere = $ver->fetch()){
        $check = $vere['selecte'];
        if($check == ''){
            $se = "UPDATE matieres SET selecte='check' where id_matiere='$ident'";
            if($sel = $connec->query($se)){
                echo 'oui';
            }
        }else if($check != ''){
            $se = "UPDATE matieres SET selecte='' where id_matiere='$ident'";
            if($sel = $connec->query($se)){
                echo 'non';
            }
        }
    }
}

?>