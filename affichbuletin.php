<?php
require('connect.php');
$session = $_GET['session'];
$sequence = $_GET['sequence'];
$classe = $_GET['classe'];

// fonction qui retourne le grade (note en lettre)
function Grade($moyseq){
    if($moyseq >= 17 && $moyseq <= 20){
        return 'A';
    }else if($moyseq >= 16 && $moyseq < 17){
        return 'A-';
    }else if($moyseq >= 14 && $moyseq < 16){
        return 'B+';
    }else if($moyseq >= 12 && $moyseq < 14){
        return 'B';
    }else if($moyseq >= 10 && $moyseq < 12){
        return 'C';
    }else if($moyseq >= 8 && $moyseq < 10){
        return 'C-';
    }else if($moyseq >= 6 && $moyseq < 8){
        return'D+';
    }else if($moyseq >= 4 && $moyseq < 6){
        return 'D';
    }else if($moyseq >= 1 && $moyseq < 4){
        return 'E';
    }else if( $moyseq < 1){
        return 'F';
    }       
}

$gb = "SELECT inscription.nom_session,inscription.id_classe,inscription.matricule,eleves.matricule,classe.id_classe,eleves.photo_eleve FROM inscription inner join eleves on inscription.matricule=eleves.matricule inner join classe on inscription.id_classe=classe.id_classe WHERE inscription.id_classe='$classe' AND inscription.nom_session='$session'";
if($gbo = $connec -> query($gb)){
    while($gbou = $gbo -> fetch()){
$matricu = $gbou['matricule'];
echo '<div style="page-break-after: always;color-adjust : exact;-webkit-print-color-adjust: exact;" id="monbulletion">';
echo '<table style="width:100%;font-size:11px;font-weight:bold;text-align:center">
<tr>
<td>


REPUBLIQUE DU CAMEROUN<br>PAIX-TRAVAIL-PATRIE<br>*************<br>MINISTERE DE L\'ENSEIGNEMENTS SECONDAIRES<br>*************<br>
INSTITUT UNIVERSITAIRE ET STRATEGIQUE DE L\'ESTUAIRE<br>*************<br>B.P 227 BAFOUSSAM,&nbsp;&nbsp;&nbsp;&nbsp; Tél : 233 44 40 01<br>Email : insam@gmail.com
         
</td>
<td>

</td>
<td>
REPUBLIC OF CAMEROON<br>PEACE-WORK-FARHERLAND<br>*************<br>MINISTRY OF SECONDARY EDUCATION<br>*************<br>
INSTITUT UNIVERSITAIRE ET STRATEGIQUE DE L\'ESTUAIRE<br>*************<br>PO BOX 227 BAFOUSSAM,&nbsp;&nbsp;&nbsp;&nbsp; Tél : 233 44 40 01<br>Site web : https://insam.com
              
</td>
</tr>
</table>';
echo '<table style="width:100%" id="tabtete"><tr><td colspan="2" style="font-size:23px;font-weight:bold;text-align:center">COLLEGE POLYVALENT BILINGU MARTIN LUTHER KING</td></tr>';
$newseq = '';
if($sequence == 'sequence 1'){
    $newseq = 'PREMIÈRE SEQUENCE';
}else if($sequence == 'sequence 2'){
    $newseq = 'DEUXIÈME SEQUENCE';
}else if($sequence == 'sequence 3'){
    $newseq = 'TROIXIÈME SEQUENCE';
}else if($sequence == 'sequence 4'){
    $newseq = 'QUATRIÈME SEQUENCE';
}else if($sequence == 'sequence 5'){
    $newseq = 'CINQUIÈME SEQUENCE';
}else if($sequence == 'sequence 6'){
    $newseq = 'SIXIÈME SEQUENCE';
}
$nomsec = '';
$sec = "SELECT classe.id_classe,classe.id_section,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section=tabsection.id_section WHERE classe.id_classe='$classe'";
if($sect = $connec -> query($sec)){
    while($secti = $sect -> fetch()){
        $nomsec = $secti['nom_section'];
    }
}
$effectif = 0;
$eff = "SELECT *,count(id_inscript) as nbreeleve FROM inscription WHERE id_classe='$classe'";
if($effe = $connec -> query($eff)){
    while($effect = $effe -> fetch()){
        $effectif = $effect['nbreeleve'];
    }
}
echo '<tr><td style="text-align:center"><span style="font-size:20px;font-weight:bold;text-align:center">BULLETIN DE LA '.$newseq.'</span><br><span style="font-weight:bold">SECTION '.ucwords($nomsec).'</span><br/><span style="font-size:14px;font-weight:bold">Année scolaire : '.$session.'</span><br>
<table style="width:100%;font-size:14px;text-align:left">';
$entebul = "SELECT inscription.matricule,inscription.id_classe,eleves.matricule,eleves.nom_eleve,eleves.datenaiss_eleve,date_format(datenaiss_eleve, '%d/%m/%Y') as datenaiss,eleves.sexe_eleve,eleves.prenom_eleve,eleves.lieunaiss_eleve,inscription.redouble,classe.id_classe,classe.nom_classe FROM inscription inner join eleves on inscription.matricule=eleves.matricule inner join classe on inscription.id_classe=classe.id_classe WHERE inscription.id_classe='$classe' AND inscription.matricule='$matricu'";
if($entebule = $connec -> query($entebul)){
    while($entebuletin = $entebule -> fetch()){
        echo '<tr><td>Nom : <strong>'.$entebuletin['nom_eleve'].'</strong></td><td>Né(e) le : <strong>'.$entebuletin['datenaiss'].'</strong></td><td>À : <strong>'.$entebuletin['lieunaiss_eleve'].'</strong></td></tr>';
        echo '<tr><td>Prénom : <strong>'.$entebuletin['prenom_eleve'].'</strong></td><td>Sexe : <strong>'.$entebuletin['sexe_eleve'].'</strong></td><td>Effectif de la classe : <strong>'.$effectif.'</strong></td></tr>';
        echo '<tr><td>Matricule : <strong>'.$entebuletin['matricule'].'</strong></td><td>Classe : <strong>'.$entebuletin['nom_classe'].'</strong></td><td>Redoublant : <strong>'.$entebuletin['redouble'].'</strong></td></tr>';
    }
}
echo '</table>
</td>';
echo '<td style="width:150px"><div id="blockimg"><img src="./eleve/'.$gbou['photo_eleve'].'" id="photoeleve" style="border:1px solid black;width:130px;height:150px;"></div></td></tr>';
echo '<table style="width:100%;border-collapse:collapse;border:1px solid gray;font-size:14px">';
echo '<tr style="font-weight:bold;font-size:14px;;border:1px solid gray;text-align:center"><td style="border:1px solid gray">Matières</td><td style="border:1px solid gray">Note</td><td style="border:1px solid gray">Coeff</td><td style="border:1px solid gray">Note x coeff</td><td colspan="2" style="border:1px solid gray">Appréciation</td><td style="border:1px solid gray">Min</td><td style="border:1px solid gray">Max</td><td style="border:1px solid gray">Moy</td></tr>';

$gr = "SELECT * FROM typematiere inner join matieres on typematiere.id_typmat=matieres.id_typmat inner join programme on matieres.id_matiere=programme.id_matiere where programme.id_classe='$classe' group by matieres.id_typmat";
if($grm = $connec -> query($gr)){
    while($grmat = $grm -> fetch()){
        $typmat = $grmat['id_typmat'];
echo '<tr><td colspan="9" style="font-weight:bold"> Matières '.ucwords($grmat['nom_typmat']).'</td></tr>';
$map = "SELECT matieres.id_typmat,programme.id_matiere,programme.id_employer,matieres.id_matiere,matieres.nom_matiere,employer.id_employer,employer.nom_employer FROM programme inner join matieres on programme.id_matiere=matieres.id_matiere inner join employer on programme.id_employer=employer.id_employer where programme.id_classe='$classe' AND matieres.id_typmat='$typmat' AND programme.nom_session='$session' group by programme.id_matiere";
if($mapr = $connec -> query($map)){
    while($mapro = $mapr -> fetch()){
        $idmati = $mapro['id_matiere'];
        $notemat = 0;
        $coef = 0;
        $no = "SELECT * FROM evaluation WHERE matricule='$matricu' AND id_matiere='$idmati' AND session='$session' AND id_classe='$classe' AND sequence='$sequence'";
        if($not = $connec -> query($no)){
            while($note = $not -> fetch()){
                $notemat = $note['note'];
                $coef = $note['coef'];
            }
        }
        $minote = 0;
        $maxnote = 0;
        $moymat = 0;
        $ma = "SELECT *,min(note) as minote,max(note) as maxnote,sum(note) as notesom,count(id_evaluation) as nbrenote FROM evaluation WHERE id_matiere='$idmati' AND session='$session' AND id_classe='$classe' AND sequence='$sequence'";
        if($max = $connec -> query($ma)){
            while($maxmin = $max -> fetch()){
                $minote = $maxmin['minote'];
                $maxnote = $maxmin['maxnote'];
                $notesom = $maxmin['notesom'];
                $nbrenote = $maxmin['nbrenote'];
                if($notesom <> 0 && $nbrenote <> 0){$moymat = $notesom / $nbrenote;}else{$moymat = 0;}
            }
        }
        $nc = $notemat * $coef;
        echo '<tr><td style="border:1px solid gray">'.$mapro['nom_matiere'].'<br><div style="font-size:12px;font-weight:bold;text-align:right">'.$mapro['nom_employer'].'</div></td><td style="border:1px solid gray;text-align:center">'.$notemat.'</td><td style="border:1px solid gray;text-align:center">'.$coef.'</td><td style="border:1px solid gray;text-align:center">'.$nc.'</td><td style="border:1px solid gray;text-align:center">';
        if($notemat >= 17 && $notemat <= 20){
            echo 'Excellent';
        }else if($notemat >= 16 && $notemat < 17){
            echo 'Très bien';
        }else if($notemat >= 14 && $notemat < 16){
            echo 'Bien';
        }else if($notemat >= 12 && $notemat < 14){
            echo 'Assez-bien';
        }else if($notemat >= 10 && $notemat < 12){
            echo 'Passable';
        }else if($notemat >= 8 && $notemat < 10){
            echo 'Insuffisant';
        }else if($notemat >= 6 && $notemat < 8){
            echo 'Faible';
        }else if($notemat < 6){
            echo 'Médiocre';
        }
        echo'</td><td style="border:1px solid gray;text-align:center">'.Grade($notemat).'</td><td style="border:1px solid gray;text-align:center">'.$minote.'</td><td style="border:1px solid gray;text-align:center">'.$maxnote.'</td><td style="border:1px solid gray;text-align:center">'.$moymat.'</td></tr>';
    }
}
$coeftypmt = 0;
$notecoeftot = 0;
$cototal = "SELECT evaluation.sequence,evaluation.note,evaluation.coef,evaluation.id_matiere,evaluation.matricule,matieres.id_matiere,matieres.id_typmat FROM evaluation inner join matieres on evaluation.id_matiere=matieres.id_matiere WHERE evaluation.matricule='$matricu' AND matieres.id_typmat='$typmat' AND evaluation.sequence='$sequence' AND evaluation.session='$session'";
if($contotal = $connec -> query($cototal)){
    while($contetotal = $contotal -> fetch()){
        $coeftypmt = $coeftypmt + $contetotal['coef'];
        $notecoeftot = $notecoeftot + ($contetotal['note']*$contetotal['coef']);
    }
}
if($notecoeftot <> 0 && $coeftypmt <> 0){$moytotmat = $notecoeftot / $coeftypmt;}else{$moytotmat = 0;}
echo '<tr style="font-weight:bold;text-align:right"><td colspan="9">Total coeff : '.$coeftypmt.'&nbsp;&nbsp;&nbsp;&nbsp; Points : '.$notecoeftot.'&nbsp;&nbsp;&nbsp;&nbsp; Moyenne : '.round($moytotmat,2).'</td></tr>';
}
}

echo '</table>';
$pointmoy = 0;
$coeftotal = 0;
$totpo = "SELECT * FROM evaluation where sequence='$sequence' AND matricule='$matricu' AND session='$session'";
if($totpoi = $connec -> query($totpo)){
    while($totpoint = $totpoi -> fetch()){
       $pointmoy = $pointmoy + ($totpoint['note'] * $totpoint['coef']) ;
       $coeftotal =  $coeftotal + $totpoint['coef'];
    }
}

// recuperation du rang de l'élève
$rangeleve = 1;
$newrang = 0;
$ra = "SELECT *,sum(note*coef) as notc FROM evaluation where sequence='$sequence' AND session='$session' AND id_classe='$classe' GROUP BY matricule order by notc desc";
if($ran = $connec -> query($ra)){
    while($rang = $ran -> fetch()){
             $mat = $rang['matricule'];
             if($mat == $matricu){
               $newrang = $rangeleve;
             }
       $rangeleve++;
    }
}

// moyenne de la classe
$moyclass = 0;
$mocl = "SELECT *,sum(note*coef) as nct,sum(coef) as coeft FROM evaluation where sequence='$sequence' AND id_classe='$classe' AND session='$session'";
if($mocla = $connec -> query($mocl)){
    while($moclas = $mocla -> fetch()){
     $pointclasse = $moclas['nct'];
     $coefclasse = $moclas['coeft'];
     if($pointclasse <> 0 && $coefclasse <> 0){$moyclass = $pointclasse / $coefclasse;}else{$moyclass = 0;}
    }
}
$pointotalavoir = $coeftotal * 20;

if($pointmoy <> 0 && $coeftotal <> 0){$moyseq = $pointmoy / $coeftotal;}else{$moyseq = 0;}
echo '<div style="padding:7px 0px"></div><table style="width:100%;font-weight:bold;font-size:14px"><tr>';
echo '<td colspan="2" class="bg-primary text-light" id="bartravail" style="text-align:center;width:60%;background :blue;color:white; !important">TRAVAIL</td><td style="width:2%"></td><td class="bg-primary text-light bartravail" style="text-align:center;width:60%;background :blue;color:white;">DISCIPLINE</td></tr>
<tr><td style="font-size:12px"><div>Total points : '.$pointmoy.' / '.$pointotalavoir.'</div>
<div>Total coefficients : '.$coeftotal.'</div>
<div>Moyenne Sequentielle : '.round($moyseq,2).' / 20</div>
';
if($newrang == 1){
echo '<div>Rang Sequentielle : '.$newrang.'er / '.$effectif.'</div>';
}else{
echo '<div>Rang Sequentielle : '.$newrang.'ème / '.$effectif.'</div>';
}
echo '<div>Moyenne Générale de la classe : '.round($moyclass,2).' / 20</div>';
echo '<div>Mention : ';
if($moyseq >= 17 && $moyseq <= 20){
    echo 'Excellent';
}else if($moyseq >= 16 && $moyseq < 17){
    echo 'Très bien';
}else if($moyseq >= 14 && $moyseq < 16){
    echo 'Bien';
}else if($moyseq >= 12 && $moyseq < 14){
    echo 'Assez-bien';
}else if($moyseq >= 10 && $moyseq < 12){
    echo 'Passable';
}else if($moyseq >= 8 && $moyseq < 10){
    echo 'Insuffisant';
}else if($moyseq >= 6 && $moyseq < 8){
    echo 'Faible';
}else if($moyseq < 6){
    echo 'Médiocre';
}
echo' ('.Grade($moyseq).')</div>';
echo '
</td><td style="text-align:left">
<table style="font-size:12px;font-weight:bold"><tr><td>Tableau d\'honneur : </td><td>';if($moyseq >= 12){echo 'OUI';}else{echo 'NON';}echo '</td></tr>';
echo '<tr><td>Encouragements : </td><td>';if($moyseq >= 15 && $moyseq < 16){echo 'OUI';}else{echo 'NON';}echo '</td></tr>';
echo '<tr><td>Félicitations : </td><td>';if($moyseq >= 16){echo 'OUI';}else{echo 'NON';}echo '</td></tr>';
echo '<tr><td>Avertissement Travail : </td><td>';if($moyseq <= 10 && $moyseq >= 8 ){echo 'OUI';}else{echo 'NON';}echo '</td></tr>';
echo '<tr><td>Blâme Travail : </td><td>';if($moyseq < 8){echo 'OUI';}else{echo 'NON';}echo '</td></tr></table>';
echo '</td><td></td><td style="vertical-align:top;font-size:12px">';

// calcul de l'absence d'un élève
$nbreabsenc = 0;
$ab = "SELECT *,sum(time) as nbreabsence,count(time) as nbre FROM absence WHERE matricule='$matricu' AND etat='non justifier' AND session='$session'";
if($abs = $connec -> query($ab)){  
        while($abse = $abs -> fetch()){
            $nbreAbs = $abse['nbre'];
            if($nbreAbs == 0){
                $nbreabsenc = 0;    
            }else{
                 $nbreabsenc = $abse['nbreabsence'];
            }      
    }
}
echo '<div>Absence non justifiées : &nbsp;&nbsp;&nbsp;'.$nbreabsenc.' h</div>';

// verifier si l'élève a déja été traduit au conseil disciplinaire
$nbretraduit = 0;
$tr = "SELECT *,count(id_traduit) as nbre FROM traduitconseil where matricule='$matricu'";
if($tra = $connec -> query($tr)){
    while($trad = $tra -> fetch()){
       $nbretraduit = $trad['nbre'];
       if($nbretraduit < 1){
  echo '<div>A déja été traduit au conseil disciplinaire : NON</div>';
       }else if($nbretraduit >= 1){
  echo '<div>A déjà été traduit au conseil disciplinaire : OUI</div>';
       }
    }
}
if($nbretraduit >= 1){
// motif du conseil disciplinaire
$mo = "SELECT traduitconseil.matricule,traduitconseil.motif,traduitconseil.id_conseil,conseil.id_conseil,conseil.date_conseil,date_format(date_conseil, '%d/%m/%Y') AS dateconseil FROM traduitconseil inner join conseil on traduitconseil.id_conseil=conseil.id_conseil where traduitconseil.matricule='$matricu'";
if($mot = $connec -> query($mo)){
    while($motif = $mot -> fetch()){
  echo '<div>conseil du '.$motif['dateconseil'].'. Motif: '.$motif['motif'].'</div>';

    }}
}
echo '</td>';
echo '</tr></table>';
echo '<table style="width:100%;text-align:center;font-weight:bold;" ><tr><td>Visa du parent</td><td>Observations et visa du principal</td><td rowspan="2" style="font-size:12px;vertical-align:bottom">BAFOUSSAM,<br>le '.date('d/m/Y').' <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Le Principal</td></tr><tr><td style="padding:15px 0px"></td><td></td></table>';
echo '</div>';
}
}
?>