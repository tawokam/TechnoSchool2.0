<?php
require('connect.php');
$classe = $_GET['classe'];
if($classe != ''){
$se = "SELECT * FROM classe where id_classe='$classe'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo $sele['montinscription'];

    }
}
}else if($classe == ''){

}
?>