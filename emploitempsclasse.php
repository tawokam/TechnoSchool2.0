<?php
require('connect.php');
$ident = $_POST['ident'];
$session = $_POST['session'];
//traitement pour afficher les heures de passe sur l'emploi de temps
$mo = "UPDATE programme SET id_classe='$ident' where id_matiere='1000000'";
if($mod = $connec -> query($mo)){}
//------------Affiche la classe ----------------//
$cl = "SELECT classe.id_classe,classe.id_section,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section=tabsection.id_section where classe.id_classe = '$ident'";
if($cla = $connec -> query($cl)){
    while($clas = $cla -> fetch()){
        $namesect = $clas['nom_section'];
        if($namesect == 'anglophone' || $namesect == 'ANGLOPHONE' || $namesect == 'Anglophone'){
        echo '<div style="text-align:center;font-size:25px;font-weight:bold">Emploi du temps de '.$clas['nom_classe'].'</div>';
        echo '<br/><br><table style="text-align:center;border-collapse:collapse;font-size:14px" border="1">';
        echo '<tr><th style="border:1px solid black;width:130px">Time</th><th style="border:1px solid black;">Monday</th><th style="border:1px solid black;">Tuesday</th><th style="border:1px solid black;">Wednesday</th><th style="border:1px solid black;">Thurday</th><th style="border:1px solid black;">Friday</th></tr>';
        
        }else{
        echo '<div style="text-align:center;font-size:25px;font-weight:bold">Emploi du temps de '.$clas['nom_classe'].'</div>';
        echo '<br/><br><table style="text-align:center;border-collapse:collapse;font-size:14px" border="1">';
        echo '<tr><th style="border:1px solid black;width:130px">Heure</th><th style="border:1px solid black;">Lundi</th><th style="border:1px solid black;">Mardi</th><th style="border:1px solid black;">Mercredi</th><th style="border:1px solid black;">Jeudi</th><th style="border:1px solid black;">Vendredi</th></tr>';

        }
    }
}
$ma = "SELECT * from emploitempseleve group by heuredebut";
if($mat = $connec -> query($ma)){
    while($mati = $mat -> fetch()){
        $hed = $mati['heuredebut'];
        $jour0 = 0;
        $jour1 = 0;
        $jour2 = 0;
        $jour3 = 0;
        $jour4 = 0;
        $se2 = "SELECT id_classe,id_matiere,heuredebut,date_format(heuredebut, '%H:%i') as heurede,heurefin,date_format(heurefin, '%H:%i') as heuref,sum(lundi) as lundi,sum(mardi) as mardi,sum(mercredi) as mercredi,sum(jeudi) as jeudi,sum(vendredi) as vendredi FROM emploitempseleve where heuredebut='$hed' AND id_classe='$ident' AND nom_session='$session' group by heuredebut";
        if($sel2 = $connec -> query($se2)){
            while($sele2 = $sel2 -> fetch()){
                $jour0 = $sele2['lundi'];
                $jour1 = $sele2['mardi'];
                $jour2 = $sele2['mercredi'];
                $jour3 = $sele2['jeudi'];
                $jour4 = $sele2['vendredi'];
                ?>
   <tr><td style="border:1px solid black;"><?php echo $sele2['heurede']?> - <?php echo $sele2['heuref']?></td>
   <td style="border:1px solid black;"><?php $bv="SELECT * FROM matieres where id_matiere='$jour0'";if($bvb = $connec ->query($bv)){while($lun = $bvb->fetch()){echo $lun['nom_matiere'];}} ?></td>
   <td style="border:1px solid black;"><?php $jm="SELECT * FROM matieres where id_matiere='$jour1'";if($jma = $connec ->query($jm)){while($mard = $jma->fetch()){echo $mard['nom_matiere'];}} ?></td>
   <td style="border:1px solid black;"><?php $jme="SELECT * FROM matieres where id_matiere='$jour2'";if($jmer = $connec ->query($jme)){while($mercre = $jmer->fetch()){echo $mercre['nom_matiere'];}} ?></td>
   <td style="border:1px solid black;"><?php $jj="SELECT * FROM matieres where id_matiere='$jour3'";if($jje = $connec ->query($jj)){while($jeud = $jje->fetch()){echo $jeud['nom_matiere'];}} ?></td>
   <td style="border:1px solid black;"><?php $jve="SELECT * FROM matieres where id_matiere='$jour4'";if($jven = $connec ->query($jve)){while($jvendre = $jven->fetch()){echo $jvendre['nom_matiere'];}} ?></td>
   <?php
            }
        }

        
    }
}
?>