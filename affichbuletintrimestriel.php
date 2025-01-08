<?php
require('connect.php');
$session = $_GET['session'];
$trimestre = $_GET['trimestre'];
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
// fonction qui retourne l'aprresiation
function Appreciation($moyseq){
    if($moyseq >= 17 && $moyseq <= 20){
        return 'Excellent';
    }else if($moyseq >= 16 && $moyseq < 17){
        return 'Très bien';
    }else if($moyseq >= 14 && $moyseq < 16){
        return 'Bien';
    }else if($moyseq >= 12 && $moyseq < 14){
        return 'Assez-bien';
    }else if($moyseq >= 10 && $moyseq < 12){
        return 'Passable';
    }else if($moyseq >= 8 && $moyseq < 10){
        return 'Insuffisant';
    }else if($moyseq >= 6 && $moyseq < 8){
        return 'Faible';
    }else if($moyseq < 6){
        return 'Médiocre';
    }
}

$gb = "SELECT inscription.nom_session,inscription.id_classe,inscription.matricule,eleves.matricule,classe.id_classe,eleves.photo_eleve FROM inscription inner join eleves on inscription.matricule=eleves.matricule inner join classe on inscription.id_classe=classe.id_classe WHERE inscription.id_classe='$classe' AND inscription.nom_session='$session'";
if($gbo = $connec -> query($gb)){
    while($gbou = $gbo -> fetch()){
$matricu = $gbou['matricule'];
echo '<br><div style="page-break-after: always;color-adjust : exact;-webkit-print-color-adjust: exact;" id="monbulletion">';
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
if($trimestre == 'trimestre 1'){
    $newseq = 'BULLETIN DU PREMIÈRE TRIMESTRE';
}else if($trimestre == 'trimestre 2'){
    $newseq = 'BULLETIN DU DEUXIÈME TRIMESTRE';
}else if($trimestre == 'trimestre 3'){
    $newseq = 'BULLETIN DE FIN D\'ANNEE';
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
echo '<tr><td style="text-align:center"><span style="font-size:20px;font-weight:bold;text-align:center"> '.$newseq.'</span><br><span style="font-weight:bold">SECTION '.ucwords($nomsec).'</span><br/><span style="font-size:14px;font-weight:bold">Année scolaire : '.$session.'</span><br>
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
if($trimestre == 'trimestre 1'){$se = 'Seq1';$se2 = 'Seq2';}
if($trimestre == 'trimestre 2'){$se = 'Seq3';$se2 = 'Seq4';}
if($trimestre == 'trimestre 3'){$se = 'Seq5';$se2 = 'Seq6';}
echo '<td style="width:150px"><div id="blockimg"><img src="./eleve/'.$gbou['photo_eleve'].'" id="photoeleve" style="border:1px solid black;width:130px;height:150px;"></div></td></tr>';
echo '<table style="width:100%;border-collapse:collapse;border:1px solid gray;font-size:14px">';
echo '<tr style="font-weight:bold;font-size:14px;border:1px solid gray;text-align:center"><td style="border:1px solid gray">Matières</td><td style="border:1px solid gray">'.$se.'</td><td style="border:1px solid gray">'.$se2.'</td><td style="border:1px solid gray">Note</td><td style="border:1px solid gray">Coef</td><td style="border:1px solid gray">Note x coef</td><td colspan="2" style="border:1px solid gray">Appréciation</td><td style="border:1px solid gray">Min</td><td style="border:1px solid gray">Max</td><td style="border:1px solid gray">Moy</td></tr>';

$gr = "SELECT * FROM typematiere inner join matieres on typematiere.id_typmat=matieres.id_typmat inner join programme on matieres.id_matiere=programme.id_matiere where programme.id_classe='$classe' group by matieres.id_typmat";
if($grm = $connec -> query($gr)){
    while($grmat = $grm -> fetch()){
        $typmat = $grmat['id_typmat'];
echo '<tr><td colspan="9" style="font-weight:bold"> Matières '.ucwords($grmat['nom_typmat']).'</td></tr>';
$map = "SELECT matieres.id_typmat,programme.id_matiere,programme.id_employer,matieres.id_matiere,matieres.nom_matiere,employer.id_employer,employer.nom_employer FROM programme inner join matieres on programme.id_matiere=matieres.id_matiere inner join employer on programme.id_employer=employer.id_employer where programme.id_classe='$classe' AND matieres.id_typmat='$typmat' AND nom_session='$session' group by programme.id_matiere";
if($mapr = $connec -> query($map)){
    while($mapro = $mapr -> fetch()){
        $idmati = $mapro['id_matiere'];
        $notemat1 = 0; $notemat2 = 0;
        $coef1 = 0;  $coef2 = 0; 

        // recuperation des notes des deux sequence du trimestre
        if($trimestre == 'trimestre 1'){
            $no = "SELECT * FROM evaluation WHERE matricule='$matricu' AND id_matiere='$idmati' AND session='$session' AND id_classe='$classe' AND sequence='sequence 1'";
            if($not = $connec -> query($no)){
            while($note = $not -> fetch()){
                $notemat1 = $note['note'];
                $coef1 = $note['coef'];
            }
            $no2 = "SELECT * FROM evaluation WHERE matricule='$matricu' AND id_matiere='$idmati' AND session='$session' AND id_classe='$classe' AND sequence='sequence 2'";
            if($not2 = $connec -> query($no2)){
            while($note2 = $not2 -> fetch()){
                $notemat2 = $note2['note'];
                $coef2 = $note2['coef'];
            }
            }
            }
        }else if($trimestre == 'trimestre 2'){
            $no = "SELECT * FROM evaluation WHERE matricule='$matricu' AND id_matiere='$idmati' AND session='$session' AND id_classe='$classe' AND sequence='sequence 3'";
            if($not = $connec -> query($no)){
            while($note = $not -> fetch()){
                $notemat1 = $note['note'];
                $coef1 = $note['coef'];
            }
            $no2 = "SELECT * FROM evaluation WHERE matricule='$matricu' AND id_matiere='$idmati' AND session='$session' AND id_classe='$classe' AND sequence='sequence 4'";
            if($not2 = $connec -> query($no2)){
            while($note2 = $not2 -> fetch()){
                $notemat2 = $note2['note'];
                $coef2 = $note2['coef'];
            }
            }
            }
        }else if($trimestre == 'trimestre 3'){
            $no = "SELECT * FROM evaluation WHERE matricule='$matricu' AND id_matiere='$idmati' AND session='$session' AND id_classe='$classe' AND sequence='sequence 5'";
            if($not = $connec -> query($no)){
            while($note = $not -> fetch()){
                $notemat1 = $note['note'];
                $coef1 = $note['coef'];
            }
            $no2 = "SELECT * FROM evaluation WHERE matricule='$matricu' AND id_matiere='$idmati' AND session='$session' AND id_classe='$classe' AND sequence='sequence 6'";
            if($not2 = $connec -> query($no2)){
                if($not2 -> rowCount() == 0){
                    $notemat2 = $notemat1;
                    $coef2 = $coef1;
                }else{
                    while($note2 = $not2 -> fetch()){
                        $notemat2 = $note2['note'];
                        $coef2 = $note2['coef'];
                    }
                }
          
            }
            }
        }
        $minote = 20;
        $maxnote = 0;
        $moymat = 0;
        $somallnote = 0;
        $countallnote = 0;
         // recuperation de la note min, max et la moy trimestriel
         if($trimestre == 'trimestre 1'){
            $ma = "SELECT * FROM evaluation WHERE id_matiere='$idmati' AND session='$session' AND id_classe='$classe' group by matricule";//AND (sequence='sequence 1' OR sequence='sequence 2')
            if($max = $connec -> query($ma)){
                while($maxmin = $max -> fetch()){
                    $matriculEl = $maxmin['matricule'];
                    $seq1 = 0; $seq2 = 0;
                   // recuperation des notes de chaque eleves de la classe pour les deux sequences
                   $notse = "SELECT note,sequence FROM evaluation WHERE id_matiere='$idmati' AND session='$session' AND id_classe='$classe' AND matricule = '$matriculEl' AND (sequence='sequence 1' OR sequence='sequence 2')";
                   if($nots = $connec -> query($notse)){
                    while($notse2 = $nots -> fetch()){
                         if($notse2['sequence'] == 'sequence 1'){
                            $seq1 = $notse2['note'];
                        }
                        if($notse2['sequence'] == 'sequence 2'){
                            $seq2 = $notse2['note'];
                        }
                    }
                       
                   }
                   // verifi si l'eleve a la note sur les deux sequence
                   if($seq1 <> 0 && $seq2 <> 0){
                    $somnote = ($seq1 + $seq2)/2;
                     if ($minote > $somnote){$minote = $somnote;}
                     if($maxnote < $somnote){$maxnote = $somnote;}
                     $somallnote += $somnote;
                     $countallnote ++; 
                   }else if($seq1 == 0 || $seq2 == 0){
                    if($seq1 == 0){
                        if ($minote > $seq2){$minote = $seq2/2;}
                        if($maxnote < $seq2){$maxnote = $seq2/2;}
                        $seq1 = $seq2;
                        $somallnote += $seq2/2;
                        $countallnote++;
                    }else{
                        if ($minote > $seq1){$minote = $seq1/2;}
                        if($maxnote < $seq1){$maxnote = $seq1/2;}
                        $seq2 = $seq1;
                        $somallnote += $seq1/2;
                        $countallnote++;
                    }
                }
                }
            }

        }else if($trimestre == 'trimestre 2'){
            $ma = "SELECT * FROM evaluation WHERE id_matiere='$idmati' AND session='$session' AND id_classe='$classe' group by matricule";//AND (sequence='sequence 1' OR sequence='sequence 2')
            if($max = $connec -> query($ma)){
                while($maxmin = $max -> fetch()){
                    $matriculEl = $maxmin['matricule'];
                    $seq1 = 0;$seq2 = 0;
                   // recuperation des notes de chaque eleves de la classe pour les deux sequences
                   $notse = "SELECT note,sequence FROM evaluation WHERE id_matiere='$idmati' AND session='$session' AND id_classe='$classe' AND matricule = '$matriculEl' AND (sequence='sequence 3' OR sequence='sequence 4')";
                   if($nots = $connec -> query($notse)){
                    while($notse2 = $nots -> fetch()){
                         if($notse2['sequence'] == 'sequence 3'){
                            $seq1 = $notse2['note'];
                        }
                        if($notse2['sequence'] == 'sequence 4'){
                            $seq2 = $notse2['note'];
                        }
                    }
                       
                   }
                   // verifi si l'eleve a la note sur les deux sequence
                   if($seq1 <> 0 && $seq2 <> 0){
                    $somnote = ($seq1 + $seq2)/2;
                     if ($minote > $som){$minote = $somnote;}
                     if($maxnote < $somnote){$maxnote = $somnote;}
                     $somallnote += $somnote;
                     $countallnote ++; 
                   }else if ($seq1 == 0 || $seq2 == 0){
                    if($seq1 == 0){
                        if ($minote > $seq2){$minote = $seq2/2;}
                        if($maxnote < $seq2){$maxnote = $seq2/2;}
                        $seq1 = $seq2;
                        $somallnote += $seq2/2;
                        $countallnote++;
                    }else{
                        if ($minote > $seq1){$minote = $seq1/2;}
                        if($maxnote < $seq1){$maxnote = $seq1/2;}
                        $seq2 = $seq1;
                        $somallnote += $seq1/2;
                        $countallnote++;
                    }
                }
                }
            }
        }else if($trimestre == 'trimestre 3'){
            $ma = "SELECT * FROM evaluation WHERE id_matiere='$idmati' AND session='$session' AND id_classe='$classe' group by matricule";//AND (sequence='sequence 1' OR sequence='sequence 2')
            if($max = $connec -> query($ma)){
                while($maxmin = $max -> fetch()){
                    $matriculEl = $maxmin['matricule'];
                    $seq1 = 0;$seq2 = 0;
                   // recuperation des notes de chaque eleves de la classe pour les deux sequences
                   $notse = "SELECT note,sequence FROM evaluation WHERE id_matiere='$idmati' AND session='$session' AND id_classe='$classe' AND matricule = '$matriculEl' AND (sequence='sequence 5' OR sequence='sequence 6')";
                   if($nots = $connec -> query($notse)){
                    while($notse2 = $nots -> fetch()){
                         if($notse2['sequence'] == 'sequence 5'){
                            $seq1 = $notse2['note'];
                        }
                        if($notse2['sequence'] == 'sequence 6'){
                            $seq2 = $notse2['note'];
                        }
                    }
                       
                   }
                   // verifi si l'eleve a la note sur les deux sequence
                   if($seq1 <> 0 && $seq2 <> 0){
                    $somnote = ($seq1 + $seq2)/2;
                     if ($minote > $som){$minote = $somnote;}
                     if($maxnote < $somnote){$maxnote = $somnote;}
                     $somallnote += $somnote;
                     $countallnote ++; 
                   }else if ($seq1 == 0 || $seq2 == 0){
                    if($seq1 == 0){
                        if ($minote > $seq2){$minote = $seq2/2;}
                        if($maxnote < $seq2){$maxnote = $seq2/2;}
                        $seq1 = $seq2;
                        $somallnote += $seq2/2;
                        $countallnote++;
                    }else{
                        if ($minote > $seq1){$minote = $seq1/2;}
                        if($maxnote < $seq1){$maxnote = $seq1/2;}
                        $seq2 = $seq1;
                        $somallnote += $seq1/2;
                        $countallnote++;
                    }
                }
                }
            }
        }
        if($somallnote <>0 && $countallnote <>0){ $moymat = $somallnote / $countallnote;}else{$moymat = 0;};
        $notetrimestriel = (($notemat1 + $notemat2) /2);
        $nc = $notetrimestriel * $coef1;
        
        echo '<tr><td style="border:1px solid gray">'.$mapro['nom_matiere'].'<br><div style="font-size:12px;font-weight:bold;text-align:right">'.$mapro['nom_employer'].'</div></td><td style="border:1px solid gray;text-align:center">'.$notemat1.'</td><td style="border:1px solid gray;text-align:center">'.$notemat2.'</td><td style="border:1px solid gray;text-align:center">'.$notetrimestriel.'</td><td style="border:1px solid gray;text-align:center">'.$coef1.'</td><td style="border:1px solid gray;text-align:center">'.$nc.'</td><td style="border:1px solid gray;text-align:center">'.
        Appreciation($notetrimestriel).'</td><td style="border:1px solid gray;text-align:center">'.Grade($notetrimestriel).'</td><td style="border:1px solid gray;text-align:center">'.$minote.'</td><td style="border:1px solid gray;text-align:center">'.$maxnote.'</td><td style="border:1px solid gray;text-align:center">'.$moymat.'</td></tr>';
    }
}
$coeftypmt1 = 0;
$pointtypemat  = 0;
$coeftypmt2 = 0;
$notecoeftot1 = 0;
$notecoeftot2 = 0;
// RECUPERATION DE LA SOMME DES POINTS ET DU COEF D'UN ELEVE
if($trimestre == 'trimestre 1'){
    $cototal1 = "SELECT evaluation.sequence,evaluation.note,evaluation.coef,evaluation.id_matiere,evaluation.matricule,matieres.id_matiere,matieres.id_typmat FROM evaluation inner join matieres on evaluation.id_matiere=matieres.id_matiere WHERE evaluation.matricule='$matricu' AND matieres.id_typmat='$typmat' AND evaluation.sequence='sequence 1'";
    if($contotal1 = $connec -> query($cototal1)){
        while($contetotal1 = $contotal1 -> fetch()){
            $coeftypmt1 = $coeftypmt1 + $contetotal1['coef'];
            $notecoeftot1 = $notecoeftot1 + ($contetotal1['note']*$contetotal1['coef']);
        }
    }
    $cototal2 = "SELECT evaluation.sequence,evaluation.note,evaluation.coef,evaluation.id_matiere,evaluation.matricule,matieres.id_matiere,matieres.id_typmat FROM evaluation inner join matieres on evaluation.id_matiere=matieres.id_matiere WHERE evaluation.matricule='$matricu' AND matieres.id_typmat='$typmat' AND evaluation.sequence='sequence 2'";
    if($contotal2 = $connec -> query($cototal2)){
        while($contetotal2 = $contotal2 -> fetch()){
            $coeftypmt2 = $coeftypmt2 + $contetotal2['coef'];
            $notecoeftot2 = $notecoeftot2 + ($contetotal2['note']*$contetotal2['coef']);
        }
    }
}
if($trimestre == 'trimestre 2'){
    $cototal1 = "SELECT evaluation.sequence,evaluation.note,evaluation.coef,evaluation.id_matiere,evaluation.matricule,matieres.id_matiere,matieres.id_typmat FROM evaluation inner join matieres on evaluation.id_matiere=matieres.id_matiere WHERE evaluation.matricule='$matricu' AND matieres.id_typmat='$typmat' AND evaluation.sequence='sequence 3'";
    if($contotal1 = $connec -> query($cototal1)){
        while($contetotal1 = $contotal1 -> fetch()){
            $coeftypmt1 = $coeftypmt1 + $contetotal1['coef'];
            $notecoeftot1 = $notecoeftot1 + ($contetotal1['note']*$contetotal1['coef']);
        }
    }
    $cototal2 = "SELECT evaluation.sequence,evaluation.note,evaluation.coef,evaluation.id_matiere,evaluation.matricule,matieres.id_matiere,matieres.id_typmat FROM evaluation inner join matieres on evaluation.id_matiere=matieres.id_matiere WHERE evaluation.matricule='$matricu' AND matieres.id_typmat='$typmat' AND evaluation.sequence='sequence 4'";
    if($contotal2 = $connec -> query($cototal2)){
        while($contetotal2 = $contotal2 -> fetch()){
            $coeftypmt2 = $coeftypmt2 + $contetotal2['coef'];
            $notecoeftot2 = $notecoeftot2 + ($contetotal2['note']*$contetotal2['coef']);
        }
    }
}
if($trimestre == 'trimestre 3'){
    $cototal1 = "SELECT evaluation.sequence,evaluation.note,evaluation.coef,evaluation.id_matiere,evaluation.matricule,matieres.id_matiere,matieres.id_typmat FROM evaluation inner join matieres on evaluation.id_matiere=matieres.id_matiere WHERE evaluation.matricule='$matricu' AND matieres.id_typmat='$typmat' AND evaluation.sequence='sequence 5'";
    if($contotal1 = $connec -> query($cototal1)){
        while($contetotal1 = $contotal1 -> fetch()){
            $coeftypmt1 = $coeftypmt1 + $contetotal1['coef'];
            $notecoeftot1 = $notecoeftot1 + ($contetotal1['note']*$contetotal1['coef']);
        }
    }
    $cototal2 = "SELECT evaluation.sequence,evaluation.note,evaluation.coef,evaluation.id_matiere,evaluation.matricule,matieres.id_matiere,matieres.id_typmat FROM evaluation inner join matieres on evaluation.id_matiere=matieres.id_matiere WHERE evaluation.matricule='$matricu' AND matieres.id_typmat='$typmat' AND evaluation.sequence='sequence 6'";
    if($contotal2 = $connec -> query($cototal2)){
        while($contetotal2 = $contotal2 -> fetch()){
            $coeftypmt2 = $coeftypmt2 + $contetotal2['coef'];
            $notecoeftot2 = $notecoeftot2 + ($contetotal2['note']*$contetotal2['coef']);
        }
    }
}
$pointtypemat = (($notecoeftot1 + $notecoeftot2) /2);
if($pointtypemat <>0 && $coeftypmt1 <>0){ $moytotmat = $pointtypemat / $coeftypmt1;}else{$moytotmat = 0;};
echo '<tr style="font-weight:bold;text-align:right"><td colspan="9">Total coeff : '.$coeftypmt1.'&nbsp;&nbsp;&nbsp;&nbsp; Points : '.$pointtypemat.'&nbsp;&nbsp;&nbsp;&nbsp; Moyenne : '.round($moytotmat,2).'</td></tr>';
  }
}

echo '</table>';
$pointmoy1 = 0;
$coeftotal1 = 0;
$pointmoy2 = 0;
$coeftotal2 = 0; 
$pointmoy = 0;
$coeftotal = 0;

// Recuperation des points et des coef general de l'élève
if($trimestre == 'trimestre 1'){
    $totpo1 = "SELECT * FROM evaluation where sequence='sequence 1' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
    if($totpoi1 = $connec -> query($totpo1)){
        while($totpoint1 = $totpoi1 -> fetch()){
        $pointmoy1 = $pointmoy1 + ($totpoint1['note'] * $totpoint1['coef']) ;
        $coeftotal1 =  $coeftotal1 + $totpoint1['coef'];
        }
    } 
    $totpo2 = "SELECT * FROM evaluation where sequence='sequence 2' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
    if($totpoi2 = $connec -> query($totpo2)){
        while($totpoint2 = $totpoi2 -> fetch()){
        $pointmoy2 = $pointmoy2 + ($totpoint2['note'] * $totpoint2['coef']) ;
        $coeftotal2 =  $coeftotal2 + $totpoint2['coef'];
        }
    }
    $pointmoy = ($pointmoy1 + $pointmoy2) /2;
    $coeftotal = ($coeftotal1 );
}
if($trimestre == 'trimestre 2'){
    $totpo1 = "SELECT * FROM evaluation where sequence='sequence 3' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
    if($totpoi1 = $connec -> query($totpo1)){
        while($totpoint1 = $totpoi1 -> fetch()){
        $pointmoy1 = $pointmoy1 + ($totpoint1['note'] * $totpoint1['coef']) ;
        $coeftotal1 =  $coeftotal1 + $totpoint1['coef'];
        }
    } 
    $totpo2 = "SELECT * FROM evaluation where sequence='sequence 4' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
    if($totpoi2 = $connec -> query($totpo2)){
        while($totpoint2 = $totpoi2 -> fetch()){
        $pointmoy2 = $pointmoy2 + ($totpoint2['note'] * $totpoint2['coef']) ;
        $coeftotal2 =  $coeftotal2 + $totpoint2['coef'];
        }
    }
    $pointmoy = ($pointmoy1 + $pointmoy2)/2;
    $coeftotal = ($coeftotal1 + $coeftotal2) /2;
}
if($trimestre == 'trimestre 3'){
    $totpo1 = "SELECT * FROM evaluation where sequence='sequence 5' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
    if($totpoi1 = $connec -> query($totpo1)){
        while($totpoint1 = $totpoi1 -> fetch()){
        $pointmoy1 = $pointmoy1 + ($totpoint1['note'] * $totpoint1['coef']) ;
        $coeftotal1 =  $coeftotal1 + $totpoint1['coef'];
        }
    } 
    $totpo2 = "SELECT * FROM evaluation where sequence='sequence 6' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
    if($totpoi2 = $connec -> query($totpo2)){
        while($totpoint2 = $totpoi2 -> fetch()){
        $pointmoy2 = $pointmoy2 + ($totpoint2['note'] * $totpoint2['coef']) ;
        $coeftotal2 =  $coeftotal2 + $totpoint2['coef'];
        }
    }
    $pointmoy = ($pointmoy1 + $pointmoy2)/2;
    $coeftotal = ($coeftotal1 + $coeftotal2) /2;
}


// recuperation du rang de l'élève
 $rangeleve = 1;
$newrang = 0;
if($trimestre == 'trimestre 1'){
    $ra = "SELECT *,(sum(note*coef))/2 as notes FROM evaluation where (sequence='sequence 1' OR sequence='sequence 2')  AND session='$session' AND id_classe='$classe' GROUP BY matricule order by notes desc";
    if($ran = $connec -> query($ra)){
        while($rang = $ran -> fetch()){
                $mat = $rang['matricule'];
                if($mat == $matricu){
                $newrang = $rangeleve;
                }
        $rangeleve++;
        }
    }
}
if($trimestre == 'trimestre 2'){
    $ra = "SELECT *,(sum(note*coef))/2 as notes FROM evaluation where (sequence='sequence 3' OR sequence='sequence 4')  AND session='$session' AND id_classe='$classe' GROUP BY matricule order by notes desc";
    if($ran = $connec -> query($ra)){
        while($rang = $ran -> fetch()){
                $mat = $rang['matricule'];
                if($mat == $matricu){
                $newrang = $rangeleve;
                }
        $rangeleve++;
        }
    }
}
if($trimestre == 'trimestre 3'){
    $ra = "SELECT *,(sum(note*coef))/6 as notes FROM evaluation where session='$session' AND id_classe='$classe' GROUP BY matricule order by notes desc";
    if($ran = $connec -> query($ra)){
        while($rang = $ran -> fetch()){
                $mat = $rang['matricule'];
                if($mat == $matricu){
                $newrang = $rangeleve;
                }
        $rangeleve++;
        }
    }
}

 
// moyenne de la classe
$moyclass = 0;
if($trimestre == 'trimestre 1'){
    $mocl = "SELECT *,(sum(note*coef)/2) as nct,(sum(coef)/2) as coeft FROM evaluation where (sequence='sequence 1' OR sequence='sequence 2') AND id_classe='$classe' AND session='$session'";
    if($mocla = $connec -> query($mocl)){
        while($moclas = $mocla -> fetch()){
        $pointclasse = $moclas['nct'];
        $coefclasse = $moclas['coeft'];
        if($pointclasse <> 0 && $coefclasse <> 0){$moyclass = $pointclasse / $coefclasse;}else{$moyclass = 0;}
        }
    } 
}
if($trimestre == 'trimestre 2'){
    $mocl = "SELECT *,(sum(note*coef)/2) as nct,(sum(coef)/2) as coeft FROM evaluation where (sequence='sequence 3' OR sequence='sequence 4') AND id_classe='$classe' AND session='$session'";
    if($mocla = $connec -> query($mocl)){
        while($moclas = $mocla -> fetch()){
        $pointclasse = $moclas['nct'];
        $coefclasse = $moclas['coeft'];
        if($pointclasse <> 0 && $coefclasse <> 0){$moyclass = $pointclasse / $coefclasse;}else{$moyclass = 0;}
        }
    } 
}
if($trimestre == 'trimestre 3'){
    $mocl = "SELECT *,(sum(note*coef)/6) as nct,(sum(coef)/6) as coeft FROM evaluation where id_classe='$classe' AND session='$session'";
    if($mocla = $connec -> query($mocl)){
        while($moclas = $mocla -> fetch()){
        $pointclasse = $moclas['nct'];
        $coefclasse = $moclas['coeft'];
        if($pointclasse <> 0 && $coefclasse <> 0){$moyclass = $pointclasse / $coefclasse;}else{$moyclass = 0;}
        }
    } 
}

// POUR LE TROISIEME TRIMESTRE AFFICHER LES MOYENNES DES AUTRES TRIMESTRES
if($trimestre == 'trimestre 3')
{
    $pointtrim1a = 0;
    $coeftrim1a  = 0;
    $pointtrim1b = 0;
    $coeftrim1b  = 0;
    $pointtrim2a = 0;
    $coeftrim2a  = 0;
    $pointtrim2b = 0;
    $coeftrim2b  = 0;
    $pointtrim3a = 0;
    $coeftrim3a  = 0;
    $pointtrim3b = 0;
    $coeftrim3b  = 0;
 // POINTS ET COEF DES 3 TRIMESTRES

 // premier trimestre
 $mtrim1a = "SELECT * FROM evaluation where sequence='sequence 1' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
 if($mtrime1a = $connec -> query($mtrim1a)){
     while($mtrimes1a = $mtrime1a -> fetch()){
     $pointtrim1a += ($mtrimes1a['note'] * $mtrimes1a['coef']) ;
     $coeftrim1a += $mtrimes1a['coef'];
     }
 } 
 $mtrim1b = "SELECT * FROM evaluation where sequence='sequence 2' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
 if($mtrime1b = $connec -> query($mtrim1b)){
     while($mtrimes1b = $mtrime1b -> fetch()){
     $pointtrim1b += ($mtrimes1b['note'] * $mtrimes1b['coef']) ;
     $coeftrim1b += $mtrimes1b['coef'];
     }
 }
 $pointmoytrim1  = ($pointtrim1a + $pointtrim1b)/2;
 $coeftotaltrim1 = ($coeftrim1a );
 if($pointmoytrim1 <> 0 && $coeftotaltrim1 <> 0){$moytrim1 = $pointmoytrim1 / $coeftotaltrim1;}else{$moytrim1 = 0;}

 // deuxième trimestre
 $mtrim2a = "SELECT * FROM evaluation where sequence='sequence 3' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
 if($mtrime2a = $connec -> query($mtrim2a)){
     while($mtrimes2a = $mtrime2a -> fetch()){
     $pointtrim2a += ($mtrimes2a['note'] * $mtrimes2a['coef']) ;
     $coeftrim2a += $mtrimes2a['coef'];
     }
 } 
 $mtrim2b = "SELECT * FROM evaluation where sequence='sequence 4' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
 if($mtrime2b = $connec -> query($mtrim2b)){
     while($mtrimes2b = $mtrime2b -> fetch()){
     $pointtrim2b += ($mtrimes2b['note'] * $mtrimes2b['coef']) ;
     $coeftrim2b += $mtrimes2b['coef'];
     }
 }
 $pointmoytrim2  = ($pointtrim2a + $pointtrim2b)/2;
 $coeftotaltrim2 = ($coeftrim2a );
 if($pointmoytrim2 <> 0 && $coeftotaltrim2 <> 0){$moytrim2 = $pointmoytrim2 / $coeftotaltrim2;}else{$moytrim2 = 0;}

 // troisième trimestre
 $mtrim3a = "SELECT * FROM evaluation where sequence='sequence 5' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
 if($mtrime3a = $connec -> query($mtrim3a)){
     while($mtrimes3a = $mtrime3a -> fetch()){
     $pointtrim3a += ($mtrimes3a['note'] * $mtrimes3a['coef']) ;
     $coeftrim3a += $mtrimes3a['coef'];
     }
 } 
 $mtrim3b = "SELECT * FROM evaluation where sequence='sequence 6' AND matricule='$matricu' AND session='$session' AND id_classe='$classe'";
 if($mtrime3b = $connec -> query($mtrim3b)){
    // si il ya pas eu d'evaluation pour la 6e sequence prendre les notes de la 5e  celle de la 5e
    if($mtrime3b -> rowCount() == 0){
        $pointtrim3b += $pointtrim3a ;
        //$coeftrim3b += $mtrimes3b['coef'];
    }else
    {
        while($mtrimes3b = $mtrime3b -> fetch()){
        $pointtrim3b += ($mtrimes3b['note'] * $mtrimes3b['coef']) ;
        $coeftrim3b += $mtrimes3b['coef'];
     }
    }
    
 }
 $pointmoytrim3  = ($pointtrim3a + $pointtrim3b)/2;
 $coeftotaltrim3 = ($coeftrim3a );
 if($pointmoytrim3 <> 0 && $coeftotaltrim3 <> 0){$moytrim3 = $pointmoytrim3 / $coeftotaltrim3;}else{$moytrim3 = 0;}

 echo '<table style="width:100%;border-collapse:collapse;text-align:center;font-size:12px" border=1><tr><th rowspan="2" style="border:1px solid black">Moyennes</th><th style="border:1px solid black">Trimestre 1</th><th style="border:1px solid black">Trimestre 2 </th><th style="border:1px solid black"> Trimestre 3</th></tr>
 <tr><td style="border:1px solid black">'.round($moytrim1,2).'/20</td><td style="border:1px solid black">'.round($moytrim2,2).'/20</td><td style="border:1px solid black">'.round($moytrim3,2).'/20</td></tr></table>';
//echo 'Moyenne : Trimestre 1 : '.$moytrim1.' Trimestre 2 : '.$moytrim2.' Trimestre 3 :'.$moytrim3;

}
if($trimestre == 'trimestre 3')
{
    $pointotalavoir = $coeftrim1a * 20;
    $pointAn = ($pointmoytrim1 + $pointmoytrim2 + $pointmoytrim3) / 3;
    if($pointAn <> 0 && $coeftrim1a <> 0){$moyseq = $pointAn / $coeftrim1a;}else{$moyseq = 0;}
    echo '<div style="padding:7px 0px"></div><table style="width:100%;font-weight:bold;font-size:14px"><tr>';
    echo '<td colspan="2" class="bg-primary text-light" id="bartravail" style="text-align:center;width:60%;background :blue;color:white; !important">TRAVAIL</td><td style="width:2%"></td><td class="bg-primary text-light bartravail" style="text-align:center;width:60%;background :blue;color:white;">DISCIPLINE</td></tr>
    <tr><td style="font-size:12px"><div>Total points : '.$pointmoy.' / '.$pointotalavoir.'</div>
    <div>Total coefficients : '.$coeftrim1a.'</div>
    <div>Moyenne Annuelle : '.round($moyseq,2).' / 20</div>
    '; 
}
else
{
    $pointotalavoir = $coeftotal * 20;
    if($pointmoy <> 0 && $coeftotal <> 0){$moyseq = $pointmoy / $coeftotal;}else{$moyseq = 0;}
    echo '<div style="padding:7px 0px"></div><table style="width:100%;font-weight:bold;font-size:14px"><tr>';
    echo '<td colspan="2" class="bg-primary text-light" id="bartravail" style="text-align:center;width:60%;background :blue;color:white; !important">TRAVAIL</td><td style="width:2%"></td><td class="bg-primary text-light bartravail" style="text-align:center;width:60%;background :blue;color:white;">DISCIPLINE</td></tr>
    <tr><td style="font-size:12px"><div>Total points : '.$pointmoy.' / '.$pointotalavoir.'</div>
    <div>Total coefficients : '.$coeftotal.'</div>
    <div>Moyenne Trimestriel : '.round($moyseq,2).' / 20</div>
    '; 
}

 if($newrang == 1){
echo '<div>Rang Trimestriel : '.$newrang.'<sup>er</sup> / '.$effectif.'</div>';
}else{
echo '<div>Rang Trimestriel : '.$newrang.'<sup>eme</sup> / '.$effectif.'</div>';
}
echo '<div>Moyenne Générale de la classe : '.round($moyclass,2).' / 20</div>';
echo '<div>Mention : '.Appreciation($moyseq).' ('.Grade($moyseq).')</div>'; 
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
$ab = "SELECT sum(time) as nbreabsence,count(time) as nbre FROM absence WHERE matricule='$matricu' AND etat='non justifier' AND session='$session'";
if($abs = $connec -> query($ab)){ 
        while($abse = $abs -> fetch()){
            $breabs = $abse['nbre'];
            if($breabs == 0){
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