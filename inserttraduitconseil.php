<?php
require('connect.php');
$matricule = $_POST['matricule'];
$session = $_POST['session'];
$idclasse = $_POST['idclasse'];
$idconseil = $_POST['idconseil'];
$motif = $_POST['motif'];
$date = date('Y/m/d');
if($motif == ''){
    echo '<div class="alert alert-danger bg-danger alert-dismissible fade show text-light" role="alert" style="font-size:14px">
    Veuillez entrer le motif de la traduction au conseil disciplinaire <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else{
$se = "SELECT *,count(id_traduit) as nbretr FROM traduitconseil WHERE matricule='$matricule' AND id_conseil='$idconseil'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
       $nbretr = $sele['nbretr'];
       if($nbretr < 1){
        $in = "INSERT INTO traduitconseil VALUES('','$matricule','$idclasse','$idconseil','$motif','$date','$session')";
        if($ins = $connec -> exec($in)){
            echo '<div class="alert alert-success bg-success alert-dismissible fade show text-light" role="alert" style="font-size:14px">
            Nouvel élève traduit au conseil de discipline <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';   
        }
       }else if($nbretr >= 1){
        echo '<div class="alert alert-danger bg-danger alert-dismissible fade show text-light" role="alert" style="font-size:14px">
        Cet élève a déjà été traduit à ce conseil de discipline. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
       }
    }
}
}
?>