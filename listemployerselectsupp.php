<?php
require('connect.php');
$ident = $_GET['ident'];
$ve = "SELECT * FROM employer where id_employer='$ident'";
if($ver = $connec->query($ve)){
    while($vere = $ver->fetch()){
        $check = $vere['selecte'];
        if($check == ''){
            $se = "UPDATE employer SET selecte='check' where id_employer='$ident'";
            if($sel = $connec->query($se)){
                echo 'oui';
            }
        }else if($check != ''){
            $se = "UPDATE employer SET selecte='' where id_employer='$ident'";
            if($sel = $connec->query($se)){
                echo 'non';
            }
        }
    }
}

?>