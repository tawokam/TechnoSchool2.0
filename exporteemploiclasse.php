<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="emploi de temps d\une classe.csv"');
require('connect.php');
$ident = $_GET['ident'];
//traitement pour afficher les heures de passe sur l'emploi de temps
$mo = "UPDATE programme SET id_classe='$ident' where id_matiere='1000000'";
if($mod = $connec -> query($mo)){}
//------------Affiche la classe ----------------//
$cl = "SELECT classe.id_classe,classe.id_section,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section=tabsection.id_section where classe.id_classe = '$ident'";
if($cla = $connec -> query($cl)){
    while($clas = $cla -> fetch()){
        $namesect = $clas['nom_section'];
        if($namesect == 'anglophone' || $namesect == 'ANGLOPHONE' || $namesect == 'Anglophone'){
            echo '"'.utf8_decode('Emploi de temps de '.$clas['nom_classe']).'"'."\n";
        echo "\n".'"'.utf8_decode('Time').'";"'.utf8_decode('Monday').'";"'.utf8_decode('Tuesday').'";"'.utf8_decode('Wednesday').'";"'.utf8_decode('Thurday').'";"'.utf8_decode('Friday').'"';
        
        }else{
            echo '"'.utf8_decode('Emploi de temps de '.$clas['nom_classe']).'"'."\n";
           echo "\n".'"'.utf8_decode('Heure').'";"'.utf8_decode('Lundi').'";"'.utf8_decode('Mardi').'";"'.utf8_decode('Mercredi').'";"'.utf8_decode('Jeudi').'";"'.utf8_decode('Vendredi').'"';
         
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
        $se2 = "SELECT id_classe,id_matiere,heuredebut,date_format(heuredebut, '%H:%i') as heurede,heurefin,date_format(heurefin, '%H:%i') as heuref,sum(lundi) as lundi,sum(mardi) as mardi,sum(mercredi) as mercredi,sum(jeudi) as jeudi,sum(vendredi) as vendredi FROM emploitempseleve where heuredebut='$hed' AND id_classe='$ident' group by heuredebut";
        if($sel2 = $connec -> query($se2)){
            while($sele2 = $sel2 -> fetch()){
                $jour0 = $sele2['lundi'];
                $jour1 = $sele2['mardi'];
                $jour2 = $sele2['mercredi'];
                $jour3 = $sele2['jeudi'];
                $jour4 = $sele2['vendredi'];
                //-------------------------------//
                $lundi = '';
                $bv="SELECT * FROM matieres where id_matiere='$jour0'";
                if($bvb = $connec ->query($bv)){
                    while($lun = $bvb->fetch()){
                        $lundi = $lun['nom_matiere'];
                    }}
                    $mardi = '';
                    $jm="SELECT * FROM matieres where id_matiere='$jour1'";
                    if($jma = $connec ->query($jm)){
                        while($mard = $jma->fetch()){
                           $mardi = $mard['nom_matiere'];
                        }}
                        $mercredi = '';
                        $jme="SELECT * FROM matieres where id_matiere='$jour2'";
                        if($jmer = $connec ->query($jme)){
                            while($mercre = $jmer->fetch()){
                                $mercredi = $mercre['nom_matiere'];
                            }}
                            $jeudi = '';
                            $jj="SELECT * FROM matieres where id_matiere='$jour3'";
                            if($jje = $connec ->query($jj)){
                                while($jeud = $jje->fetch()){
                                    $jeudi = $jeud['nom_matiere'];
                                }}
                                $vendredi = '';
                                $jve="SELECT * FROM matieres where id_matiere='$jour4'";
                                if($jven = $connec ->query($jve)){
                                    while($jvendre = $jven->fetch()){
                                       $vendredi = $jvendre['nom_matiere'];
                                    }}
                                    $h = $sele2['heurede'];
                                    $hf = $sele2['heuref'];

                                    echo "\n".'"'.utf8_decode($h.' - '. $hf).'";"'.utf8_decode($lundi).'";"'.utf8_decode($mardi).'";"'.utf8_decode($mercredi).'";"'.utf8_decode($jeudi).'";"'.utf8_decode($vendredi).'"';

            }
        }

        
    }
}
?>