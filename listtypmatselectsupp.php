<?php
require('connect.php');
$ident = $_GET['ident'];
$ve = "SELECT * FROM typematiere where id_typmat='$ident'";
if($ver = $connec -> query($ve)){
    while($vere = $ver -> fetch()){
        $check = $vere['selecte'];
        if($check == ''){
            $se = "UPDATE typematiere SET selecte='check' where id_typmat='$ident'";
            if($sel = $connec -> query($se)){
                echo 'oui';
            }
        }else if($check != ''){
            $se = "UPDATE typematiere SET selecte='' where id_typmat='$ident'";
            if($sel = $connec -> query($se)){
                echo 'non';
            }
        }
    }
}

?>