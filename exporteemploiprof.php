<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="emploi de temps d\un professeur.csv"');
require('connect.php');
$ident = $_GET['ident'];

//traitement pour afficher les heures de passe sur l'emploi de temps
$mo = "UPDATE programme SET id_employer='$ident' where id_matiere='1000000'";
if($mod = $connec -> query($mo)){}
//------------Affiche la classe ----------------//
$ki = "SELECT * FROM employer WHERE id_employer='$ident'";
if($kie = $connec -> query($ki)){
    while($kiem = $kie -> fetch()){
        echo '"'.utf8_decode('Emploi de temps de Mr/Mme '.$kiem['nom_employer']).'"'."\n";
     
    }
}
echo "\n".'"'.utf8_decode('Heure').'";"'.utf8_decode('Lundi').'";"'.utf8_decode('Mardi').'";"'.utf8_decode('Mercredi').'";"'.utf8_decode('Jeudi').'";"'.utf8_decode('Vendredi').'"';
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
        $se2 = "SELECT id_classe,id_employer,heuredebut,date_format(heuredebut, '%H:%i') as heurede,heurefin,date_format(heurefin, '%H:%i') as heuref,sum(lundi) as lundi,sum(mardi) as mardi,sum(mercredi) as mercredi,sum(jeudi) as jeudi,sum(vendredi) as vendredi,sum(matlundi) as matlundi,sum(matmardi) as matmardi,sum(matmercredi) as matmercredi,sum(matjeudi) as matjeudi,sum(matvendredi) as matvendredi FROM emploitempsprofs where heuredebut='$hed' AND id_employer='$ident' group by heuredebut";
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

                $h = $sele2['heurede'];
                $hf = $sele2['heuref'];
                $lundi = '';
                $bv="SELECT * FROM classe where id_classe='$jour0'";
                if($bvb = $connec ->query($bv)){
                    while($lun = $bvb->fetch()){
                        $lundi = $lun['nom_classe'];
                    }}
                    $matlundi = '';
                    $mv="SELECT * FROM matieres where id_matiere='$mat0'";
                    if($mvb = $connec ->query($mv)){
                        while($mlun = $mvb->fetch()){
                            $matlundi = $mlun['nom_matiere'];
                        }}
                        $mardi = '';
                        $jm="SELECT * FROM classe where id_classe='$jour1'";
                        if($jma = $connec ->query($jm)){
                            while($mard = $jma->fetch()){
                                $mardi = $mard['nom_classe'];
                            }}
                            $matmardi = '';
                            $matjm="SELECT * FROM matieres where id_matiere='$mat1'";
                            if($matjma = $connec ->query($matjm)){
                                while($matmard = $matjma->fetch()){
                                   $matmardi = $matmard['nom_matiere'];
                                }}
                                $mercredi = '';
                                $jme="SELECT * FROM classe where id_classe='$jour2'";
                                if($jmer = $connec ->query($jme)){
                                    while($mercre = $jmer->fetch()){
                                        $mercredi = $mercre['nom_classe'];
                                    }}
                                    $matmercredi = '';
                                    $matjme="SELECT * FROM matieres where id_matiere='$mat2'";
                                    if($matjmer = $connec ->query($matjme)){
                                        while($matmercred = $matjmer->fetch()){
                                            $matmercredi = $matmercred['nom_matiere'];
                                        }}
                                        $jeudi = '';
                                        $jj="SELECT * FROM classe where id_classe='$jour3'";
                                        if($jje = $connec ->query($jj)){
                                            while($jeud = $jje->fetch()){
                                               $jeudi = $jeud['nom_classe'];
                                            }}
                                            $matjeudis = '';
                                            $matje="SELECT * FROM matieres where id_matiere='$mat3'";
                                            if($matjeu = $connec ->query($matje)){
                                                while($matjeudi = $matjeu->fetch()){
                                                    $matjeudis = $matjeudi['nom_matiere'];
                                                }}
                                                $vendredi = '';
                                                $jve="SELECT * FROM classe where id_classe='$jour4'";
                                                if($jven = $connec ->query($jve)){
                                                    while($jvendre = $jven->fetch()){
                                                        $vendredi = $jvendre['nom_classe'];
                                                    }}
                                                    $matvendredi = '';
                                                    $matve="SELECT * FROM matieres where id_matiere='$mat4'";
                                                    if($matvend = $connec ->query($matve)){
                                                        while($matvendre = $matvend->fetch()){
                                                            $matvendredi = $matvendre['nom_matiere'];
                                                        }}
        
    echo "\n".'"'.utf8_decode($h.' - '. $hf).'";"'.utf8_decode($lundi.', '. $matlundi).'";"'.utf8_decode($mardi.', '. $matmardi).'";"'.utf8_decode($mercredi.', '. $matmercredi).'";"'.utf8_decode($jeudi.', '. $matjeudis).'";"'.utf8_decode($vendredi.', '. $matvendredi).'"';

            }
        }

        
    }
}
?>