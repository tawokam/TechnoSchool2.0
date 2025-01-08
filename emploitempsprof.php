<?php
require('connect.php');
$ident = $_POST['ident'];
$session = $_POST['session'];
//traitement pour afficher les heures de passe sur l'emploi de temps
$mo = "UPDATE programme SET id_employer='$ident' where id_matiere='1000000'";
if($mod = $connec -> query($mo)){}
//------------Affiche la classe ----------------//
$ki = "SELECT * FROM employer WHERE id_employer='$ident'";
if($kie = $connec -> query($ki)){
    while($kiem = $kie -> fetch()){
        echo '<div style="text-align:center;font-size:25px;font-weight:bold">Emploi du temps de Mr/Mme '.ucwords($kiem['nom_employer']).'</div>';
    }
}
        echo '<br/><br><table style="text-align:center;border-collapse:collapse;font-size:14px" border="1">';
        echo '<tr><th style="border:1px solid black;width:130px">Heure</th><th style="border:1px solid black;">Lundi</th><th style="border:1px solid black;">Mardi</th><th style="border:1px solid black;">Mercredi</th><th style="border:1px solid black;">Jeudi</th><th style="border:1px solid black;">Vendredi</th></tr>';
$ma = "SELECT * from emploitempsprofs group by heuredebut";
if($mat = $connec -> query($ma)){
    while($mati = $mat -> fetch()){
        $hed = $mati['heuredebut'];
        $jour0 = 0;
        $jour1 = 0;
        $jour2 = 0;
        $jour3 = 0;
        $jour4 = 0;
        //-----------------------------//
        $mat0 = 0;
        $mat1 = 0;
        $mat2 = 0;
        $mat3 = 0;
        $mat4 = 0;
        $se2 = "SELECT id_classe,id_employer,heuredebut,date_format(heuredebut, '%H:%i') as heurede,heurefin,date_format(heurefin, '%H:%i') as heuref,sum(lundi) as lundi,sum(mardi) as mardi,sum(mercredi) as mercredi,sum(jeudi) as jeudi,sum(vendredi) as vendredi,sum(matlundi) as matlundi,sum(matmardi) as matmardi,sum(matmercredi) as matmercredi,sum(matjeudi) as matjeudi,sum(matvendredi) as matvendredi FROM emploitempsprofs where heuredebut='$hed' AND id_employer='$ident' AND nom_session='$session' group by heuredebut";
        if($sel2 = $connec -> query($se2)){
            while($sele2 = $sel2 -> fetch()){
                $jour0 = $sele2['lundi'];
                $jour1 = $sele2['mardi'];
                $jour2 = $sele2['mercredi'];
                $jour3 = $sele2['jeudi'];
                $jour4 = $sele2['vendredi'];

                $mat0 = $sele2['matlundi'];
                $mat1 = $sele2['matmardi'];
                $mat2 = $sele2['matmercredi'];
                $mat3 = $sele2['matjeudi'];
                $mat4 = $sele2['matvendredi'];
                ?>
   <tr><td style="border:1px solid black;"><?php echo $sele2['heurede']?> - <?php echo $sele2['heuref']?></td>
   <td style="border:1px solid black;"><?php $bv="SELECT * FROM classe where id_classe='$jour0'";if($bvb = $connec ->query($bv)){while($lun = $bvb->fetch()){echo $lun['nom_classe'];}} ?> <div style="font-size:10px;text-align:right"><?php $mv="SELECT * FROM matieres where id_matiere='$mat0'";if($mvb = $connec ->query($mv)){while($mlun = $mvb->fetch()){echo $mlun['nom_matiere'];}} ?></div></td>
   <td style="border:1px solid black;"><?php $jm="SELECT * FROM classe where id_classe='$jour1'";if($jma = $connec ->query($jm)){while($mard = $jma->fetch()){echo $mard['nom_classe'];}} ?> <div style="font-size:10px;text-align:right"><?php $matjm="SELECT * FROM matieres where id_matiere='$mat1'";if($matjma = $connec ->query($matjm)){while($matmard = $matjma->fetch()){echo $matmard['nom_matiere'];}} ?></div></td>
   <td style="border:1px solid black;"><?php $jme="SELECT * FROM classe where id_classe='$jour2'";if($jmer = $connec ->query($jme)){while($mercre = $jmer->fetch()){echo $mercre['nom_classe'];}} ?><div style="font-size:10px;text-align:right"><?php $matjme="SELECT * FROM matieres where id_matiere='$mat2'";if($matjmer = $connec ->query($matjme)){while($matmercred = $matjmer->fetch()){echo $matmercred['nom_matiere'];}} ?></div></td>
   <td style="border:1px solid black;"><?php $jj="SELECT * FROM classe where id_classe='$jour3'";if($jje = $connec ->query($jj)){while($jeud = $jje->fetch()){echo $jeud['nom_classe'];}} ?> <div style="font-size:10px;text-align:right"><?php $matje="SELECT * FROM matieres where id_matiere='$mat3'";if($matjeu = $connec ->query($matje)){while($matjeudi = $matjeu->fetch()){echo $matjeudi['nom_matiere'];}} ?></div></td>
   <td style="border:1px solid black;"><?php $jve="SELECT * FROM classe where id_classe='$jour4'";if($jven = $connec ->query($jve)){while($jvendre = $jven->fetch()){echo $jvendre['nom_classe'];}} ?> <div style="font-size:10px;text-align:right"><?php $matve="SELECT * FROM matieres where id_matiere='$mat4'";if($matvend = $connec ->query($matve)){while($matvendre = $matvend->fetch()){echo $matvendre['nom_matiere'];}} ?></div></td>
   <?php
            }
        }

        
    }
}
?>