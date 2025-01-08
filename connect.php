<?php
$server="mysql:host=127.0.0.1";
$bd="technosoft3";
$util="root";
$mtp="";
$charset="utf8mb4";
$connec=new PDO("$server;dbname=$bd;charset=$charset","$util","$mtp");

?>