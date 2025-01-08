<?php
require('connect.php');
$ident = $_GET['ident'];

$typ = '';
$hpd = '';
$hpf = '';
$ve = "SELECT * FROM periode where id_periode='$ident'";
if($ver = $connec -> query($ve)){
  while($veri = $ver -> fetch()){
    $typ = $veri['typeperiode'];
    $hpd = $veri['heuredebut'];
    $hpf = $veri['heurefin'];
  }
}
$identprog = 0;
$p = "SELECT * FROM programme where heuredebut='$hpd' AND heurefin='$hpf'";
if($pr = $connec -> query($p)){
  while($pro = $pr -> fetch()){
    $identprog = $pro['id_programme'];
  }
}
if($typ == 'pause'){
    $su = "DELETE FROM programme where id_programme='$identprog'";
    if($sup = $connec -> query($su)){}
}else{}
$de = "DELETE FROM periode where id_periode='$ident'";
if($del = $connec -> query($de)){
    
}

?>