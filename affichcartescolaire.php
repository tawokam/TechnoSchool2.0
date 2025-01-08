<?php
require('connect.php');
$classe = $_GET['classe'];
$session = $_GET['session'];
echo '<div class="card" style="width:100%;">
<div class="card-body" >';
echo '<div style="font-size:12px;font-weight:bold;display:flex;flex-wrap: wrap;margin:0 auto;width:100%">';
$se = "SELECT eleves.photo_eleve,inscription.id_classe,inscription.matricule,inscription.nom_session,classe.id_classe,classe.nom_classe,eleves.matricule,eleves.nom_eleve,eleves.prenom_eleve,eleves.datenaiss_eleve,date_format(datenaiss_eleve, '%d/%m/%Y') AS datenaiss,eleves.lieunaiss_eleve FROM inscription inner join classe on inscription.id_classe=classe.id_classe inner join eleves on inscription.matricule=eleves.matricule WHERE classe.id_classe='$classe' AND inscription.nom_session='$session'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo '<div style="width:47%;border:1px solid gray;margin:1%;font-size:10px;vertical-align:top;text-align:center">
        <table style="width:100%;font-size:8px"><tr>
        <td style="vertical-align:top">REPUBLIQUE DU CAMEROUN<br>Paix-Travail-Patrie<br>MINISTRE DES ENSEIGNEMENTS SECONDAIRES<br>
        DELEGATION REGIONALE DE L\'OUEST</td>
        <td style="width:20%;border:1px solid gray"><img src="#"></td>
        <td style="vertical-align:top">REPUBLIC OF CAMEROON<br>Peace-Work-Fatherland<br>MINISTRY OF SECONDARY EDUCATION<br>
        REGIONAL DELEGATION FOR WEST</td>
        </tr></table>
        <div style="font-weight:bolder;color:blue;font-size:11px">COLLEGE POLYVALENT BILINGUE MARTIN LUTHER KING</div>
        <div style="font-weight:bolder;font-size:8px">CARTE D\'IDENTITE SCOLAIRE / SCHOOL IDENTITY CARD</div>
       <table style="width:100%;text-align:left"><tr>
       <td style="width:30%;text-align:center"><img src="./eleve/'.$sele['photo_eleve'].'" style="width:90%;height:130px"></td>
       <td style="vertical-align:top;font-size:12px">Anée scolaire / Academic year : '.$session.'<br>Noms / firts name :&nbsp;&nbsp;&nbsp; <span style="color:black;font-weight:bolder;font-style:italic">'.strtoupper($sele['nom_eleve']).'</span><br>
       Prénoms / last name : <span style="color:black;font-weight:bolder;font-style:italic">'.strtoupper($sele['prenom_eleve']).'</span><br>Classe / Class : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;font-weight:bolder;font-style:italic">'.$sele['nom_classe'].'</span><br>
       Né(e) le / Date of birth : <span style="color:black;font-weight:bolder;font-style:italic">'.$sele['datenaiss'].'</span><br>Lieu / Place : <span style="color:black;font-weight:bolder;font-style:italic">'.strtoupper($sele['lieunaiss_eleve']).'</span><br>
       Matricule : &nbsp;&nbsp;&nbsp;&nbsp; <span style="color:blue;font-weight:bolder;font-style:italic">'.$sele['matricule'].'</span></td>
       </tr></table>
       <table style="width:100%;font-size:10px"><tr>
       <td style="width:50%">Le principal / The principal<br><div style="padding-top:28px"></div></td>
       <td>Fait à Bafoussam le: '.date('d/m/Y').'<br><span style="font-size:8px">Done at Bafoussam on</span></td>
       </tr></table>
        </div>';
    }
}
echo '</div>';
echo '</div></div>';
?>
