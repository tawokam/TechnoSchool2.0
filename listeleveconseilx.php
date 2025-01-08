<?php
require('connect.php');
$idconseil = $_GET['idconseil'];
echo '<table style="width:100%;font-weight:bold;font-size:14px">
<tr><td>REPUBLIQUE DU CAMEROUN<br>MINISTERE DES ENSEIGNEMENTS SECONDAIRES<br>
DELEGATION REGIONAL DE L\'OUEST</td>
<td><canvas style="border:1px solid black"></canvas></td>
<td>REPUBLIC OF CAMEROON<br>MINISTRY OF SECONDARY EDUCATION<br>REGIONAL DELEGATION FOR THE WEST</td>
</tr></table>';
$nu = "SELECT *,date_format(date_conseil, '%d/%m/%Y') as dateconsei FROM conseil where id_conseil='$idconseil'";
if($num = $connec -> query($nu)){
    while($nume = $num -> fetch()){

        echo '<div style="text-align:center;font-weight:bold">CONSEIL DE DISCIPLINE N° '.$nume['numero'].'</div>';
        echo '<div style="text-align:center;font-weight:bold">Prévu le '.$nume['dateconsei'].',&nbsp;&nbsp;&nbsp;  Lieu:'.$nume['lieu'].'</div>';
    }
}
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Matricule</th><th>Nom</th><th>Classe</th><th>Motif</th><th>Traduit le</th></tr>
  </thead>';
  $n = 1;
$se = "SELECT traduitconseil.matricule,traduitconseil.id_classe,traduitconseil.motif,traduitconseil.date_traduit,eleves.matricule,eleves.nom_eleve,classe.id_classe,classe.nom_classe FROM traduitconseil inner join eleves on traduitconseil.matricule=eleves.matricule inner join classe on traduitconseil.id_classe=classe.id_classe where traduitconseil.id_conseil='$idconseil'";
if($sel= $connec ->query($se)){
    while($sele = $sel -> fetch()){
echo '<tr><td>'.$n.'</td><td>'.$sele['matricule'].'</td><td>'.$sele['nom_eleve'].'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['motif'].'</td><td>'.$sele['date_traduit'].'</td><tr>';
$n++;
    }
}

?>