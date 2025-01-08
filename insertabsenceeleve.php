<?php
require('connect.php');
$heurfin = $_POST['heurfin'];
$heuredebut = $_POST['heuredebut'];
$classe = $_POST['classe'];
$matricule = $_POST['matricule'];
$session = $_POST['session'];
$date = date('Y/m/d');
$JOURF = date('l');
$matier = 0;
$jrfran = '';
if($JOURF == 'Monday'){
    $jrfran = 'lundi';
}else if($JOURF == 'Tuesday'){
    $jrfran = 'mardi';
}else if($JOURF == 'Wednesday'){
    $jrfran = 'mercredi';
}else if($JOURF == 'Thursday'){
    $jrfran = 'jeudi';
}else if($JOURF == 'Friday'){
    $jrfran = 'vendredi';
}else if($JOURF == 'Saturday'){
    $jrfran = 'samedi';
}
$ma = "SELECT * FROM programme WHERE heuredebut='$heuredebut' AND heurefin='$heurfin' AND jour='$jrfran'";
if($mat = $connec -> query($ma)){
   while($mati = $mat -> fetch()){
      $matier = $mati['id_matiere'];
   }
}
if($matier == 0){

   echo '<div class="alert alert-danger bg-danger text-light alert-dismissible fade show" style="font-size:12px" role="alert">
   Aucun enseignant n\'a été programmé aujourd\'hui dans cette classe et à cette période.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>'; 
}else{
$se = "SELECT *,count(id_absence) as nbre FROM absence WHERE heuredebut='$heuredebut' AND heurefin='$heurfin' AND date_absence='$date' AND matricule='$matricule'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
     $nbre = $sele['nbre'];
     if($nbre < 1){
        $in = "INSERT INTO absence VALUES('','$heuredebut','$heurfin','$date','$matricule','$classe','$matier','non justifier','$session','0')";
        if($ins = $connec -> exec($in)){

        }
     }else if($nbre >= 1){
        $de = "DELETE FROM absence WHERE date_absence='$date' AND matricule='$matricule' AND id_classe='$classe' AND heuredebut='$heuredebut' AND heurefin='$heurfin'";
        if($del = $connec -> query($de)){}
     }
    }
}
}
?>