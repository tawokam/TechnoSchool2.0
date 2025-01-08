<?php
require('connect.php');
$sanctioneleve = $_POST['sanctioneleve'];

$idconseil = $_POST['idconseil'];
$matricule = $_POST['matricule'];
$se = "SELECT *,count(id_decision) as nbre FROM decisiondisciplinaire WHERE id_conseil='$idconseil' AND matricule='$matricule'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
       $nbre = $sele['nbre'];
       if($nbre < 1){
         if($sanctioneleve == 'L\'exclusion temporaire de la classe' || $sanctioneleve == 'L\'exclusion temporaire de l\'établissement'){
            $nbrejoursanction = $_POST['nbrejoursanction'];
            $datedebutsanction = $_POST['datedebutsanction'];
$calculdate = $datedebutsanction+$nbrejoursanction;
$datefin = $calculdate;
echo $datefin;

            //$in = "INSERT INTO decisiondisciplinaire VALUES('','$idconseil','$matricule','$sanctioneleve','$nbrejoursanction','$datedebutsanction')";
         }
       }else if($nbre >= 1){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        La décision de ce conseil disciplinaire consernent cet élève a déja été enregistrer <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
       }
    }
}
?>