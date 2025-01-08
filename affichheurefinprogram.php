<?php
require('connect.php');
$heuredebut = $_GET['heuredebut'];
$se = "SELECT * FROM periode where heuredebut='$heuredebut'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo $sele['heurefin'];
    }
}

?>