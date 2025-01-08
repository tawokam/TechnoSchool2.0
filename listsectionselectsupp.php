<?php
require('connect.php');
$ident = $_GET['ident'];
$ve = "SELECT * FROM tabsection where id_section='$ident'";
if($ver = $connec->query($ve)){
    while($vere = $ver->fetch()){
        $check = $vere['selecte'];
        if($check == ''){
            $se = "UPDATE tabsection SET selecte='check' where id_section='$ident'";
            if($sel = $connec->query($se)){
                echo 'oui';
            }
        }else if($check != ''){
            $se = "UPDATE tabsection SET selecte='' where id_section='$ident'";
            if($sel = $connec->query($se)){
                echo 'non';
            }
        }
    }
}

?>