<?php
require('connect.php');
$heurefin = $_POST['heurfin'];
$heuredebut = $_POST['heuredebut'];
$classe = $_POST['classe'];
$date = date('Y/m/d');
echo '<input type="hidden" value="'.$heurefin.'" id="heurfininsertabsence">';
echo '<input type="hidden" value="'.$heuredebut.'" id="heurdebutinsertabsence">';
echo '<input type="hidden" value="'.$classe.'" id="classeinsertabsence">';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Matricule</th><th>Nom</th><th>Action</th></tr>
  </thead>';
  $line = 1;
$se = "SELECT inscription.id_classe,inscription.matricule,eleves.matricule,eleves.nom_eleve FROM inscription inner join eleves on inscription.matricule=eleves.matricule WHERE inscription.id_classe='$classe' order by eleves.nom_eleve  ASC";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
       $matriculeab = $sele['matricule'];
       $siok = 0;
        $si = "SELECT *,count(id_absence) as siok FROM absence where heuredebut='$heuredebut' AND heurefin='$heurefin' AND date_absence='$date' AND matricule='$matriculeab'";
        if($siv = $connec -> query($si)){
            while($siva = $siv -> fetch()){
                $siok = $siva['siok'];
            }
        }
        if($siok < 1){
            echo '<tr  class="bg-light text-dark"><td>'.$line.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td style="cursor:pointer;color:green;font-weight:bold" id="'.$sele['matricule'].'" onclick="insertabsenceeleve(this.id)"><i class="bi bi-person-bounding-box"></i>  Elève present</td></tr>';
        }else if($siok >= 1){
            echo '<tr class="bg-danger text-light" ><td style="color:white">'.$line.'</td><td style="color:white">'.$sele['matricule'].'</td><td style="color:white">'.$sele['nom_eleve'].'</td><td style="cursor:pointer;color:white;font-weight:bold" id="'.$sele['matricule'].'" onclick="insertabsenceeleve(this.id)"><i class="bi bi-person-x"></i> Eleve absent</td></tr>';
        }

     $line++;
    }
}
echo '</table>';
?>