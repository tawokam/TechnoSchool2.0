<?php
require('connect.php');
$classe = $_GET['classe'];
$session = $_GET['session'];
$nomcl = '';
$no = "SELECT * FROM classe where id_classe='$classe'";
if($nom = $connec -> query($no)){
    while($nome = $nom -> fetch()){
  $nomcl = $nome['nom_classe'];
    }}
$date = date('Y/m/l');
echo '<div class="card" style="width:100%;">
<div class="card-body">
<h5 class="card-title">Liste des élèves absents pour une possible justification dans la classe de <span style="font-weight:bold;font-size:20px">'.$nomcl.'</span></h5>
';
echo '<div class="alert alert-success bg-success text-light" role="alert" style="font-size: 12px;">
Cliquez sur la ligne d\'absence que vous souhaitez changer de l\'état "non justifié" à l\'état "justifié".
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Matricule</th><th>Nom</th><th>Jour</th><th colspan="2">Période</th><th>Cours</th><th>Date</th></tr>
  </thead>';
  $nb = 1;
  $siline = 0;
$he = "SELECT *,date_absence,date_format(date_absence, '%W') as jour FROM absence where id_classe='$classe' AND session='$session' AND etat='non justifier' order by date_absence desc";
if($heu = $connec -> query($he)){
    while($heur = $heu -> fetch()){
        $siline = 1;
        $jour = $heur['jour'];
        $jrfran = '';
        if($jour == 'Monday'){
            $jrfran = 'lundi';
        }else if($jour == 'Tuesday'){
            $jrfran = 'mardi';
        }else if($jour == 'Wednesday'){
            $jrfran = 'mercredi';
        }else if($jour == 'Thursday'){
            $jrfran = 'jeudi';
        }else if($jour == 'Friday'){
            $jrfran = 'vendredi';
        }else if($jour == 'Saturday'){
            $jrfran = 'samedi';
        }
        $hed = $heur['heuredebut'];
        $hef = $heur['heurefin'];
        $matricule = $heur['matricule'];
        $ab = "SELECT absence.id_absence,absence.etat,absence.date_absence,absence.id_classe,absence.heuredebut,absence.heurefin,absence.id_matiere,absence.matricule,matieres.id_matiere,matieres.nom_matiere,eleves.matricule,eleves.nom_eleve FROM absence inner join matieres on absence.id_matiere=matieres.id_matiere inner join eleves on absence.matricule=eleves.matricule WHERE absence.id_classe='$classe' AND absence.heuredebut='$hed' AND absence.heurefin='$hef' AND absence.matricule='$matricule'";
        if($abs = $connec -> query($ab)){
            while($abc = $abs -> fetch()){
   echo '<tr style="cursor:pointer" id="'.$abc['id_absence'].'" class="linejustabsent" onclick="insertabsentjustifier(this.id,'.$classe.')"><td>'.$nb.'</td><td>'.$abc['matricule'].'</td><td>'.$abc['nom_eleve'].'</td><td>'.$jrfran.'</td><td>'.$abc['heuredebut'].'</td><td>'.$abc['heurefin'].'</td><td>'.$abc['nom_matiere'].'</td><td>'.$abc['date_absence'].'</td></tr>';
}
        }
        $nb++; 
    }
}
echo '</table>';
if($siline == 0){
    echo '<div class="alert alert-danger bg-danger text-light" role="alert" style="font-size: 12px;">
    Aucune absence n\'a été enregistrer dans cette classe
    </div>';
}else if($siline == 1){

}
echo '</div></div>';


?>