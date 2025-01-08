<?php
require('connect.php');
$debut = $_GET['debut'];

$pe = "SELECT * FROM periode where heuredebut='$debut' ";
if($per = $connec -> query($pe)){
    while($peri = $per -> fetch()){
        echo $peri['heurefin'];
    }
}

?>