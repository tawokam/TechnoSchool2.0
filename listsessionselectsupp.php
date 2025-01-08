<?php
require('connect.php');
$ident = $_GET['ident'];
$ve = "SELECT * FROM tabsession where id_session='$ident'";
if($ver = $connec->query($ve)){
    while($vere = $ver->fetch()){
        $check = $vere['selecte'];
        if($check == ''){
            $se = "UPDATE tabsession SET selecte='check' where id_session='$ident'";
            if($sel = $connec->query($se)){
                echo 'oui';
            }
        }else if($check != ''){
            $se = "UPDATE tabsession SET selecte='' where id_session='$ident'";
            if($sel = $connec->query($se)){
                echo 'non';
            }
        }
    }
}

?>