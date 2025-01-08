<?php
require('connect.php');
$ident = $_POST['ident'];
$matiereprogramme = $_POST['matiereprogramme'];
$classeprogramme = $_POST['classeprogramme'];
$jourprogramme = $_POST['jourprogramme'];
$heuredeubutprogram =  $_POST['heuredeubutprogram'];
$heurefinprogram =  $_POST['heurefinprogram'];
$paieheurprogram = $_POST['paieheurprogram'];
$session = $_POST['session'];
$identprogram = $_POST['identprogram'];


    $sitablevide = 0;
    $co = "SELECT *,count(id_programme) as nbreprog FROM programme where heuredebut='$heuredeubutprogram' AND heurefin='$heurefinprogram' AND jour='$jourprogramme' AND id_programme<>'$identprogram'";
    if($com = $connec -> query($co)){
        while($comp = $com -> fetch()){
            $nbre = $comp['nbreprog'];
            if($nbre < 1){
              $sitablevide = 2;
            }else if($nbre >=1){
                $sitablevide = 1;

            }
        }
    }
    if($sitablevide == 1){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Echec. La période choisi appartient déja a un autre professeur<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'; 
        }
    else if($sitablevide == 2){
    $in = "UPDATE programme SET id_matiere='$matiereprogramme',id_employer='$ident',jour='$jourprogramme',heuredebut='$heuredeubutprogram',heurefin='$heurefinprogram',payeheure='$paieheurprogram' where id_programme='$identprogram'";
    if($ins = $connec -> query($in)){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Le professeur a été programmé avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else{echo 'echec2';}
}

?>